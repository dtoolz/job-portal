<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminTestimonialStoreRequest;
use App\Http\Requests\AdminTestimonialUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('admin.testimonial', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial_create');
    }

    public function store(AdminTestimonialStoreRequest $request)
    {

        $obj = new Testimonial();

        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial_'.time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->route('admin_testimonial')->with('success', 'Created successfully.');

    }

    public function edit($id)
    {
        $testimonial_single = Testimonial::where('id',$id)->first();
        return view('admin.testimonial_edit',compact('testimonial_single'));
    }

    public function update(AdminTestimonialUpdateRequest $request, $id)
    {
        $obj = Testimonial::where('id',$id)->first();

        if($request->hasFile('photo')) {
            unlink(public_path('uploads/'.$obj->photo));

            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial_'.time().'.'.$ext;

            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $obj->photo = $final_name;
        }

        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->update();

        return redirect()->route('admin_testimonial')->with('success', 'Updated successfully.');
    }

    public function delete($id)
    {
        $testimonial_single = Testimonial::where('id',$id)->first();
        unlink(public_path('uploads/'.$testimonial_single->photo));
        Testimonial::where('id',$id)->delete();
        return redirect()->route('admin_testimonial')->with('success', 'Deleted successfully.');
    }
}
