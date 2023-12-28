@extends('frontend.layout.app')

@section('seo_title')
    {{ $home_page_content_data->title }}
@endsection
@section('seo_meta_description')
    {{ $home_page_content_data->meta_description }}
@endsection

@section('main_content')
    <div class="slider" style="background-image: url({{ asset('uploads/' . $home_page_content_data->background) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <div class="text">
                            <h2>{{ $home_page_content_data->heading }}</h2>
                            <p>
                                {!! $home_page_content_data->text !!}
                            </p>
                        </div>
                        <div class="search-section">
                            <form action="{{ url('job-listing') }}" method="get">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="{{ $home_page_content_data->job_title }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="location" class="form-select select2">
                                                    <option value="">
                                                        {{ $home_page_content_data->job_location }}
                                                    </option>
                                                    @foreach ($all_job_locations as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="category" class="form-select select2">
                                                    <option value="">
                                                        {{ $home_page_content_data->job_category }}
                                                    </option>
                                                    @foreach ($all_job_categories as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                                {{ $home_page_content_data->search }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($home_page_content_data->job_category_status == 'Show')
        <div class="job-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>{{ $home_page_content_data->job_category_heading }}</h2>
                            <p>
                                {{ $home_page_content_data->job_category_subheading }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($job_categories as $item)
                        <div class="col-md-4">
                            <div class="item">
                                <div class="icon">
                                    <i class="{{ $item->icon }}"></i>
                                </div>
                                <h3>{{ $item->name }}</h3>
                                <p>({{ $item->r_job_count }} Open Positions)</p>
                                <a href="{{ url('job-listing?category=' . $item->id) }}"></a>
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="all">
                                <a href="{{ route('job_categories') }}" class="btn btn-primary">See All Categories</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($home_page_content_data->why_choose_status == 'Show')
        <div class="why-choose"
            style="background-image: url({{ asset('uploads/' . $home_page_content_data->why_choose_background) }})">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>{{ $home_page_content_data->why_choose_heading }}</h2>
                            <p>
                                {{ $home_page_content_data->why_choose_subheading }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($why_choose_items as $item)
                        <div class="col-md-4">
                            <div class="inner">
                                <div class="icon">
                                    <i class="{{ $item->icon }}"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ $item->heading }}</h2>
                                    <p>
                                        {!! nl2br(e($item->text)) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($home_page_content_data->featured_jobs_status == 'Show')
        <div class="job">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>{{ $home_page_content_data->featured_jobs_heading }}</h2>
                            <p>{{ $home_page_content_data->featured_jobs_subheading }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php $i=0; @endphp
                    @foreach ($featured_jobs as $item)
                        @php
                            $this_company_id = $item->rCompany->id;
                            $order_data = \App\Models\Order::where('company_id', $this_company_id)
                                ->where('currently_active', 1)
                                ->first();
                            if (date('Y-m-d') > $order_data->expire_date) {
                                continue;
                            }
                            $i++;
                            if ($i > 6) {
                                break;
                            }
                        @endphp

                        <div class="col-lg-6 col-md-12">
                            <div class="item d-flex justify-content-start">
                                <div class="logo">
                                    <img src="{{ asset('uploads/' . $item->rCompany->logo) }}" alt="">
                                </div>
                                <div class="text">
                                    <h3><a href="{{ route('job', $item->id) }}">{{ $item->title }},
                                            {{ $item->rCompany->company_name }}</a></h3>
                                    <div class="detail-1 d-flex justify-content-start">
                                        <div class="category">
                                            {{ $item->rJobCategory->name }}
                                        </div>
                                        <div class="location">
                                            {{ $item->rJobLocation->name }}
                                        </div>
                                    </div>
                                    <div class="detail-2 d-flex justify-content-start">
                                        <div class="date">
                                            {{ $item->created_at->diffForHumans() }}
                                        </div>
                                        <div class="budget">
                                            {{ $item->rJobSalaryRange->name }}
                                        </div>
                                        @if (date('Y-m-d') > $item->deadline)
                                            <div class="expired">
                                                Expired
                                            </div>
                                        @endif
                                    </div>
                                    <div class="special d-flex justify-content-start">
                                        @if ($item->is_featured == 1)
                                            <div class="featured">
                                                Featured
                                            </div>
                                        @endif
                                        <div class="type">
                                            {{ $item->rJobType->name }}
                                        </div>
                                        @if ($item->is_urgent == 1)
                                            <div class="urgent">
                                                Urgent
                                            </div>
                                        @endif
                                    </div>
                                    @if (!Auth::guard('company')->check())
                                        <div class="bookmark">
                                            @if (Auth::guard('candidate')->check())
                                                @php
                                                    $count = \App\Models\CandidateBookmark::where(['candidate_id' => Auth::guard('candidate')->user()->id, 'job_id' => $item->id])->count();
                                                    if ($count > 0) {
                                                        $bookmark_status = 'active';
                                                    } else {
                                                        $bookmark_status = '';
                                                    }
                                                @endphp
                                            @else
                                                @php $bookmark_status = ''; @endphp
                                            @endif
                                            @if (date('Y-m-d') <= $item->deadline)
                                                <a href="{{ route('candidate_bookmark_add', $item->id) }}"><i
                                                        class="fas fa-bookmark {{ $bookmark_status }}"></i></a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="all">
                            <a href="{{ route('job_listing') }}" class="btn btn-primary">See All Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($home_page_content_data->testimonial_status == 'Show')
        <div class="testimonial"
            style="background-image: url({{ asset('uploads/' . $home_page_content_data->testimonial_background) }})">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-header">{{ $home_page_content_data->testimonial_heading }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-carousel owl-carousel">
                            @foreach ($testimonials as $item)
                                <div class="item">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/' . $item->photo) }}" alt="" />
                                    </div>
                                    <div class="text">
                                        <h4>{{ $item->name }}</h4>
                                        <p>{{ $item->designation }}</p>
                                    </div>
                                    <div class="description">
                                        <p>
                                            {!! nl2br(e($item->comment)) !!}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($home_page_content_data->blog_status == 'Show')
        <div class="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <h2>{{ $home_page_content_data->blog_heading }}</h2>
                            <p>
                                {{ $home_page_content_data->blog_subheading }}
                            </p>
                        </div>
                    </div>
                </div>
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


                </div>
            </div>
        </div>
    @endif
@endsection
