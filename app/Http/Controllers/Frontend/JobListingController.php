<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobEnquiryMailRequest;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobLocation;
use App\Models\JobType;
use App\Models\JobExperience;
use App\Models\JobGender;
use App\Models\JobSalaryRange;
use App\Mail\Sitemail;
use App\Models\OtherPageItem;

class JobListingController extends Controller
{
    public function index(Request $request)
    {

        $job_categories = JobCategory::orderBy('name','asc')->get();
        $job_locations = JobLocation::orderBy('name','asc')->get();
        $job_types = JobType::orderBy('name','asc')->get();
        $job_experiences = JobExperience::orderBy('id','asc')->get();
        $job_genders = JobGender::orderBy('id','asc')->get();
        $job_salary_ranges = JobSalaryRange::orderBy('id','asc')->get();

        $form_title = $request->title;
        $form_category = $request->category;
        $form_location = $request->location;
        $form_type = $request->type;
        $form_experience = $request->experience;
        $form_gender = $request->gender;
        $form_salary_range = $request->salary_range;

        $jobs = Job::with('rCompany','rJobCategory','rJobLocation','rJobType','rJobExperience','rJobGender','rJobSalaryRange')->orderBy('id','desc');

        if($request->title != null) {
            $jobs = $jobs->where('title','LIKE','%'.$request->title.'%');
        }

        if($request->category != null) {
            $jobs = $jobs->where('job_category_id',$request->category);
        }

        if($request->location != null) {
            $jobs = $jobs->where('job_location_id',$request->location);
        }

        if($request->type != null) {
            $jobs = $jobs->where('job_type_id',$request->type);
        }

        if($request->experience != null) {
            $jobs = $jobs->where('job_experience_id',$request->experience);
        }

        if($request->gender != null) {
            $jobs = $jobs->where('job_gender_id',$request->gender);
        }

        if($request->salary_range != null) {
            $jobs = $jobs->where('job_salary_range_id',$request->salary_range);
        }
       
        $jobs = $jobs->paginate(9);

        $other_page_item = OtherPageItem::where('id',1)->first();

        return view('frontend.job_listing', compact('jobs','job_categories','job_locations','job_types','job_experiences','job_genders','job_salary_ranges','form_title','form_category','form_location','form_type','form_experience','form_gender','form_salary_range','other_page_item'));
    }

    public function detail($id)
    {        
        $job_single = Job::with('rCompany','rJobCategory','rJobLocation','rJobType','rJobExperience','rJobGender','rJobSalaryRange')->where('id',$id)->first();

        $jobs = Job::with('rCompany','rJobCategory','rJobLocation','rJobType','rJobExperience','rJobGender','rJobSalaryRange')->where('job_category_id',$job_single->job_category_id)->get();

        $other_page_item = OtherPageItem::where('id',1)->first();

        return view('frontend.job', compact('job_single','jobs','other_page_item'));
    }

    public function send_email(JobEnquiryMailRequest $request)
    {

        $subject = 'Enquiry for job: '.$request->job_title;
        $message = 'Visitor Information: <br>';
        $message .= 'Name: '.$request->visitor_name.'<br>';
        $message .= 'Email: '.$request->visitor_email.'<br>';
        $message .= 'Phone: '.$request->visitor_phone.'<br>';
        $message .= 'Message: '.$request->visitor_message;

        \Mail::to($request->receive_email)->send(new Sitemail($subject,$message));

        return redirect()->back()->with('success', 'Mail sent successfully!');
    }
}
