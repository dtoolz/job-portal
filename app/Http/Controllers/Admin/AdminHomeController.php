<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $total_companies = Company::where('status',1)->count();
        $total_candidates = Candidate::where('status',1)->count();
        $total_jobs = Job::count();

        return view('admin.home', compact('total_companies','total_candidates','total_jobs'));
    }
}
