<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TermPageItem;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $term_page_item = TermPageItem::where('id',1)->first();
        return view('frontend.terms', compact('term_page_item'));
    }
}
