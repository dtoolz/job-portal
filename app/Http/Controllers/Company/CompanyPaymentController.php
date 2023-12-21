<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CompanyPaymentController extends Controller
{
    public function make_payment()
    {
        $company_id = Auth::guard('company')->user()->id;
        $current_plan = Order::with('rPackage')->
            where(['company_id' => $company_id, 'currently_active' => 1])->
            first();
        $packages = PricingPackage::get();
        return view('company.make_payment', compact('current_plan', 'packages'));
    }

    public function company_paypal_payment(Request $request)
    {
        $single_package_data = PricingPackage::where('id',$request->package_id)->first();
        
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $single_package_data->package_price
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {

                    session()->put('package_id', $single_package_data->id);
                    session()->put('package_price', $single_package_data->package_price);
                    session()->put('package_days', $single_package_data->package_days);

                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function company_paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {

            $data['currently_active'] = 0;
            Order::where('company_id', Auth::guard()->user()->id)->update($data);

            $obj = new Order();
            $obj->company_id = Auth::guard()->user()->id;
            $obj->package_id = session()->get('package_id');
            $obj->order_no = time();
            $obj->paid_amount = session()->get('package_price');
            $obj->payment_method = 'PayPal';
            $obj->start_date = date('Y-m-d');
            $days = session()->get('package_days');
            $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
            $obj->currently_active = 1;
            $obj->save();

            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');

            return redirect()->route('company_make_payment')->with('success', 'Payment is successful!');
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function company_paypal_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is cancelled!');
    }


}
