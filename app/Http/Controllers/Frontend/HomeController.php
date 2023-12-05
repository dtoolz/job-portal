<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomePageContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home_page_content_data = HomePageContent::where('id',1)->first();
        return view('frontend.home', compact('home_page_content_data'));
    }
}
