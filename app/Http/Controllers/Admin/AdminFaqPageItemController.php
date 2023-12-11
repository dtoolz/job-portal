<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqPageItem;
use Illuminate\Http\Request;

class AdminFaqPageItemController extends Controller
{
    public function index()
    {
        $faq_page_data = FaqPageItem::where('id',1)->first();
        return view('admin.faq_page', compact('faq_page_data'));
    }

    public function update(Request $request)
    {
        $faq_page_data = FaqPageItem::where('id',1)->first();

        $request->validate([
            'heading' => 'required'
        ]);

        $faq_page_data->heading = $request->heading;
        $faq_page_data->title = $request->title;
        $faq_page_data->meta_description = $request->meta_description;
        $faq_page_data->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
