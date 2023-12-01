<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

}
