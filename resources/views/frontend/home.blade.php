@extends('frontend.layout.app')

@section('main_content')
    <div class="slider" style="background-image: url({{ asset('uploads/'.$home_page_content_data->background) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <div class="text">
                            <h2>{{$home_page_content_data->heading }}</h2>
                            <p>
                                {!! $home_page_content_data->text !!}
                            </p>
                        </div>
                        <div class="search-section">
                            <form action="jobs.html" method="post">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control"
                                                    placeholder="{{$home_page_content_data->job_title }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="" class="form-select select2">
                                                    <option value="">
                                                        {{$home_page_content_data->job_location }}
                                                    </option>
                                                    <option value="">
                                                        Australia
                                                    </option>
                                                    <option value="">
                                                        Bangladesh
                                                    </option>
                                                    <option value="">
                                                        Canada
                                                    </option>
                                                    <option value="">
                                                        China
                                                    </option>
                                                    <option value="">
                                                        India
                                                    </option>
                                                    <option value="">
                                                        United Kingdom
                                                    </option>
                                                    <option value="">
                                                        United States
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="" class="form-select select2">
                                                    <option value="">
                                                        {{$home_page_content_data->job_category }}
                                                    </option>
                                                    <option value="">
                                                        Accounting
                                                    </option>
                                                    <option value="">
                                                        Customer Support
                                                    </option>
                                                    <option value="">
                                                        Web Design
                                                    </option>
                                                    <option value="">
                                                        Web Development
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                                {{$home_page_content_data->search }}
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

    <div class="job-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Job Categories</h2>
                        <p>
                            Get the list of all the popular job categories
                            here
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <h3>Accounting</h3>
                        <p>(5 Open Positions)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon"><i class="fas fa-magic"></i></div>
                        <h3>Engineering</h3>
                        <p>(3 Open Positions)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <h3>Medical</h3>
                        <p>(0 Open Position)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-sitemap"></i>
                        </div>
                        <h3>Production</h3>
                        <p>(5 Open Positions)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <h3>Data Entry</h3>
                        <p>(3 Open Positions)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <h3>Marketing</h3>
                        <p>(0 Open Position)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-street-view"></i>
                        </div>
                        <h3>Technician</h3>
                        <p>(5 Open Positions)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon"><i class="fas fa-lock"></i></div>
                        <h3>Security</h3>
                        <p>(3 Open Positions)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <h3>Garments</h3>
                        <p>(0 Open Position)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-vector-square"></i>
                        </div>
                        <h3>Telecommunication</h3>
                        <p>(5 Open Positions)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Education</h3>
                        <p>(3 Open Positions)</p>
                        <a href=""></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-suitcase"></i>
                        </div>
                        <h3>Commercial</h3>
                        <p>(0 Open Position)</p>
                        <a href=""></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="all">
                        <a href="categories.html" class="btn btn-primary">See All Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-choose" style="background-image: url({{ asset('uploads/banner3.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Why Choose Us</h2>
                        <p>
                            Our Methods to help you build your career in
                            future
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="inner">
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="text">
                            <h2>Quick Apply</h2>
                            <p>
                                You can just create your account in our
                                website and apply for desired job very
                                quickly.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inner">
                        <div class="icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="text">
                            <h2>Search Tool</h2>
                            <p>
                                We provide a perfect and advanced search
                                tool for job seekers, employers or
                                companies.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inner">
                        <div class="icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div class="text">
                            <h2>Best Companies</h2>
                            <p>
                                The best and reputed worldwide companies
                                registered here and so you will get the
                                quality jobs.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Featured Jobs</h2>
                        <p>Find the awesome jobs that matches your skill</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/logo1.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Software Engineer, Google</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Web Development</div>
                                <div class="location">United States</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">3 days ago</div>
                                <div class="budget">$300-$600</div>
                                <div class="expired">Expired</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Full Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark active"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/logo2.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Web Designer, Amplify</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Web Development</div>
                                <div class="location">United States</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">1 day ago</div>
                                <div class="budget">$1000</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Part Time</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/logo3.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Laravel Developer, Gimpo</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Web Development</div>
                                <div class="location">Canada</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">2 days ago</div>
                                <div class="budget">$1000-$3000</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Full Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/logo4.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">PHP Developer, Kite Solution</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Web Development</div>
                                <div class="location">Australia</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">7 hours ago</div>
                                <div class="budget">$1800</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Full Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/logo5.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Junior Accountant, ABC Media</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Marketing</div>
                                <div class="location">Canada</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">2 hours ago</div>
                                <div class="budget">$400</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Part Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('uploads/logo6.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Sales Manager, Tingshu Limited</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Marketing</div>
                                <div class="location">Canada</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">9 hours ago</div>
                                <div class="budget">$600-$800</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Full Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="all">
                        <a href="jobs.html" class="btn btn-primary">See All Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial" style="background-image: url({{ asset('uploads/banner11.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">Our Happy Clients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-carousel owl-carousel">
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('uploads/t1.jpg') }}" alt="" />
                            </div>
                            <div class="text">
                                <h4>Robert Krol</h4>
                                <p>CEO, ABC Company</p>
                            </div>
                            <div class="description">
                                <p>
                                    Lorem ipsum dolor sit amet, an labores
                                    explicari qui, eu nostrum copiosae
                                    argumentum has. Latine propriae quo no,
                                    unum ridens. Lorem ipsum dolor sit amet,
                                    an labores explicari qui, eu nostrum
                                    copiosae argumentum has. Latine propriae
                                    quo no, unum ridens.
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('uploads/t2.jpg') }}" alt="" />
                            </div>
                            <div class="text">
                                <h4>Sal Harvey</h4>
                                <p>Director, DEF Company</p>
                            </div>
                            <div class="description">
                                <p>
                                    Lorem ipsum dolor sit amet, an labores
                                    explicari qui, eu nostrum copiosae
                                    argumentum has. Latine propriae quo no,
                                    unum ridens. Lorem ipsum dolor sit amet,
                                    an labores explicari qui, eu nostrum
                                    copiosae argumentum has. Latine propriae
                                    quo no, unum ridens.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Latest News</h2>
                        <p>
                            Check our latest news from the following section
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/banner1.jpg') }}" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">This is a sample blog post title</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    Lorem ipsum dolor sit amet, nibh saperet
                                    te pri, at nam diceret disputationi. Quo
                                    an consul impedit, usu possim evertitur
                                    dissentiet ei.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/banner2.jpg') }}" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">This is a sample blog post title</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    Nec in rebum primis causae. Affert
                                    iisque ex pri, vis utinam vivendo
                                    definitionem ad, nostrum omnes que per
                                    et. Omnium antiopam.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('uploads/banner3.jpg') }}" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">This is a sample blog post title</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    Id pri placerat voluptatum, vero dicunt
                                    dissentiunt eum et, adhuc iisque vis no.
                                    Eu suavitate conten tiones definitionem
                                    mel, ex vide.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
