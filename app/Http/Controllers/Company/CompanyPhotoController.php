<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyPhoto;
use App\Models\Order;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyPhotoController extends Controller
{
    public function photos()
    {
        // Check current active package of the company
        $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();

        if(!$order_data) {
            return redirect()->back()->with('error', 'subscribe access this section');
        }

        // Check if company package allows photo uploads
        $package_data = PricingPackage::where('id',$order_data->package_id)->first();

        if($package_data->total_allowed_photos == 0) {
            return redirect()->back()->with('error', 'You cannot add photos on your current plan');
        }

        $photos = CompanyPhoto::where('company_id',Auth::guard('company')->user()->id)->get();

        return view('company.photos', compact('photos'));
    }

    public function photos_submit(Request $request)
    {
        $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
        $package_data = PricingPackage::where('id',$order_data->package_id)->first();
        $existing_photo_number = CompanyPhoto::where('company_id',Auth::guard('company')->user()->id)->count();

        if($package_data->total_allowed_photos == $existing_photo_number) {
            return redirect()->back()->with('error', 'Photo uploads limit exceeded on your current plan');
        }

        if(date('Y-m-d') > $order_data->expire_date) {
            return redirect()->back()->with('error', 'Your package is expired!');
        }

        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif|max:9000'
        ]);

        $obj = new CompanyPhoto();

        $ext = $request->file('photo')->extension();
        $final_name = 'company_photo_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj->photo = $final_name;
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->save();

        return redirect()->back()->with('success', 'Uploaded Successfully.');
    }

    public function photos_delete($id)
    {
        $single_data = CompanyPhoto::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        CompanyPhoto::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
