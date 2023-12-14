<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPageItem;
use Illuminate\Http\Request;


class AdminJobPageItemController extends Controller
{
    public function index()
    {
        $job_page_content_data = JobPageItem::where('id',1)->first();
        return view('admin.job_page_content', compact('job_page_content_data'));
    }

    public function update(Request $request)
    {
        $job_page_content_data = JobPageItem::where('id',1)->first();

        $request->validate([
            'heading' => 'required'
        ]);

        $job_page_content_data->heading = $request->heading;
        $job_page_content_data->title = $request->title;
        $job_page_content_data->meta_description = $request->meta_description;
        $job_page_content_data->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
