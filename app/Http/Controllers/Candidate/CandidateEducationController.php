<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateEducationRequest;
use App\Models\CandidateEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateEducationController extends Controller
{
    public function education()
    {
        $allEducation = CandidateEducation::where('candidate_id',Auth::guard('candidate')->user()->id)->orderBy('id','desc')->get();
        return view('candidate.education', compact('allEducation'));
    }

    public function education_create()
    {
        return view('candidate.education_create');
    }

    public function education_store(CandidateEducationRequest $request)
    {

        $obj = new CandidateEducation();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->level = $request->level;
        $obj->institute = $request->institute;
        $obj->degree = $request->degree;
        $obj->passing_year = $request->passing_year;
        $obj->save();

        return redirect()->route('candidate_education_index')->with('success', 'Created successfully.');
    }

    public function education_edit($id)
    {
        $education_single = CandidateEducation::where('id',$id)->first();

        return view('candidate.education_edit', compact('education_single'));
    }

    public function education_update(CandidateEducationRequest $request, $id)
    {
        $obj = CandidateEducation::where('id',$id)->first();

        $request->validate([
            
        ]);
        
        $obj->level = $request->level;
        $obj->institute = $request->institute;
        $obj->degree = $request->degree;
        $obj->passing_year = $request->passing_year;
        $obj->update();

        return redirect()->route('candidate_education_index')->with('success', 'Updated successfully.');
    }

    public function education_delete($id)
    {
        CandidateEducation::where('id',$id)->delete();
        return redirect()->route('candidate_education_index')->with('success', 'Deleted successfully.');
    }
}
