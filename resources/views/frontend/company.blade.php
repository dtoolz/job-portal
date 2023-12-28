@extends('frontend.layout.app')

@section('seo_title')
    {{ $other_page_item->company_listing_page_title }}
@endsection
@section('seo_meta_description')
    {{ $other_page_item->company_listing_page_meta_description }}
@endsection

@section('main_content')

    <div class="page-top page-top-job-single page-top-company-single"
        style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 job job-single">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/' . $company_single->logo) }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>{{ $company_single->company_name }}</h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">{{ $company_single->rCompanyIndustry->name }}</div>
                                <div class="location">{{ $company_single->rCompanyLocation->name }}</div>
                                <div class="email">{{ $company_single->email }}</div>
                                @if ($company_single->phone != null)
                                    <div class="phone">
                                        {{ $company_single->phone }}
                                    </div>
                                @endif
                            </div>
                            <div class="special">
                                <div class="type">{{ $company_single->r_job_count }} Open Positions</div>

                                @if (
                                    $company_single->facebook != null ||
                                        $company_single->twitter != null ||
                                        $company_single->linkedin != null ||
                                        $company_single->instagram != null)
                                    <div class="social">
                                        <ul>
                                            @if ($company_single->facebook != null)
                                                <li>
                                                    <a href="{{ $company_single->facebook }}" target="_blank"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                </li>
                                            @endif

                                            @if ($company_single->twitter != null)
                                                <li>
                                                    <a href="{{ $company_single->twitter }}" target="_blank"><i
                                                            class="fab fa-twitter"></i></a>
                                                </li>
                                            @endif

                                            @if ($company_single->linkedin != null)
                                                <li>
                                                    <a href="{{ $company_single->linkedin }}" target="_blank"><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </li>
                                            @endif

                                            @if ($company_single->instagram != null)
                                                <li>
                                                    <a href="{{ $company_single->instagram }}" target="_blank"><i
                                                            class="fab fa-instagram"></i></a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="job-result pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            About Company
                        </h2>
                        {!! $company_single->description !!}
                    </div>

                    @if (
                        $company_single->oh_mon != null ||
                            $company_single->oh_tue != null ||
                            $company_single->oh_wed != null ||
                            $company_single->oh_thu != null ||
                            $company_single->oh_fri != null ||
                            $company_single->oh_sat != null ||
                            $company_single->oh_sun != null)
                        <div class="left-item">
                            <h2>
                                <i class="fas fa-file-invoice"></i>
                                Opening Hours
                            </h2>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Monday</td>
                                            <td>{{ $company_single->oh_mon }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>{{ $company_single->oh_tue }}</td>
                                        </tr>
                                        <tr>
                                            <td>Wednesday</td>
                                            <td>{{ $company_single->oh_wed }}</td>
                                        </tr>
                                        <tr>
                                            <td>Thursday</td>
                                            <td>{{ $company_single->oh_thu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Friday</td>
                                            <td>{{ $company_single->oh_fri }}</td>
                                        </tr>
                                        <tr>
                                            <td>Saturday</td>
                                            <td>{{ $company_single->oh_sat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sunday</td>
                                            <td>{{ $company_single->oh_sun }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif


                    @if ($company_photos != '')
                        <div class="left-item">
                            <h2><i class="fas fa-file-invoice"></i> Photos</h2>
                            <div class="photo-all">
                                <div class="row">
                                    @foreach ($company_photos as $item)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="item">
                                                <a href="{{ asset('uploads/' . $item->photo) }}" class="magnific">
                                                    <img src="{{ asset('uploads/' . $item->photo) }}" alt="">
                                                    <div class="icon">
                                                        <i class="fas fa-plus"></i>
                                                    </div>
                                                    <div class="bg"></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif


                    @if ($company_videos != '')
                        <div class="left-item">
                            <h2>
                                <i class="fas fa-file-invoice"></i>
                                Videos
                            </h2>
                            <div class="video-all">
                                <div class="row">
                                    @foreach ($company_videos as $item)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="item">
                                                <a class="video-button"
                                                    href="http://www.youtube.com/watch?v={{ $item->video_url }}">
                                                    <img src="http://img.youtube.com/vi/{{ $item->video_url }}/0.jpg"
                                                        alt="">
                                                    <div class="icon">
                                                        <i class="far fa-play-circle"></i>
                                                    </div>
                                                    <div class="bg"></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="left-item">
                        <h2><i class="fas fa-file-invoice"></i> Open Positions</h2>
                        <div class="job related-job pt-0 pb-0">
                            <div class="container">
                                <div class="row">
                                    @foreach ($jobs as $item)
                                        <div class="col-md-12">
                                            <div class="item d-flex justify-content-start">
                                                <div class="logo">
                                                    <img src="{{ asset('uploads/' . $company_single->logo) }}"
                                                        alt="">
                                                </div>
                                                <div class="text">
                                                    <h3><a href="{{ route('job', $item->id) }}">{{ $item->title }},
                                                            {{ $company_single->company_name }}</a>
                                                    </h3>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="right-item">
                        <h2><i class="fas fa-file-invoice"></i> Company Overview</h2>
                        <div class="summary">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b> Contact Person:</b></td>
                                        <td>{{ $company_single->person_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b> Industry:</b></td>
                                        <td>{{ $company_single->rCompanyIndustry->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b> Location:</b></td>
                                        <td>{{ $company_single->rCompanyLocation->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Company Size:</b></td>
                                        <td>{{ $company_single->rCompanySize->name }}</td>
                                    </tr>
                                    @if ($company_single->address != null)
                                        <tr>
                                            <td><b>Address:</b></td>
                                            <td>{{ $company_single->address }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td><b>Founded On:</b></td>
                                        <td>{{ $company_single->founded_on }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email:</b></td>
                                        <td>{{ $company_single->email }}</td>
                                    </tr>
                                    @if ($company_single->phone != null)
                                        <tr>
                                            <td><b>Phone:</b></td>
                                            <td>{{ $company_single->phone }}</td>
                                        </tr>
                                    @endif
                                    @if ($company_single->country != null)
                                        <tr>
                                            <td><b>Country:</b></td>
                                            <td>{{ $company_single->country }}</td>
                                        </tr>
                                    @endif
                                    @if ($company_single->website != null)
                                        <tr>
                                            <td><b>Website:</b></td>
                                            <td><a href="{{ $company_single->website }}"
                                                    target="_blank">{{ $company_single->website }}</a></td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>

                    @if ($company_single->map_code != null)
                        <div class="right-item">
                            <h2><i class="fas fa-file-invoice"></i> Location Map</h2>
                            <div class="location-map">
                                {!! $company_single->map_code !!}
                            </div>
                        </div>
                    @endif


                    <div class="right-item">
                        <h2><i class="fas fa-file-invoice"></i> Contact Company</h2>
                        <div class="enquery-form">
                            <form action="{{ route('company_enquiry_send_email') }}" method="post">
                                @csrf
                                <input type="hidden" name="receive_email" value="{{ $company_single->email }}">
                                <div class="mb-3">
                                    <input type="text" name="visitor_name" class="form-control" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="visitor_email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="visitor_phone" class="form-control"
                                        placeholder="Phone Number(optional)">
                                </div>
                                <div class="mb-3">
                                    <textarea name="visitor_message" class="form-control h-150" rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
