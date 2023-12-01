<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Sitemail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin_home');
        } else {
            return view('admin.login');
        }
    }

    public function forgot_password()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin_home');
        } else {
            return view('admin.forgot_password');
        }
    }

    public function forgot_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255'
        ]);

        $admin_data = Admin::where('email', $request->email)->first();
        if(!$admin_data) {
            return redirect()->back()->with('error','Invalid email address');
        }

        $token = hash('sha256',time());

        $admin_data->token = $token;
        $admin_data->update();

        $reset_link = url('admin/reset-password/'.$token.'/'.$request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link to reset your password: <br>';
        $message .= '<a href="'.$reset_link.'">Click here</a>';

        \Mail::to($request->email)->send(new Sitemail($subject,$message));

        return redirect()->route('admin_login')->with('success','Please check your email address for password reset information');

    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin_home');
        } else {
            return redirect()->route('admin_login')->with('error', 'Invalid login information');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function reset_password($token,$email)
    {
        $admin_data = Admin::where(['token' => $token, 'email' => $email])->first();
        if(!$admin_data) {
            return redirect()->route('admin_login');
        }

        return view('admin.reset_password', compact('token','email'));

    }

    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $admin_data = Admin::where(['token' => $request->token, 'email' => $request->email])->first();

        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();

        return redirect()->route('admin_login')->with('success', 'Password reset is successful, login now');
    }

}
