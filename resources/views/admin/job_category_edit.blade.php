@extends('admin.layout.app')

@section('heading', 'Edit Job Category')

@section('button')
<div>
    <a href="{{ route('admin_job_category_index') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View All</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin_job_category_update',$job_category_single->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Category Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $job_category_single->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon Preview</label>
                            <div>
                                <i class="{{ $job_category_single->icon }}"></i>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Icon *</label>
                            <input type="text" class="form-control" name="icon" value="{{ $job_category_single->icon }}">
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
