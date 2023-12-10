@extends('frontend.layout.app')

@section('seo_title'){{ $post_single->title }}@endsection
@section('seo_meta_description'){{ $post_single->meta_description }}@endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post_single->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<script
    type="text/javascript"
    src="https://platform-api.sharethis.com/js/sharethis.js#property={{ config('services.share.key') }}&product=inline-share-buttons"
    async="async"
></script>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="featured-photo">
                    <img src="{{ asset('uploads/'.$post_single->photo) }}" alt="" />
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i></b>
                        {{ $post_single->created_at->format('d') }}
                        {{ $post_single->created_at->format('F') }},
                        {{ $post_single->created_at->format('Y') }}
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i></b>
                        {{ $post_single->total_view }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post_single->description !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
