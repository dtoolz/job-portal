@extends('admin.layout.app')

@section('heading', 'Candidates')

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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Username</th>
                                        <th>Details</th>
                                        <th>Applied Jobs</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidates as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>
                                                <a href="{{ route('admin_candidates_detail', $item->id) }}"
                                                    class="btn btn-primary btn-sm text-white">Details</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin_candidates_applied_jobs', $item->id) }}"
                                                    class="btn btn-primary btn-sm text-white">Applied Jobs</a>
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_candidates_delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onClick="return confirm('Are you sure?');">Delete</a>
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
