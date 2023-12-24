<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Request::is('company/dashboard') ? 'active' : '' }}">
        <a href="{{ route('company_dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item {{ Request::is('company/make-payment') ? 'active' : '' }}">
        <a href="{{ route('company_make_payment') }}">Make Payment</a>
    </li>
    <li class="list-group-item {{ Request::is('company/orders') ? 'active' : '' }}">
        <a href="{{ route('company_orders') }}">Orders</a>
    </li>
    <li class="list-group-item">
        <a href="#">Create Job</a>
    </li>
    <li class="list-group-item">
        <a href="#">All Jobs</a>
    </li>
    <li class="list-group-item {{ Request::is('company/photos') ? 'active' : '' }}">
        <a href="{{ route('company_photos') }}">Photos</a>
    </li>
    <li class="list-group-item {{ Request::is('company/videos') ? 'active' : '' }}">
        <a href="{{ route('company_videos') }}">Videos</a>
    </li>

    <li class="list-group-item">
        <a href="#">Candidate Applications</a>
    </li>
    <li class="list-group-item {{ Request::is('company/edit-profile') ? 'active' : '' }}">
        <a href="{{ route('company_edit_profile') }}">Edit Profile</a>
    </li>
    <li class="list-group-item {{ Request::is('company/edit-password') ? 'active' : '' }}">
        <a href="{{ route('company_edit_password') }}">Edit Password</a>
    </li>
    <li class="list-group-item">
        <a id="btn" href="{{ route('company_logout') }}">Logout</a>
    </li>
</ul>
