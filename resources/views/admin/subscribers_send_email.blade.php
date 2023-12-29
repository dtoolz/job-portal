@extends('admin.layout.app')

@section('heading', 'Send Email to All Subscribers')

@section('button')
    <div>
        <a href="{{ route('admin_all_subscribers') }}" class="btn btn-primary"><i class="fas fa-plus"></i> All Subscribers</a>
    </div>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_subscribers_send_email_submit') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label>Subject *</label>
                                <input type="text" class="form-control" name="subject">
                            </div>
                            <div class="form-group mb-3">
                                <label>Message *</label>
                                <textarea name="comment" class="form-control h_150" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
