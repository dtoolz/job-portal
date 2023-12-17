<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminOtherPageRequest;
use App\Models\OtherPageItem;
use Illuminate\Http\Request;

class AdminOtherPageController extends Controller
{
    public function index()
    {
        $other_page_data = OtherPageItem::where('id',1)->first();
        return view('admin.other_page', compact('other_page_data'));
    }

    public function update(AdminOtherPageRequest $request)
    {
        $other_page_data = OtherPageItem::where('id',1)->first();

        $other_page_data->login_page_heading = $request->login_page_heading;
        $other_page_data->login_page_title = $request->login_page_title;
        $other_page_data->login_page_meta_description = $request->login_page_meta_description;
        $other_page_data->signup_page_heading = $request->signup_page_heading;
        $other_page_data->signup_page_title = $request->signup_page_title;
        $other_page_data->signup_page_meta_description = $request->signup_page_meta_description;
        $other_page_data->forget_password_page_heading = $request->forget_password_page_heading;
        $other_page_data->forget_password_page_title = $request->forget_password_page_title;
        $other_page_data->forget_password_page_meta_description = $request->forget_password_page_meta_description;
        $other_page_data->job_listing_page_heading = $request->job_listing_page_heading;
        $other_page_data->job_listing_page_title = $request->job_listing_page_title;
        $other_page_data->job_listing_page_meta_description = $request->job_listing_page_meta_description;
        $other_page_data->company_listing_page_heading = $request->company_listing_page_heading;
        $other_page_data->company_listing_page_title = $request->company_listing_page_title;
        $other_page_data->company_listing_page_meta_description = $request->company_listing_page_meta_description;
        $other_page_data->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
