@extends('frontend.layout.app')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Education History</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        @include('candidate.sidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <a href="{{ route('candidate_education_create') }}" class="btn btn-primary btn-sm mb-2"><i
                            class="fas fa-plus"></i> Add Item</a>

                    @if (!$allEducation->count())
                        <div class="text-danger">No data found</div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Education Level</th>
                                        <th>Institute</th>
                                        <th>Degree</th>
                                        <th>Passing Year</th>
                                        <th class="w-100">Action</th>
                                    </tr>
                                    @foreach ($allEducation as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>{{ $item->institute }}</td>
                                            <td>{{ $item->degree }}</td>
                                            <td>{{ $item->passing_year }}</td>
                                            <td>
                                                <a href="{{ route('candidate_education_edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm text-white"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('candidate_education_delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm"
                                                    onClick="return confirm('Are you sure?');"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
