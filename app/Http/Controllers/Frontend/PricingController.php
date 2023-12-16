<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use App\Models\PricingPageItem;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $packages = PricingPackage::get();
        $pricing_page_item = PricingPageItem::where('id',1)->first();
        return view('frontend.pricing', compact('packages','pricing_page_item'));
    }
}
