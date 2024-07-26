<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link @if (!str_contains(Request::route()->getName(), 'dashboard.')) collapsed @endif " href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (!str_contains(Request::route()->getName(), 'submission.')) collapsed @endif "
                href="{{ route('submission.index') }}">
                <i class="bi bi-menu-button-wide"></i>
                <span>Pengajuan</span>
            </a>
        </li>
        @canany(['finance', 'director'])
            <li class="nav-item">
                <a class="nav-link @if (!str_contains(Request::route()->getName(), 'user.')) collapsed @endif " href="{{ route('user.index') }}">
                    <i class="bi bi-person"></i>
                    <span>User</span>
                </a>
            </li>
        @endcanany


    </ul>

</aside>
