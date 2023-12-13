<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('uploads/logo0.png') }}" alt="" />
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('uploads/logo0.png') }}" alt="" />
                </a>
                <div
                    class="collapse navbar-collapse mean-menu"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link"
                                >Home</a
                            >
                        </li>
                        <li class="nav-item">
                            <a href="jobs.html" class="nav-link">
                                Find Jobs</a
                            >
                        </li>
                        <li class="nav-item">
                            <a href="companies.html" class="nav-link"
                                >Companies</a
                            >
                        </li>
                        <li class="nav-item">
                            <a href="pricing.html" class="nav-link"
                                >Pricing</a
                            >
                        </li>
                        <li class="nav-item {{ Request::is('faq') ? 'active' : '' }}">
                            <a href="{{ route('faq') }}" class="nav-link">FAQ</a>
                        </li>
                        <li class="nav-item {{ Request::is('blog') ||Request::is('post/*') ? 'active' : '' }}">
                            <a href="{{ route('blog') }}" class="nav-link"
                                >Blog</a
                            >
                        </li>
                        <li class="nav-item {{ Request::is('contact') ? 'active' : ''  }}">
                            <a href="{{ route('contact') }}" class="nav-link"
                                >Contact</a
                            >
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
