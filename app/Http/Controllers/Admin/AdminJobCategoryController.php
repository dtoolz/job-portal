<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class AdminJobCategoryController extends Controller
{
    public function index()
    {
        $job_categories = JobCategory::orderBy('created_at', 'desc')->get();
        return view('admin.job_category', compact('job_categories'));
    }

    public function create()
    {
        return view('admin.job_category_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $obj = new JobCategory();
        $obj->name = $request->name;
        $obj->icon = $request->icon;
        $obj->save();

        return redirect()->route('admin_job_category_index')->with('success', 'Created successfully');

    }
    public function edit($id)
    {
        $job_category_single = JobCategory::where('id',$id)->first();
        return view('admin.job_category_edit',compact('job_category_single'));
    }

    public function update(Request $request, $id)
    {
        $obj = JobCategory::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
            'icon' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->icon = $request->icon;
        $obj->update();

        return redirect()->route('admin_job_category_index')->with('success', 'updated successfully');

    }

    public function delete($id)
    {
        $check = Job::where('job_category_id',$id)->count();
        if($check>0) {
            return redirect()->back()->with('error', 'item is still active at other sections');
        }

        JobCategory::where('id',$id)->delete();
        return redirect()->route('admin_job_category_index')->with('success', 'deleted successfully.');
    }
}
