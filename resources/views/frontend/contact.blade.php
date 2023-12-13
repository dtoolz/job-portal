@extends('frontend.layout.app')

@section('seo_title'){{ $contact_page_item->title }}@endsection
@section('seo_meta_description'){{ $contact_page_item->meta_description }}@endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $contact_page_item->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form">
                    <form action="{{ route('contact_submit') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="person_name" value="{{ old('person_name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="person_email" value="{{ old('person_email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea class="form-control" rows="3" name="person_message" value="{{ old('person_message') }}"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" id="btn" class="btn btn-primary bg-website">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="map">
                    {!! $contact_page_item->map_code !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
