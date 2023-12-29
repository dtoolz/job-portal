<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Mail\Sitemail;
use App\Models\CandidateApplication;
use App\Models\CandidateBookmark;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function dashboard()
    {
        $total_applied_jobs = CandidateApplication::where(['candidate_id' => Auth::guard('candidate')->user()->id, 'status' => 'Applied' ])->count();

        $total_rejected_jobs = CandidateApplication::where(['candidate_id' => Auth::guard('candidate')->user()->id, 'status' => 'Rejected' ])->count();

        $total_approved_jobs = CandidateApplication::where(['candidate_id' => Auth::guard('candidate')->user()->id, 'status' => 'Approved' ])->count();

        return view('candidate.dashboard',compact('total_applied_jobs','total_rejected_jobs','total_approved_jobs'));
    }

    public function bookmark_add($id)
    {
        $existing_bookmark_check = CandidateBookmark::where([
            'candidate_id' => Auth::guard('candidate')->user()->id,
            'job_id' => $id
        ])->count();

        if ($existing_bookmark_check > 0) {
            return redirect()->back()->with('error', 'Bookmarked Already');
        }

        $obj = new CandidateBookmark();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'Bookmarked successfully.');
    }

    public function bookmark_index()
    {
        $bookmarked_jobs = CandidateBookmark::with('rJob', 'rCandidate')->where('candidate_id', Auth::guard('candidate')->user()->id)->get();

        return view('candidate.bookmark', compact('bookmarked_jobs'));
    }

    public function bookmark_delete($id)
    {
        CandidateBookmark::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }

    public function apply($id)
    {
        $existing_apply_check = CandidateApplication::where(['candidate_id' => Auth::guard('candidate')->user()->id, 'job_id' => $id])->count();
        if($existing_apply_check > 0) {
            return redirect()->back()->with('error', 'You have applied to this job');
        }

        $job_single = Job::where('id',$id)->first();

        return view('candidate.apply', compact('job_single'));
    }

    public function apply_submit(Request $request, $id)
    {
        $request->validate([
            'cover_letter' => 'required'
        ]);

        $obj = new CandidateApplication();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->job_id = $id;
        $obj->cover_letter = $request->cover_letter;
        $obj->status = 'Applied';
        $obj->save();

        
        $job_info = Job::with('rCompany')->where('id',$id)->first();
        $company_email = $job_info->rCompany->email;
        // Sending email to company
        $applicants_list_url = route('company_applicants',$id);
        $subject = 'A candidate applied to a job';
        $message = 'Please check the application: ';
        $message .= '<a href="'.$applicants_list_url.'">Click here to see applicants list for this job</a>';

        \Mail::to($company_email)->send(new Sitemail($subject,$message));

        return redirect()->route('job',$id)->with('success', 'Application sent successfully!');
    }

    public function applications()
    {
        $applied_jobs = CandidateApplication::with('rJob')->where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.applications', compact('applied_jobs'));
    }
}
