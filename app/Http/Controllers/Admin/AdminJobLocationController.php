<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobLocation;
use App\Models\Job;

class AdminJobLocationController extends Controller
{
    public function index()
    {
        $job_locations = JobLocation::get();
        return view('admin.job_location', compact('job_locations'));
    }

    public function create()
    {
        return view('admin.job_location_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobLocation();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_location_index')->with('success', 'Created Successfully.');
    }

    public function edit($id)
    {
        $job_location_single = JobLocation::where('id',$id)->first();
        return view('admin.job_location_edit',compact('job_location_single'));
    }

    public function update(Request $request, $id)
    {
        $obj = JobLocation::where('id',$id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_location_index')->with('success', 'Updated successfully.');
    }

    public function delete($id)
    {
        JobLocation::where('id',$id)->delete();
        return redirect()->route('admin_job_location_index')->with('success', 'Deleted successfully.');
    }
}
