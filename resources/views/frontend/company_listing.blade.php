@extends('frontend.layout.app')

@section('seo_title')
    {{ $other_page_item->company_listing_page_title }}
@endsection
@section('seo_meta_description')
    {{ $other_page_item->company_listing_page_meta_description }}
@endsection

@section('main_content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $other_page_item->company_listing_page_heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="job-result">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="job-filter">

                        <form action="{{ url('company-listing') }}" method="get">
                            <div class="widget">
                                <h2>Company Name</h2>
                                <input type="text" name="name" class="form-control" placeholder="Company Name ..."
                                    value="{{ $form_name }}">
                            </div>

                            <div class="widget">
                                <h2>Company Industry</h2>
                                <select name="industry" class="form-control select2">
                                    <option value="">Company Industry</option>
                                    @foreach ($company_industries as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($form_industry == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Company Location</h2>
                                <select name="location" class="form-control select2">
                                    <option value="">Company Location</option>
                                    @foreach ($company_locations as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($form_location == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Company Size</h2>
                                <select name="size" class="form-control select2">
                                    <option value="">Company Size</option>
                                    @foreach ($company_sizes as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($form_size == $item->id) selected @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Founded On</h2>
                                <select name="founded" class="form-control select2">
                                    <option value="">Founded On</option>
                                    @for ($i = 1600; $i <= date('Y'); $i++)
                                        <option value="{{ $i }}"
                                            @if ($form_founded == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div class="filter-button">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Filter
                                </button>
                            </div>

                        </form>

                        @if ($advertisement_data->company_listing_ad_status == 'Show')
                            <div class="advertisement">
                                @if ($advertisement_data->company_listing_ad_url == null)
                                    <img src="{{ asset('uploads/' . $advertisement_data->company_listing_ad) }}"
                                        alt="">
                                @else
                                    <a href="{{ $advertisement_data->company_listing_ad_url }}" target="_blank"><img
                                            src="{{ asset('uploads/' . $advertisement_data->company_listing_ad) }}"
                                            alt=""></a>
                                @endif
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="job">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-result-header">
                                        <i class="fas fa-search"></i> Search Result for Company Listing
                                    </div>
                                </div>

                                @if (!$companies->count())
                                    <div class="text-danger">No Result Found</div>
                                @else
                                    @foreach ($companies as $item)
                                        @php
                                            $order_data = \App\Models\Order::where('company_id', $item->id)
                                                ->where('currently_active', 1)
                                                ->first();
                                            if (date('Y-m-d') > $order_data->expire_date) {
                                                continue;
                                            }
                                        @endphp
                                        <div class="col-md-12">
                                            <div class="item d-flex justify-content-start">
                                                <div class="logo">
                                                    <img src="{{ asset('uploads/' . $item->logo) }}" alt="">
                                                </div>
                                                <div class="text">
                                                    <h3><a
                                                            href="{{ route('company', $item->id) }}">{{ $item->company_name }}</a>
                                                    </h3>
                                                    <div class="detail-1 d-flex justify-content-start">
                                                        <div class="category">
                                                            {{ $item->rCompanyIndustry->name }}
                                                        </div>
                                                        <div class="location">
                                                            {{ $item->rCompanyLocation->name }}
                                                        </div>
                                                    </div>
                                                    <div class="detail-2">
                                                        @php
                                                            $new_str = substr($item->description, 0, 220) . ' ...';
                                                        @endphp
                                                        {!! $new_str !!}
                                                    </div>
                                                    <div class="open-position">
                                                        <span class="badge bg-primary">{{ $item->r_job_count }} Open
                                                            Positions</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-12">
                                        {{ $companies->appends($_GET)->links() }}
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
