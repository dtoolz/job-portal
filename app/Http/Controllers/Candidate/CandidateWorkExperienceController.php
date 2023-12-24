<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateExperienceRequest;
use App\Models\CandidateExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateWorkExperienceController extends Controller
{
    
    public function experience()
    {
        $experiences = CandidateExperience::where('candidate_id',Auth::guard('candidate')->user()->id)->orderBy('id','desc')->get();
        return view('candidate.experience', compact('experiences'));
    }

    public function experience_create()
    {
        return view('candidate.experience_create');
    }

    public function experience_store(CandidateExperienceRequest $request)
    {

        $obj = new CandidateExperience();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->company = $request->company;
        $obj->designation = $request->designation;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->save();

        return redirect()->route('candidate_experience_index')->with('success', 'Created successfully.');
    }

    public function experience_edit($id)
    {
        $experience_single = CandidateExperience::where('id',$id)->first();

        return view('candidate.experience_edit', compact('experience_single'));
    }

    public function experience_update(CandidateExperienceRequest $request, $id)
    {
        $obj = CandidateExperience::where('id',$id)->first();
        
        $obj->company = $request->company;
        $obj->designation = $request->designation;
        $obj->start_date = $request->start_date;
        $obj->end_date = $request->end_date;
        $obj->update();

        return redirect()->route('candidate_experience_index')->with('success', 'updated successfully.');
    }

    public function experience_delete($id)
    {
        CandidateExperience::where('id',$id)->delete();
        return redirect()->route('candidate_experience_index')->with('success', 'deleted successfully.');
    }
}
