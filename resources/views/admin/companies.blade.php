@extends('admin.layout.app')

@section('heading', 'Companies')

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
                                        <th>Company Name</th>
                                        <th>Person Name</th>
                                        <th>Username</th>
                                        <th>Details</th>
                                        <th>Jobs</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->company_name }}</td>
                                            <td>{{ $item->person_name }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>
                                                <a href="{{ route('admin_companies_detail', $item->id) }}"
                                                    class="btn bg-primary btn-sm text-white">Details</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin_companies_jobs', $item->id) }}"
                                                    class="btn bg-primary btn-sm text-white">Jobs</a>
                                            </td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_companies_delete', $item->id) }}"
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
