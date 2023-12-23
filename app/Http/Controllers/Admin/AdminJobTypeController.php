<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobType;

class AdminJobTypeController extends Controller
{
    public function index()
    {
        $job_types = JobType::get();
        return view('admin.job_type', compact('job_types'));
    }

    public function create()
    {
        return view('admin.job_type_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobType();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_type_index')->with('success', 'Created Successfully.');

    }

    public function edit($id)
    {
        $job_type_single = JobType::where('id',$id)->first();
        return view('admin.job_type_edit',compact('job_type_single'));
    }

    public function update(Request $request, $id)
    {
        $obj = JobType::where('id',$id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_type_index')->with('success', 'Updated successfully.');
    }

    public function delete($id)
    {
        JobType::where('id',$id)->delete();
        return redirect()->route('admin_job_type_index')->with('success', 'Deleted Successfully.');
    }
}
