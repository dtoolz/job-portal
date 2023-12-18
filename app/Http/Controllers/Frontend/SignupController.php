<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanySignupSubmitRequest;
use App\Mail\Sitemail;
use App\Models\Company;
use App\Models\OtherPageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        $other_page_item = OtherPageItem::where('id',1)->first();

        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        } else {
            return view('frontend.signup', compact('other_page_item'));
        }
    }

    public function company_signup_submit(CompanySignupSubmitRequest $request)
    {
        $token = hash('sha256',time());

        $obj = new Company();
        $obj->company_name = $request->company_name;
        $obj->person_name = $request->person_name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $verify_link = url('company_signup_verify/'.$token.'/'.$request->email);
        $subject = 'Company Signup Verification';
        $message = 'Please click on the following link to verify your registration at job portal: <br>';
        $message .= '<a href="'.$verify_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Sitemail($subject,$message));

        return redirect()->route('login')->with('success', 'A mail has been sent to your email address. Access your email and click on the confirmation link to validate your registration.');
    }

    public function company_signup_verify($token,$email)
    {
        $company_data = Company::where('token',$token)->where('email',$email)->first();

        if(!$company_data) {
            return redirect()->route('login');
        }

        $company_data->token = '';
        $company_data->status = 1;
        $company_data->update();

        return redirect()->route('login')->with('success', 'Your email verification is successful. You can proceed to login.');
    }

}
