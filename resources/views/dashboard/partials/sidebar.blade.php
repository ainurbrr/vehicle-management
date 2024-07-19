<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('approvals*') ? 'active' : '' }}" href="/approvals">
                    <span data-feather="check-square"></span>
                    Approval
                </a>
            </li>
            @if(!auth()->user()->isApprover())
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span></h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('bookings*') ? 'active' : '' }}" href="/bookings">
                    <span data-feather="clipboard"></span>
                    Book Vehicle
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('vehicles*') ? 'active' : '' }}" href="/vehicles">
                    <span data-feather="compass"></span>
                    Vehicle
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/drivers*') ? 'active' : '' }}" href="/drivers">
                    <span data-feather="users"></span>
                    Driver
                </a>
            </li>
            @if (!auth()->user()->isAdmin())
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Super Administrator</span></h6>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/users">
                    <span data-feather="user"></span>
                    User
                </a>
            </li>
            @endif
            @endif
        </ul>
    </div>
</nav>
