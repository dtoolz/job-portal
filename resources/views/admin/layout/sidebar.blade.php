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
                <a class="nav-link" href="{{ route('admin_home') }}"  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard">
                    <i class="fas fa-columns"></i>
                   <span>Dashboard</span>
               </a>
            </li>

            <li class=""><a  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Setting" class="nav-link" href="setting.html"><i class="fas fa-wrench"></i> <span>Admin Settings</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/home-page-content') || Request::is('admin/blog-page') ||Request::is('admin/faq-page') || Request::is('admin/term-page') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-marker"></i><span>Page Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-page-content') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_page_content') }}"><i class="fas fa-home"></i> Home Page</a></li>
                    <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_blog_page') }}"><i class="fas fa-blog"></i> Blog Page</a></li>
                    <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fas fa-question-circle"></i> FAQ</a></li>
                    <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_term_page') }}"><i class="fas fa-file-contract"></i> Terms of Use</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/job-category/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i><span>Job Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/job-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category_index') }}"><i class="fas fa-list-alt"></i> Job Category</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-map-marker-alt"></i> Job Location</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/why-choose/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_why_choose_item') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Why Choose Us Items">
                    <i class="fas fa-question"></i> <span>Why Choose Us Items</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_testimonial') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Testimonials">
                    <i class="fas fa-quote-right"></i> <span>Testimonials</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_post') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Posts">
                    <i class="fas fa-sign"></i> <span>Posts</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_faq') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="FAQs">
                    <i class="fas fa-question-circle"></i> <span>FAQ</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
