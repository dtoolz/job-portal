<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPostStoreRequest;
use App\Http\Requests\AdminPostUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.post', compact('posts'));
    }

    public function create()
    {
        return view('admin.post_create');
    }

    public function store(AdminPostStoreRequest $request)
    {
        $obj = new Post();

        $ext = $request->file('photo')->extension();
        $final_name = 'post_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->total_view = 0;
        $obj->title = $request->title;
        $obj->meta_description = $request->meta_description;
        $obj->save();

        return redirect()->route('admin_post')->with('success', 'Created successfully.');
    }

    public function edit($id)
    {
        $post_single = Post::where('id',$id)->first();
        return view('admin.post_edit',compact('post_single'));
    }

    public function update(AdminPostUpdateRequest $request, $id)
    {
        $obj = Post::where('id',$id)->first();

        if($request->hasFile('photo')) {
            unlink(public_path('uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'post_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        $obj->heading = $request->heading;
        $obj->slug = $request->slug;
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->title = $request->title;
        $obj->meta_description = $request->meta_description;
        $obj->update();

        return redirect()->route('admin_post')->with('success', 'Updated successfully.');
    }

    public function delete($id)
    {
        $post_single = Post::where('id',$id)->first();
        unlink(public_path('uploads/'.$post_single->photo));
        Post::where('id',$id)->delete();
        return redirect()->route('admin_post')->with('success', 'Deleted successfully.');
    }
}
