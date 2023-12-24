<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
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
}
