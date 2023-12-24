<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateAwardRequest;
use App\Models\CandidateAward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateAwardController extends Controller
{
    public function award()
    {
        $awards = CandidateAward::where('candidate_id',Auth::guard('candidate')->user()->id)->orderBy('id','desc')->get();
        return view('candidate.award', compact('awards'));
    }

    public function award_create()
    {
        return view('candidate.award_create');
    }

    public function award_store(CandidateAwardRequest $request)
    {

        $obj = new CandidateAward();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->date = $request->date;
        $obj->save();

        return redirect()->route('candidate_award_index')->with('success', 'Created successfully.');
    }

    public function award_edit($id)
    {
        $award_single = CandidateAward::where('id',$id)->first();

        return view('candidate.award_edit', compact('award_single'));
    }

    public function award_update(CandidateAwardRequest $request, $id)
    {
        $obj = CandidateAward::where('id',$id)->first();
        
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->date = $request->date;
        $obj->update();

        return redirect()->route('candidate_award_index')->with('success', 'updated successfully.');
    }

    public function award_delete($id)
    {
        CandidateAward::where('id',$id)->delete();
        return redirect()->route('candidate_award_index')->with('success', 'deleted successfully.');
    }

}
