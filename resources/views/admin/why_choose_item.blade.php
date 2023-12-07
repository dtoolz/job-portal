@extends('admin.layout.app')

@section('heading', 'Why Choose Items')

@section('button')
<div>
    <a href="{{ route('admin_why_choose_item_create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a>
</div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Icon</th>
                                <th>Icon Preview</th>
                                <th>Heading</th>
                                <th>Text</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($why_choose_items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->icon }}</td>
                                    <td>
                                        <i class="{{ $item->icon }}"></i>
                                    </td>
                                    <td>{{ $item->heading }}</td>
                                    <td>{{ substr($item->text, 0, '50') }}...</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_why_choose_item_edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="{{ route('admin_why_choose_item_delete',$item->id) }}" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
