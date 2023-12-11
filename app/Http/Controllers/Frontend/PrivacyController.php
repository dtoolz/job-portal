<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPageItem;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacy_page_item = PrivacyPageItem::where('id',1)->first();
        return view('frontend.privacy', compact('privacy_page_item'));
    }
}
