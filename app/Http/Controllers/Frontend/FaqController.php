<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqPageItem;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        $faq_page_item = FaqPageItem::where('id',1)->first();
        return view('frontend.faq', compact('faqs','faq_page_item'));
    }
}
