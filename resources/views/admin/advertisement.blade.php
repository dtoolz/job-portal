@extends('admin.layout.app')

@section('heading', 'Advertisement')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_advertisement_update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <h4>Job Listing Ad</h4>
                            <div class="form-group mb-3">
                                <label>Existing Job Listing Ad</label>
                                <div>
                                    <img src="{{ asset('uploads/' . $advertisement_data->job_listing_ad) }}" alt=""
                                        class="w_200">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Job Listing Ad</label>
                                <div>
                                    <input type="file" name="job_listing_ad">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" name="job_listing_ad_url" class="form-control"
                                    value="{{ $advertisement_data->job_listing_ad_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="job_listing_ad_status" class="form-control select2">
                                    <option value="Show" @if ($advertisement_data->job_listing_ad_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($advertisement_data->job_listing_ad_status == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>


                            <h4>Company Listing Ad</h4>
                            <div class="form-group mb-3">
                                <label>Existing Company Listing Ad</label>
                                <div>
                                    <img src="{{ asset('uploads/' . $advertisement_data->company_listing_ad) }}"
                                        alt="" class="w_200">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Change Company Listing Ad</label>
                                <div>
                                    <input type="file" name="company_listing_ad">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>URL</label>
                                <input type="text" name="company_listing_ad_url" class="form-control"
                                    value="{{ $advertisement_data->company_listing_ad_url }}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="company_listing_ad_status" class="form-control select2">
                                    <option value="Show" @if ($advertisement_data->company_listing_ad_status == 'Show') selected @endif>Show</option>
                                    <option value="Hide" @if ($advertisement_data->company_listing_ad_status == 'Hide') selected @endif>Hide</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
