<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateApplication;
use App\Models\CandidateAward;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateResume;
use App\Models\CandidateSkill;
use App\Models\Job;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function dashboard()
    {
        $total_opened_jobs = Job::where('company_id',Auth::guard('company')->user()->id)->count();
        $total_featured_jobs = Job::where('company_id',Auth::guard('company')->user()->id)->where('is_featured',1)->count();
        $jobs = Job::with('rJobCategory')->where('company_id',Auth::guard('company')->user()->id)->orderBy('id','desc')->take(2)->get();
        return view('company.dashboard', compact('jobs','total_opened_jobs','total_featured_jobs'));
    }

    public function orders()
    {
        $orders = Order::with('rPackage')->orderBy('id', 'desc')->where('company_id', Auth::guard('company')->user()->id)->get();
        return view('company.orders', compact('orders'));
    }

    public function candidate_applications()
    {
        $jobs = Job::with('rJobCategory','rJobLocation','rJobType','rJobGender','rJobExperience','rJobSalaryRange')->where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.applications', compact('jobs'));
    }

    public function applicants($id)
    {
        $applicants = CandidateApplication::with('rCandidate')->where('job_id',$id)->get();
        $job_single = Job::where('id',$id)->first();

        return view('company.applicants', compact('applicants','job_single'));
    }

    public function applicant_resume($id)
    {
        $candidate_single = Candidate::where('id',$id)->first();
        $candidate_educations = CandidateEducation::where('candidate_id',$id)->get();
        $candidate_experiences = CandidateExperience::where('candidate_id',$id)->get();
        $candidate_skills = CandidateSkill::where('candidate_id',$id)->get();
        $candidate_awards = CandidateAward::where('candidate_id',$id)->get();
        $candidate_resumes = CandidateResume::where('candidate_id',$id)->get();

        return view('company.applicant_resume', compact('candidate_single','candidate_educations','candidate_experiences','candidate_skills','candidate_awards','candidate_resumes'));
    }

    public function application_status_change(Request $request)
    {
        $obj = CandidateApplication::with('rCandidate')->where(['candidate_id' => $request->candidate_id, 'job_id' => $request->job_id ])->first();
        $obj->status = $request->status;
        $obj->update();

        return redirect()->back()->with('success', 'Status changed successfully!');
    }
}
