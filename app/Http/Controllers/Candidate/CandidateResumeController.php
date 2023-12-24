<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateResumeController extends Controller
{
    public function resume()
    {
        $resumes = CandidateResume::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.resume', compact('resumes'));
    }

    public function resume_create()
    {
        return view('candidate.resume_create');
    }

    public function resume_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:9000'
        ]);

        $ext = $request->file('file')->extension();
        $final_name = 'resume_'.time().'.'.$ext;
        $request->file('file')->move(public_path('uploads/'),$final_name);

        $obj = new CandidateResume();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->name = $request->name;
        $obj->file = $final_name;
        $obj->save();

        return redirect()->route('candidate_resume_index')->with('success', 'Created successfully.');
    }

    public function resume_edit($id)
    {
        $resume_single = CandidateResume::where('id',$id)->first();

        return view('candidate.resume_edit', compact('resume_single'));
    }

    public function resume_update(Request $request, $id)
    {
        $obj = CandidateResume::where('id',$id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        if($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:pdf,doc,docx|max:9000'
            ]);

            unlink(public_path('uploads/'.$obj->file));

            $ext = $request->file('file')->extension();
            $final_name = 'resume_'.time().'.'.$ext;

            $request->file('file')->move(public_path('uploads/'),$final_name);

            $obj->file = $final_name;
        }
        
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('candidate_resume_index')->with('success', 'updated successfully.');
    }

    public function resume_delete($id)
    {
        $resume_single = CandidateResume::where('id',$id)->first();
        unlink(public_path('uploads/'.$resume_single->file));
        CandidateResume::where('id',$id)->delete();
        return redirect()->route('candidate_resume_index')->with('success', 'deleted successfully.');
    }

}
