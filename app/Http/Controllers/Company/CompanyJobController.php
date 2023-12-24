<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyJobRequest;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobLocation;
use App\Models\JobSalaryRange;
use App\Models\JobType;
use App\Models\Order;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyJobController extends Controller
{
    public function jobs_create()
    {
        // Check if a company has an active plan
        $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
        if(!$order_data) {
            return redirect()->back()->with('error', 'subscribe to access this section');
        }
        if(date('Y-m-d') > $order_data->expire_date) {
            return redirect()->back()->with('error', 'Your package has expired!');
        }

         // Check if company package allows jobs posts
        $package_data = PricingPackage::where('id',$order_data->package_id)->first();
        if($package_data->total_allowed_jobs == 0) {
            return redirect()->back()->with('error', 'You cannot add jobs on your current plan');
        }

        // Number of jobs posted by a companies
        $total_jobs_posted = Job::where('company_id',Auth::guard('company')->user()->id)->count();
        if($package_data->total_allowed_jobs == $total_jobs_posted) {
            return redirect()->back()->with('error', 'Job post limit exceeded on your current plan');
        }

        $job_categories = JobCategory::orderBy('name','asc')->get();
        $job_locations = JobLocation::orderBy('name','asc')->get();
        $job_types = JobType::orderBy('name','asc')->get();
        $job_experiences = JobExperience::orderBy('id','asc')->get();
        $job_genders = JobGender::orderBy('id','asc')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id','asc')->get();
        return view('company.jobs_create', compact('job_categories','job_locations','job_types','job_experiences','job_genders','job_salary_ranges'));
    }


    public function jobs_create_submit(CompanyJobRequest $request)
    {

        $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
        $package_data = PricingPackage::where('id',$order_data->package_id)->first();

        $total_featured_jobs = Job::where('company_id',Auth::guard('company')->user()->id)->where('is_featured',1)->count();
        if($total_featured_jobs == $package_data->total_allowed_featured_jobs) {
            if($request->is_featured == 1) {
                return redirect()->back()->with('error', 'You have exceeded the number of featured job allowed on your current plan');
            }
        }

        $obj = new Job();
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->responsibility = $request->responsibility;
        $obj->skill = $request->skill;
        $obj->education = $request->education;
        $obj->benefit = $request->benefit;
        $obj->deadline = $request->deadline;
        $obj->vacancy = $request->vacancy;
        $obj->job_category_id = $request->job_category_id;
        $obj->job_location_id = $request->job_location_id;
        $obj->job_type_id = $request->job_type_id;
        $obj->job_experience_id = $request->job_experience_id;
        $obj->job_gender_id = $request->job_gender_id;
        $obj->job_salary_range_id = $request->job_salary_range_id;
        $obj->map_code = $request->map_code;
        $obj->is_featured = $request->is_featured;
        $obj->is_urgent = $request->is_urgent;
        $obj->save();

        return redirect()->back()->with('success', 'Job added successfully!');
    }


    public function jobs()
    {
        $jobs = Job::with('rJobCategory')->where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.jobs', compact('jobs'));
    }

    public function jobs_edit($id)
    {
        $jobs_single = Job::where('id',$id)->first();
        $job_categories = JobCategory::orderBy('name','asc')->get();
        $job_locations = JobLocation::orderBy('name','asc')->get();
        $job_types = JobType::orderBy('name','asc')->get();
        $job_experiences = JobExperience::orderBy('id','asc')->get();
        $job_genders = JobGender::orderBy('id','asc')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id','asc')->get();
        
        return view('company.jobs_edit', compact('jobs_single','job_categories','job_locations','job_types','job_experiences','job_genders','job_salary_ranges'));
    }

    public function jobs_update(CompanyJobRequest $request,$id)
    {
        $obj = Job::where('id',$id)->first();

        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->responsibility = $request->responsibility;
        $obj->skill = $request->skill;
        $obj->education = $request->education;
        $obj->benefit = $request->benefit;
        $obj->deadline = $request->deadline;
        $obj->vacancy = $request->vacancy;
        $obj->job_category_id = $request->job_category_id;
        $obj->job_location_id = $request->job_location_id;
        $obj->job_type_id = $request->job_type_id;
        $obj->job_experience_id = $request->job_experience_id;
        $obj->job_gender_id = $request->job_gender_id;
        $obj->job_salary_range_id = $request->job_salary_range_id;
        $obj->map_code = $request->map_code;
        $obj->is_featured = $request->is_featured;
        $obj->is_urgent = $request->is_urgent;
        $obj->update();

        return redirect()->back()->with('success', 'updated successfully!');
    }

    public function jobs_delete($id)
    {
        Job::where('id',$id)->delete();

        return redirect()->route('company_jobs')->with('success', 'deleted successfully.');
    }

}
