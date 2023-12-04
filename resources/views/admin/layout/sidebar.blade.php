<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="active">
                <a class="nav-link" href="{{ route('admin_home') }}"  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard">
                    <i class="fas fa-columns"></i>
                   <span>Dashboard</span>
               </a>
            </li>

            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-marker"></i><span>Page Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href="{{ route('admin_home_page_content') }}"><i class="fas fa-angle-right"></i> Home</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Terms</a></li>
                </ul>
            </li>

            <li class=""><a  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Setting" class="nav-link" href="setting.html"><i class="fas fa-wrench"></i> <span>Setting</span></a></li>

            <li class=""><a  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Form" class="nav-link" href="form.html"><i class="fas fa-scroll"></i> <span>Form</span></a></li>

            <li class=""><a  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Table" class="nav-link" href="table.html"><i class="fas fa-table"></i> <span>Table</span></a></li>

            <li class=""><a  data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Invoice" class="nav-link" href="invoice.html"><i class="fas fa-file-invoice"></i> <span>Invoice</span></a></li>

        </ul>
    </aside>
</div>
