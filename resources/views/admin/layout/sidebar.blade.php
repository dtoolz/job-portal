<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Dashboard">
                    <i class="fas fa-columns"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/settings') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_settings') }}" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-title="Settings">
                    <i class="fas fa-wrench"></i><span>Settings</span></a></li>

            <li
                class="nav-item dropdown {{ Request::is('admin/home-page-content') ||
                Request::is('admin/blog-page') ||
                Request::is('admin/faq-page') ||
                Request::is('admin/term-page') ||
                Request::is('admin/privacy-page') ||
                Request::is('admin/contact-page') ||
                Request::is('admin/job-page-content') ||
                Request::is('admin/pricing-page') ||
                Request::is('admin/other-page')
                    ? 'active'
                    : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-marker"></i><span>Page
                        Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-page-content') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_home_page_content') }}"><i class="fas fa-home"></i> Home Page</a></li>
                    <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_blog_page') }}"><i class="fas fa-blog"></i> Blog Page</a></li>
                    <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_faq_page') }}"><i class="fas fa-question-circle"></i> FAQ Page</a>
                    </li>
                    <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_term_page') }}"><i class="fas fa-file-contract"></i> Terms of Use
                            Page</a>
                    </li>
                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_privacy_page') }}"><i class="fas fa-shield-alt"></i> Privacy
                            Policy Page</a></li>
                    <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_contact_page') }}"><i class="fas fa-address-book"></i> Contact
                            Page</a>
                    </li>
                    <li class="{{ Request::is('admin/job-page-content') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_job_page_content') }}"><i class="fas fa-network-wired"></i> Job
                            Category Page</a></li>
                    <li class="{{ Request::is('admin/pricing-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_pricing_page') }}"><i class="fas fa-money-bill-wave"></i> Pricing
                            Page</a>
                    </li>
                    <li class="{{ Request::is('admin/other-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_other_page') }}">
                            <i class="far fa-list-alt"></i> Other Pages</a></li>
                </ul>
            </li>
            <li
                class="nav-item dropdown {{ Request::is('admin/job-category/*') ||
                Request::is('admin/job-location/*') ||
                Request::is('admin/job-type/*') ||
                Request::is('admin/job-experience/*') ||
                Request::is('admin/job-gender/*') ||
                Request::is('admin/job-salary-range/*')
                    ? 'active'
                    : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i><span>Job
                        Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/job-category/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_job_category_index') }}"><i class="fas fa-list-alt"></i> Job
                            Category</a></li>
                    <li class="{{ Request::is('admin/job-location/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_job_location_index') }}"><i class="fas fa-map-marker-alt"></i> Job
                            Location</a></li>
                    <li class="{{ Request::is('admin/job-type/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_job_type_index') }}"><i class="fas fa-network-wired"></i>&nbsp;Job
                            Type</a></li>
                    <li class="{{ Request::is('admin/job-experience/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_job_experience_index') }}">
                            <i class="fas fa-layer-group"></i> Job
                            Experience</a></li>
                    <li class="{{ Request::is('admin/job-gender/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_job_gender_index') }}">
                            <i class="fas fa-user-friends"></i> Job
                            Gender</a></li>
                    <li class="{{ Request::is('admin/job-salary-range/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_job_salary_range_index') }}">
                            <i class="fas fa-weight"></i> Job
                            Salary Range</a></li>
                </ul>
            </li>

            <li
                class="nav-item dropdown {{ Request::is('admin/all-subscribers') || Request::is('admin/subscribers-send-email') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bullhorn"></i><span>Subscriber
                        Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/all-subscribers') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_all_subscribers') }}"><i class="fas fa-reply-all"></i> All
                            Subscribers</a></li>
                    <li class="{{ Request::is('admin/subscribers-send-email') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_subscribers_send_email') }}"><i class="fas fa-envelope"></i> Send
                            Email to Subscribers</a></li>
                </ul>
            </li>

            <li
                class="{{ Request::is('admin/companies') ||
                Request::is('admin/companies-detail/*') ||
                Request::is('admin/companies-jobs/*') ||
                Request::is('admin/companies-applicants/*') ||
                Request::is('admin/companies-applicant-resume/*')
                    ? 'active'
                    : '' }}">
                <a class="nav-link" href="{{ route('admin_companies') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="Company Profile">
                    <i class="fas fa-building"></i> <span>Company Profile</span></a>
            </li>

            <li
                class="nav-item dropdown {{ Request::is('admin/company-location/*') ||
                Request::is('admin/company-industry/*') ||
                Request::is('admin/company-size/*')
                    ? 'active'
                    : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-building"></i><span>Company
                        Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/company-location/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_company_location_index') }}">
                            <i class="fas fa-map-marker-alt"></i> Company
                            Location</a></li>
                    <li class="{{ Request::is('admin/company-industry/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_company_industry_index') }}">
                            <i class="fas fa-industry"></i> Company Industry</a></li>
                    <li class="{{ Request::is('admin/company-size/*') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_company_size_index') }}">
                            <i class="fas fa-users"></i> Company Size</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/why-choose/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_why_choose_item') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="Why Choose Us Items">
                    <i class="fas fa-question"></i> <span>Why Choose Us Items</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_testimonial') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="Testimonials">
                    <i class="fas fa-quote-right"></i> <span>Testimonials</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_post') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="Posts">
                    <i class="fas fa-sign"></i> <span>Posts</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_faq') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="FAQs">
                    <i class="fas fa-question-circle"></i> <span>FAQ</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/package/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_package') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="Packages">
                    <i class="fas fa-box-open"></i> <span>Package</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/advertisement') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_advertisement') }}" data-bs-toggle="tooltip"
                    data-bs-placement="right" data-bs-title="Advertisement">
                    <i class="fas fa-ad"></i> <span>Advertisement</span></a>
            </li>

        </ul>
    </aside>
</div>
