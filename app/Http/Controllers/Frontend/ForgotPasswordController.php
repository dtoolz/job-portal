<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Sitemail;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\OtherPageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function company_forgot_password()
    {
        $other_page_item = OtherPageItem::where('id', 1)->first();

        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        }
        if (Auth::guard('candidate')->check()) {
            return redirect()->route('candidate_dashboard');
        }

        return view('frontend.forgot_password_company', compact('other_page_item'));
    }

    public function company_forgot_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $company_data = Company::where('email', $request->email)->first();
        if (!$company_data) {
            return redirect()->back()->with('error', 'Email address not found!');
        }

        $token = hash('sha256', time());

        $company_data->token = $token;
        $company_data->update();

        $reset_link = url('reset-password/company/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the link to reset your password at job portal: <br>';
        $message .= '<a href="' . $reset_link . '">Click here</a>';

        \Mail::to($request->email)->send(new Sitemail($subject, $message));

        return redirect()->route('login')->with('success', 'Please check your email and follow the steps there.');
    }

    public function company_reset_password($token, $email)
    {
        $company_data = Company::where(['token' => $token, 'email' => $email])->first();
        if (!$company_data) {
            return redirect()->route('login');
        }
        return view('frontend.reset_password_company', compact('token', 'email'));
    }

    public function company_reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        $company_data = Company::where(['token' => $request->token, 'email' => $request->email])->first();

        $company_data->password = Hash::make($request->password);
        $company_data->token = '';
        $company_data->update();

        return redirect()->route('login')->with('success', 'Password reset is successful. You can now login to the system.');

    }

    public function candidate_forgot_password()
    {
        $other_page_item = OtherPageItem::where('id', 1)->first();

        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        }
        if (Auth::guard('candidate')->check()) {
            return redirect()->route('candidate_dashboard');
        }

        return view('frontend.forgot_password_candidate', compact('other_page_item'));
    }

    public function candidate_forgot_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $candidate_data = Candidate::where('email',$request->email)->first();
        if(!$candidate_data) {
            return redirect()->back()->with('error','Email address not found!');
        }

        $token = hash('sha256',time());

        $candidate_data->token = $token;
        $candidate_data->update();

        $reset_link = url('reset-password/candidate/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the link to reset your password at job portal: <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Sitemail($subject,$message));

        return redirect()->route('login')->with('success','Please check your email and follow the steps there.');
    }

    public function candidate_reset_password($token,$email)
    {
        $candidate_data = Candidate::where(['token' => $token, 'email' => $email])->first();
        if(!$candidate_data) {
            return redirect()->route('login');
        }
        return view('frontend.reset_password_candidate', compact('token','email'));
    }

    public function candidate_reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $candidate_data = Candidate::where(['token' => $request->token, 'email' => $request->email])->first();

        $candidate_data->password = Hash::make($request->password);
        $candidate_data->token = '';
        $candidate_data->update();

        return redirect()->route('login')->with('success', 'Password reset is successful. You can now login to the system.');
    }


}
