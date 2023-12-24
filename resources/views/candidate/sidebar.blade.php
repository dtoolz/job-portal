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
    <li class="list-group-item {{ Request::is('candidate/education/index') ? 'active' : '' }}">
        <a href="{{ route('candidate_education_index') }}">Education</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/skill/index') ? 'active' : '' }}">
        <a href="{{ route('candidate_skill_index') }}">Skills</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/experience/index') ? 'active' : '' }}">
        <a href="{{ route('candidate_experience_index') }}">Work Experience</a>
    </li>
    <li class="list-group-item">
        <a href="#">Awards</a>
    </li>
    <li class="list-group-item">
        <a href="#">Resume Upload</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/edit-profile') ? 'active' : '' }}">
        <a href="{{ route('candidate_edit_profile') }}">Edit Profile</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/edit-password') ? 'active' : '' }}">
        <a href="{{ route('candidate_edit_password') }}">Edit Password</a>
    </li>
    <li class="list-group-item">
        <a id="btn" href="{{ route('candidate_logout') }}">Logout</a>
    </li>
</ul>
