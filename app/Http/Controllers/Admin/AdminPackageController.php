<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPricingPackageRequest;
use Illuminate\Http\Request;
use App\Models\PricingPackage;

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = PricingPackage::get();
        return view('admin.package', compact('packages'));
    }

    public function create()
    {
        return view('admin.package_create');
    }

    public function store(AdminPricingPackageRequest $request)
    {

        $obj = new PricingPackage();
        $obj->package_name = $request->package_name;
        $obj->package_price = $request->package_price;
        $obj->package_days = $request->package_days;
        $obj->package_display_time = $request->package_display_time;
        $obj->total_allowed_jobs = $request->total_allowed_jobs;
        $obj->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
        $obj->total_allowed_photos = $request->total_allowed_photos;
        $obj->total_allowed_videos = $request->total_allowed_videos;
        $obj->save();

        return redirect()->route('admin_package')->with('success', 'Created Successfully.');

    }

    public function edit($id)
    {
        $package_single = PricingPackage::where('id',$id)->first();
        return view('admin.package_edit',compact('package_single'));
    }

    public function update(AdminPricingPackageRequest $request, $id)
    {
        $obj = PricingPackage::where('id',$id)->first();

        $obj->package_name = $request->package_name;
        $obj->package_price = $request->package_price;
        $obj->package_days = $request->package_days;
        $obj->package_display_time = $request->package_display_time;
        $obj->total_allowed_jobs = $request->total_allowed_jobs;
        $obj->total_allowed_featured_jobs = $request->total_allowed_featured_jobs;
        $obj->total_allowed_photos = $request->total_allowed_photos;
        $obj->total_allowed_videos = $request->total_allowed_videos;
        $obj->update();

        return redirect()->route('admin_package')->with('success', 'Updated Successfully.');
    }

    public function delete($id)
    {
        PricingPackage::where('id',$id)->delete();
        return redirect()->route('admin_package')->with('success', 'Deleted Successfully.');
    }
}
