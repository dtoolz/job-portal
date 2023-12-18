<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OtherPageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $other_page_item = OtherPageItem::where('id',1)->first();

        if (Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        } else {
            return view('frontend.login', compact('other_page_item'));
        }
    }

    public function company_login_submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credential = [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ];

        if(Auth::guard('company')->attempt($credential)) {
            return redirect()->route('company_dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Information is not correct!');
        }
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login');
    }


}
