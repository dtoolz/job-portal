<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CandidateProfileManagementController extends Controller
{
    public function edit_profile()
    {
        return view('candidate.edit_profile');
    }

    public function edit_profile_update(Request $request)
    {
        $obj = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();

        if($request->hasFile('photo')) {

            if(Auth::guard('candidate')->user()->photo != '') {
                unlink(public_path('uploads/'.$obj->photo));
            }            

            $ext = $request->file('photo')->extension();
            $final_name = 'candidate_photo_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->biography = $request->biography;
        $obj->phone = $request->phone;
        $obj->country = $request->country;
        $obj->address = $request->address;
        $obj->state = $request->state;
        $obj->city = $request->city;
        $obj->zip_code = $request->zip_code;
        $obj->gender = $request->gender;
        $obj->marital_status = $request->marital_status;
        $obj->date_of_birth = $request->date_of_birth;
        $obj->website = $request->website;
        $obj->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }

    public function edit_password()
    {
        return view('candidate.edit_password');
    }

    public function edit_password_update(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $obj = Candidate::where('id',Auth::guard('candidate')->user()->id)->first();
        $obj->password = Hash::make($request->password);
        $obj->update();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
    
    
    public function skill()
    {
        $skills = CandidateSkill::where('candidate_id',Auth::guard('candidate')->user()->id)->get();
        return view('candidate.skill', compact('skills'));
    }

    public function skill_create()
    {
        return view('candidate.skill_create');
    }

    public function skill_store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new CandidateSkill();
        $obj->candidate_id = Auth::guard('candidate')->user()->id;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('candidate_skill_index')->with('success', 'Created successfully.');
    }

    public function skill_edit($id)
    {
        $skill_single = CandidateSKill::where('id',$id)->first();

        return view('candidate.skill_edit', compact('skill_single'));
    }

    public function skill_update(Request $request, $id)
    {
        $obj = CandidateSkill::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
        ]);
        
        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('candidate_skill_index')->with('success', 'Updated successfully.');
    }

    public function skill_delete($id)
    {
        CandidateSkill::where('id',$id)->delete();
        return redirect()->route('candidate_skill_index')->with('success', 'Deleted successfully.');
    }
}
