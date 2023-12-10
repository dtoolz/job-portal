<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPageItem;

class AdminBlogPageItemController extends Controller
{
    public function index()
    {
        $blog_page_item_data = BlogPageItem::where('id',1)->first();
        return view('admin.blog', compact('blog_page_item_data'));
    }

    public function update(Request $request)
    {
        $blog_page_item_data = BlogPageItem::where('id',1)->first();

        $request->validate([
            'heading' => 'required'
        ]);

        $blog_page_item_data->heading = $request->heading;
        $blog_page_item_data->title = $request->title;
        $blog_page_item_data->meta_description = $request->meta_description;
        $blog_page_item_data->update();

        return redirect()->back()->with('success', 'Updated successfully.');
    }
}
