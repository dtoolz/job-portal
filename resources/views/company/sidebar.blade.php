<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Request::is('company/dashboard') ? 'active' : '' }}">
        <a href="{{ route('company_dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item {{ Request::is('company/make-payment') ? 'active' : '' }}">
        <a href="{{ route('company_make_payment') }}">Make Payment</a>
    </li>
    <li class="list-group-item">
        <a href="#">Orders</a>
    </li>
    <li class="list-group-item">
        <a href="#">Create Job</a>
    </li>
    <li class="list-group-item">
        <a href="#">All Jobs</a>
    </li>
    <li class="list-group-item">
        <a href="#">Photos</a>
    </li>
    <li class="list-group-item">
        <a href="#">Videos</a>
    </li>
    <li class="list-group-item">
        <a href="#">Candidate Applications</a>
    </li>
    <li class="list-group-item">
        <a href="#">Edit Profile</a>
    </li>
    <li class="list-group-item">
        <a href="#">Edit Password</a>
    </li>
    <li class="list-group-item">
        <a id="btn" href="{{ route('company_logout') }}">Logout</a>
    </li>
</ul>
