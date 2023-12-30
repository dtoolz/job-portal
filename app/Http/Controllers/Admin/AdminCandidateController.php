<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateSkill;
use App\Models\CandidateAward;
use App\Models\CandidateResume;
use App\Models\CandidateApplication;
use App\Models\CandidateBookmark;

class AdminCandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::where('status',1)->get();
        return view('admin.candidates', compact('candidates'));
    }

    public function candidates_detail($id)
    {
        $candidate_single = Candidate::where('id',$id)->first();
        $candidate_educations = CandidateEducation::where('candidate_id',$id)->get();
        $candidate_experiences = CandidateExperience::where('candidate_id',$id)->get();
        $candidate_skills = CandidateSkill::where('candidate_id',$id)->get();
        $candidate_awards = CandidateAward::where('candidate_id',$id)->get();
        $candidate_resumes = CandidateResume::where('candidate_id',$id)->get();

        return view('admin.candidates_detail', compact('candidate_single','candidate_educations','candidate_experiences','candidate_skills','candidate_awards','candidate_resumes'));
    }

    public function candidates_applied_jobs($id)
    {
        $applications = CandidateApplication::with('rJob')->where('candidate_id',$id)->get();
        return view('admin.candidates_applied_jobs',compact('applications'));
    }

    public function delete($id)
    {
        CandidateApplication::where('candidate_id',$id)->delete();
        CandidateBookmark::where('candidate_id',$id)->delete();
        CandidateEducation::where('candidate_id',$id)->delete();
        CandidateExperience::where('candidate_id',$id)->delete();
        CandidateAward::where('candidate_id',$id)->delete();
        CandidateSkill::where('candidate_id',$id)->delete();

        $resume_data = CandidateResume::where('candidate_id',$id)->get();
        foreach($resume_data as $item) {
            unlink(public_path('uploads/'.$item->file));
        }
        CandidateResume::where('candidate_id',$id)->delete();

        $candidate_data = Candidate::where('id',$id)->first();
        if($candidate_data->photo != null) {
            unlink(public_path('uploads/'.$candidate_data->photo));
        }
        Candidate::where('id',$id)->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
