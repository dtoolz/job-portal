<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobExperience;

class AdminJobExperienceController extends Controller
{
    public function index()
    {
        $job_experiences = JobExperience::get();
        return view('admin.job_experience', compact('job_experiences'));
    }

    public function create()
    {
        return view('admin.job_experience_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new JobExperience();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_job_experience_index')->with('success', 'Created Successfully.');

    }

    public function edit($id)
    {
        $job_experience_single = JobExperience::where('id',$id)->first();
        return view('admin.job_experience_edit',compact('job_experience_single'));
    }

    public function update(Request $request, $id)
    {
        $obj = JobExperience::where('id',$id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_job_experience_index')->with('success', 'Updated Successfully.');
    }

    public function delete($id)
    {
        JobExperience::where('id',$id)->delete();
        return redirect()->route('admin_job_experience_index')->with('success', 'Deleted Successfully.');
    }
}
