@extends('admin.layout.app')

@section('heading', 'Candidate Detail')

@section('button')
    <div>
        <a onclick="history.back()" class="btn btn-primary"><i class="fas fa-plus"></i> Back to Previous</a>
    </div>
@endsection

@section('main_content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h5>Basic Information</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th class="w_200">Photo</th>
                                <td>
                                    <img src="{{ asset('uploads/'.$candidate_single->photo) }}" alt="" class="w_100">
                                </td>
                            </tr>
                            <tr>
                                <th class="w_200">Name</th>
                                <td>{{ $candidate_single->name }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Profession</th>
                                <td>{{ $candidate_single->designation }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Username</th>
                                <td>{{ $candidate_single->username }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Email</th>
                                <td>{{ $candidate_single->email }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Phone</th>
                                <td>{{ $candidate_single->phone }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Country</th>
                                <td>{{ $candidate_single->country }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Address</th>
                                <td>{{ $candidate_single->address }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">State</th>
                                <td>{{ $candidate_single->state }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">City</th>
                                <td>{{ $candidate_single->city }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Zip Code</th>
                                <td>{{ $candidate_single->zip_code }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Gender</th>
                                <td>{{ $candidate_single->gender }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Marital Status</th>
                                <td>{{ $candidate_single->marital_status }}</td>
                            </tr>
                            <tr>
                                <th class="w_200">Date of Birth</th>
                                <td>{{ $candidate_single->date_of_birth }}</td>
                            </tr>
                        </table>
                    </div>


                    @if($candidate_educations->count())
                    <h5>Education</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Education Level</th>
                                    <th>Institute</th>
                                    <th>Degree</th>
                                    <th>Passing Year</th>
                                </tr>
                                @foreach($candidate_educations as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->institute }}</td>
                                    <td>{{ $item->degree }}</td>
                                    <td>{{ $item->passing_year }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($candidate_skills->count())
                    <h5>Skills</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Skill Name</th>
                                </tr>
                                @foreach($candidate_skills as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($candidate_experiences->count())
                    <h5>Experience</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Company</th>
                                    <th>Designation</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                                @foreach($candidate_experiences as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($candidate_awards->count())
                    <h5>Awards</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="w_100">Date</th>
                                </tr>
                                @foreach($candidate_awards as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif


                    @if($candidate_resumes->count())
                    <h5>Resume</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>File</th>
                                </tr>
                                @foreach($candidate_resumes as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td><a href="{{ asset('uploads/'.$item->file) }}" target="_blank">{{ $item->file }}</a></td>
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
</div>
@endsection