<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminHomePageContentUpdateRequest;
use App\Models\HomePageContent;
use Illuminate\Http\Request;

class AdminHomePageContentController extends Controller
{
     public function index()
     {
        $home_page_content_data = HomePageContent::where('id',1)->first();
        return view('admin.home_page_content', compact('home_page_content_data'));
     }

     public function update(AdminHomePageContentUpdateRequest $request)
     {
        $home_page_content = HomePageContent::where('id',1)->first();

        if($request->hasFile('background')) {
            unlink(public_path('uploads/'.$home_page_content->background));

            $ext = $request->file('background')->extension();
            $final_name = 'banner_home'.'.'.$ext;

            $request->file('background')->move(public_path('uploads/'),$final_name);

            $home_page_content->background = $final_name;
        }

        if($request->hasFile('why_choose_background')) {

            unlink(public_path('uploads/'.$home_page_content->why_choose_background));

            $ext1 = $request->file('why_choose_background')->extension();
            $final_name1 = 'why_choose_home_background'.'.'.$ext1;

            $request->file('why_choose_background')->move(public_path('uploads/'),$final_name1);

            $home_page_content->why_choose_background = $final_name1;
        }

        if($request->hasFile('testimonial_background')) {

            unlink(public_path('uploads/'.$home_page_content->testimonial_background));

            $ext1 = $request->file('testimonial_background')->extension();
            $final_name1 = 'testimonial_home_background'.'.'.$ext1;

            $request->file('testimonial_background')->move(public_path('uploads/'),$final_name1);

            $home_page_content->testimonial_background = $final_name1;
        }

        $home_page_content->heading = $request->heading;
        $home_page_content->text = $request->text;
        $home_page_content->job_title = $request->job_title;
        $home_page_content->job_category = $request->job_category;
        $home_page_content->job_location = $request->job_location;
        $home_page_content->search = $request->search;

        $home_page_content->job_category_heading = $request->job_category_heading;
        $home_page_content->job_category_subheading = $request->job_category_subheading;
        $home_page_content->job_category_status = $request->job_category_status;

        $home_page_content->why_choose_heading = $request->why_choose_heading;
        $home_page_content->why_choose_subheading = $request->why_choose_subheading;
        $home_page_content->why_choose_status = $request->why_choose_status;

        $home_page_content->featured_jobs_heading = $request->featured_jobs_heading;
        $home_page_content->featured_jobs_subheading = $request->featured_jobs_subheading;
        $home_page_content->featured_jobs_status = $request->featured_jobs_status;

        $home_page_content->testimonial_heading = $request->testimonial_heading;
        $home_page_content->testimonial_status = $request->testimonial_status;

        $home_page_content->blog_heading = $request->blog_heading;
        $home_page_content->blog_subheading = $request->blog_subheading;
        $home_page_content->blog_status = $request->blog_status;

        // $home_page_content->title = $request->title;
        // $home_page_content->meta_description = $request->meta_description;

        $home_page_content->update();

        return redirect()->back()->with('success', 'Data is updated successfully.');
     }
}
