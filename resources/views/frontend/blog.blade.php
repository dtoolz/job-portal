@extends('frontend.layout.app')

@section('seo_title'){{ $blog_page_item->title }}@endsection
@section('seo_meta_description'){{ $blog_page_item->meta_description }}@endsection

@section('main_content')
<div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $blog_page_item->heading }}</h2>
            </div>
        </div>
    </div>
</div>

    <div class="blog">
        <div class="container">
            <div class="row">

                @foreach ($posts as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('uploads/' . $item->photo) }}" alt="" />
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('post', $item->slug) }}">{{ $item->title }}</a>
                                </h2>
                                <div class="short-des">
                                    <p>
                                        {!! nl2br(e($item->short_description)) !!}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('post', $item->slug) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>
@endsection
