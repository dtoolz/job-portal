@extends('frontend.layout.app')

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Education</h2>
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
                    <a href="{{ route('candidate_education_index') }}" class="btn btn-primary btn-sm mb-2"><i
                            class="fas  fa-plus"></i> See All</a>

                    <form action="{{ route('candidate_education_update', $education_single->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Education Level *</label>
                                <div class="form-group">
                                    <input type="text" name="level" class="form-control"
                                        value="{{ $education_single->level }}">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Institute *</label>
                                <div class="form-group">
                                    <input type="text" name="institute" class="form-control"
                                        value="{{ $education_single->institute }}">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Degree *</label>
                                <div class="form-group">
                                    <input type="text" name="degree" class="form-control"
                                        value="{{ $education_single->degree }}">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Graduation Year *</label>
                                <div class="form-group">
                                    <input type="text" name="passing_year" class="form-control"
                                        value="{{ $education_single->passing_year }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
