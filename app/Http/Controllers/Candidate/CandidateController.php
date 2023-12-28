<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateBookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    public function dashboard()
    {
        return view('candidate.dashboard');
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
}
