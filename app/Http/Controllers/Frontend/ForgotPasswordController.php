<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OtherPageItem;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function company_forgot_password()
    {
        $other_page_item = OtherPageItem::where('id',1)->first();
        return view('frontend.forgot_password_company', compact('other_page_item'));
    }

    public function candidate_forgot_password()
    {
        $other_page_item = OtherPageItem::where('id',1)->first();
        return view('frontend.forgot_password_candidate', compact('other_page_item'));
    }
}
