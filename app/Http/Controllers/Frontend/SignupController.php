<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OtherPageItem;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function index()
    {
        $other_page_item = OtherPageItem::where('id',1)->first();
        return view('frontend.signup', compact('other_page_item'));
    }
}
