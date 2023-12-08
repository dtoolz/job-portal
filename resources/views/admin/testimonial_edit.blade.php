@extends('admin.layout.app')

@section('heading', 'Edit Testimonial')

@section('button')
<div>
    <a href="{{ route('admin_testimonial') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_testimonial_update',$testimonial_single->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Existing Photo</label>
                            <div>
                                <img src="{{ asset('uploads/'.$testimonial_single->photo) }}" alt="" class="w_150">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Change Photo</label>
                            <div>
                                <input type="file" name="photo">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $testimonial_single->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Designation *</label>
                            <input type="text" class="form-control" name="designation" value="{{ $testimonial_single->designation }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Comment *</label>
                            <textarea name="comment" class="form-control h_100" cols="30" rows="10">{{ $testimonial_single->comment }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="btn" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
