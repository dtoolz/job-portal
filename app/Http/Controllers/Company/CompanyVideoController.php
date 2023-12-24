<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyVideo;
use App\Models\Order;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyVideoController extends Controller
{
    public function videos()
    {
        // Check current active package of the company
        $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();

        if(!$order_data) {
            return redirect()->back()->with('error', 'subscribe to access this section');
        }

        // Check if company package allows video uploads
        $package_data = PricingPackage::where('id',$order_data->package_id)->first();
        if($package_data->total_allowed_videos == 0) {
            return redirect()->back()->with('error', 'You cannot add videos on your current plan');
        }

        $videos = CompanyVideo::where('company_id',Auth::guard('company')->user()->id)->get();
        return view('company.videos', compact('videos'));
    }

    public function videos_submit(Request $request)
    {
        $order_data = Order::where('company_id',Auth::guard('company')->user()->id)->where('currently_active',1)->first();
        $package_data = PricingPackage::where('id',$order_data->package_id)->first();
        $existing_video_number = CompanyVideo::where('company_id',Auth::guard('company')->user()->id)->count();

        if($package_data->total_allowed_videos == $existing_video_number) {
            return redirect()->back()->with('error', 'Video uploads limit exceeded on your current plan');
        }

        if(date('Y-m-d') > $order_data->expire_date) {
            return redirect()->back()->with('error', 'Your package has expired!');
        }

        $request->validate([
            'video_url' => 'required'
        ]);

        $obj = new CompanyVideo();
        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->video_url = $request->video_url;
        $obj->save();

        return redirect()->back()->with('success', 'Uploaded Successfully.');
    }

    public function videos_delete($id)
    {
        CompanyVideo::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Deleted Successfully.');
    }

}
