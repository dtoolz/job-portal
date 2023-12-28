@extends('frontend.layout.app')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Applicants of job: {{ $job_single->title }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('company.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <h4>Applicants of this job:</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Applicant Profile</th>
                                <th>Cover Letter</th>
                            </tr>

                            @php $i=0; @endphp
                            @foreach($applicants as $item)
                            @php $i++; @endphp 
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->rCandidate->name }}</td>
                                <td>{{ $item->rCandidate->email }}</td>
                                <td>{{ $item->rCandidate->phone }}</td>
                                <td>
                                    @if($item->status == 'Applied')
                                        @php $color="primary"; @endphp
                                    @elseif($item->status == 'Approved')
                                        @php $color="success"; @endphp
                                    @elseif($item->status == 'Rejected')
                                        @php $color="danger"; @endphp
                                    @endif
                                    <span class="badge bg-{{ $color }}">{{ $item->status }}</span>
                                </td>
                                <td>
                                    <form action="{{ route('company_application_status_change') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{ $job_single->id }}">
                                    <input type="hidden" name="candidate_id" value="{{ $item->candidate_id }}">
                                    <select name="status" class="form-control select2 w_100" onchange="this.form.submit()">
                                        <option value="">Select</option>
                                        <option value="Applied">Applied</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('company_applicant_resume',$item->candidate_id) }}" class="btn btn-primary btn-sm text-white" target="_blank"> see profile</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $i }}">Cover Letter</a>

                                    <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cover Letter</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! nl2br($item->cover_letter) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

@endsection