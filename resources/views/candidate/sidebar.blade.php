<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Request::is('candidate/dashboard') ? 'active' : '' }}">
        <a href="{{ route('candidate_dashboard') }}">Dashboard</a>
    </li>
    <li class="list-group-item">
        <a href="#">Applied Jobs</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/bookmark/*') ? 'active' : '' }}">
        <a href="{{ route('candidate_bookmark_index') }}">Bookmarked Jobs</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/education/*') ? 'active' : '' }}">
        <a href="{{ route('candidate_education_index') }}">Education</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/skill/*') ? 'active' : '' }}">
        <a href="{{ route('candidate_skill_index') }}">Skills</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/experience/*') ? 'active' : '' }}">
        <a href="{{ route('candidate_experience_index') }}">Work Experience</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/award/*') ? 'active' : '' }}">
        <a href="{{ route('candidate_award_index') }}">Awards</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/resume/*') ? 'active' : '' }}">
        <a href="{{ route('candidate_resume_index') }}">Resume Upload</a>
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
