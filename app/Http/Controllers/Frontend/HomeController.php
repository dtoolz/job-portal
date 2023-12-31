<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\HomePageContent;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\WhyChooseItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home_page_content_data = HomePageContent::where('id',1)->first();
        $job_categories = JobCategory::withCount('rJob')->orderBy('r_job_count','desc')->take(9)->get();
        $all_job_categories = JobCategory::orderBy('name','asc')->get();
        $all_job_locations = JobLocation::orderBy('name','asc')->get();
        $why_choose_items = WhyChooseItem::get();
        $testimonials = Testimonial::get();
        $posts = Post::orderBy('id','desc')->take(3)->get();
        $featured_jobs = Job::with('rCompany','rJobCategory','rJobLocation','rJobType','rJobExperience','rJobGender','rJobSalaryRange')->orderBy('id','desc')->where('is_featured',1)->get();

        return view('frontend.home', compact(
            'home_page_content_data',
            'job_categories',
            'all_job_categories',
            'all_job_locations',
            'why_choose_items',
            'testimonials',
            'posts',
            'featured_jobs'
        ));
    }
}
