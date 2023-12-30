@extends('admin.layout.app')

@section('heading', 'Companies Detail')

@section('button')
    <div>
        <a href="{{ route('admin_companies') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Back to Previous</a>
    </div>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <th class="w_200">Logo</th>
                                    <td>
                                        <img src="{{ asset('uploads/' . $companies_detail->logo) }}" alt=""
                                            class="w_100">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w_200">Company Name</th>
                                    <td>{{ $companies_detail->company_name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Person Name</th>
                                    <td>{{ $companies_detail->person_name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Username</th>
                                    <td>{{ $companies_detail->username }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Email</th>
                                    <td>{{ $companies_detail->email }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Phone</th>
                                    <td>{{ $companies_detail->phone }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Address</th>
                                    <td>{{ $companies_detail->address }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Industry</th>
                                    <td>{{ $companies_detail->rCompanyIndustry->name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Location</th>
                                    <td>{{ $companies_detail->rCompanyLocation->name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Size</th>
                                    <td>{{ $companies_detail->rCompanySize->name }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Founded On</th>
                                    <td>{{ $companies_detail->founded_on }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Website</th>
                                    <td>{{ $companies_detail->website }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Description</th>
                                    <td>{!! $companies_detail->description !!}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Opening Hours</th>
                                    <td>
                                        Monday: {{ $companies_detail->oh_mon }}<br>
                                        Tuesday: {{ $companies_detail->oh_tue }}<br>
                                        Wednesday: {{ $companies_detail->oh_wed }}<br>
                                        Thursday: {{ $companies_detail->oh_thu }}<br>
                                        Friday: {{ $companies_detail->oh_fri }}<br>
                                        Saturday: {{ $companies_detail->oh_sat }}<br>
                                        Sunday: {{ $companies_detail->oh_sun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w_200">Facebook</th>
                                    <td>{{ $companies_detail->facebook }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Twitter</th>
                                    <td>{{ $companies_detail->twitter }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Linkedin</th>
                                    <td>{{ $companies_detail->linkedin }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Instagram</th>
                                    <td>{{ $companies_detail->instagram }}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Google Map</th>
                                    <td>{!! $companies_detail->map_code !!}</td>
                                </tr>
                                <tr>
                                    <th class="w_200">Photos</th>
                                    <td>
                                        @foreach ($photos as $item)
                                            <img src="{{ asset('uploads/' . $item->photo) }}" alt="" class="w_300">
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th class="w_200">Videos</th>
                                    <td>
                                        @foreach ($videos as $item)
                                            <iframe class="w_300 h_200" width="560" height="315"
                                                src="https://www.youtube.com/embed/{{ $item->video_url }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                allowfullscreen></iframe>
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
