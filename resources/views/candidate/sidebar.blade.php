<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Request::is('candidate/dashboard') ? 'active' : '' }}">
        <a href="{{ route('candidate_dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item">
        <a href="#">Applied Jobs</a>
    </li>
    <li class="list-group-item">
        <a href="#">Bookmarked Jobs</a>
    </li>
    <li class="list-group-item">
        <a href="#">Education</a>
    </li>
    <li class="list-group-item">
        <a href="#">Skills</a>
    </li>
    <li class="list-group-item">
        <a href="#">Work Experience</a>
    </li>
    <li class="list-group-item">
        <a href="#">Awards</a>
    </li>
    <li class="list-group-item">
        <a href="#">Resume Upload</a>
    </li>
    <li class="list-group-item">
        <a href="#">Edit Profile</a>
    </li>
    <li class="list-group-item">
        <a href="#">Edit Password</a>
    </li>
    <li class="list-group-item">
        <a id="btn" href="{{ route('candidate_logout') }}">Logout</a>
    </li>
</ul>
