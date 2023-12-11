<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyPageItem;

class AdminPrivacyPageController extends Controller
{
    public function index()
    {
        $privacy_page_data = PrivacyPageItem::where('id',1)->first();
        return view('admin.privacy_page', compact('privacy_page_data'));
    }

    public function update(Request $request)
    {

        $privacy_page_data = PrivacyPageItem::where('id',1)->first();

        $request->validate([
            'heading' => 'required',
            'content' => 'required'
        ]);

        $privacy_page_data->heading = $request->heading;
        $privacy_page_data->content = $request->content;
        $privacy_page_data->title = $request->title;
        $privacy_page_data->meta_description = $request->meta_description;
        $privacy_page_data->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
