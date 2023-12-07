<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminWhyChooseItemRequest;
use Illuminate\Http\Request;
use App\Models\WhyChooseItem;

class AdminWhyChooseController extends Controller
{
    public function index()
    {
        $why_choose_items = WhyChooseItem::get();
        return view('admin.why_choose_item', compact('why_choose_items'));
    }

    public function create()
    {
        return view('admin.why_choose_item_create');
    }

    public function store(AdminWhyChooseItemRequest $request)
    {
        $obj = new WhyChooseItem();
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->save();

        return redirect()->route('admin_why_choose_item')->with('success', 'Created successfully.');
    }

    public function edit($id)
    {
        $why_choose_item_single = WhyChooseItem::where('id',$id)->first();
        return view('admin.why_choose_item_edit',compact('why_choose_item_single'));
    }

    public function update(AdminWhyChooseItemRequest $request, $id)
    {
        $obj = WhyChooseItem::where('id',$id)->first();

        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->update();

        return redirect()->route('admin_why_choose_item')->with('success', 'Updated successfully.');
    }

    public function delete($id)
    {
        WhyChooseItem::where('id',$id)->delete();
        return redirect()->route('admin_why_choose_item')->with('success', 'Deleted successfully.');
    }
}

