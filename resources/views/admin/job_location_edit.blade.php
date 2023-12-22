@extends('admin.layout.app')

@section('heading', 'Edit Job Location')

@section('button')
    <div>
        <a href="{{ route('admin_job_location_index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> View All</a>
    </div>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_job_location_update', $job_location_single->id) }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Name *</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $job_location_single->name }}">
                            </div>
                            <div class="form-group">
                                <button id="btn" type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
