<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyLocation;
use App\Models\Company;

class AdminCompanyLocationController extends Controller
{
    public function index()
    {
        $company_locations = CompanyLocation::get();
        return view('admin.company_location', compact('company_locations'));
    }

    public function create()
    {
        return view('admin.company_location_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $obj = new CompanyLocation();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_company_location_index')->with('success', 'Created Successfully.');
    }

    public function edit($id)
    {
        $company_location_single = CompanyLocation::where('id',$id)->first();
        return view('admin.company_location_edit',compact('company_location_single'));
    }

    public function update(Request $request, $id)
    {
        $obj = CompanyLocation::where('id',$id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->route('admin_company_location_index')->with('success', 'Updated Successfully.');
    }

    public function delete($id)
    {
        $check = Company::where('company_location_id',$id)->count();
        if($check>0) {
            return redirect()->back()->with('error', 'item is still active at other sections');
        }

        CompanyLocation::where('id',$id)->delete();
        return redirect()->route('admin_company_location_index')->with('success', 'Deleted Successfully.');
    }
}
