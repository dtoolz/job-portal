<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobPageItem;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function categories()
    {
        $job_categories_page_data = JobPageItem::where('id',1)->first();
        $job_categories = JobCategory::orderBy('name', 'asc')->get();
        return view('frontend.job_categories', compact('job_categories', 'job_categories_page_data'));
    }
}
