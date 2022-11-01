<li class="nav-item {{ Request::is('home*') || Request::is('/') ? 'active' : '' }}">
    <a href="{{ url('home') }}" class="d-flex align-items-center" target="_self">
        <i data-feather='home'></i>
        <span class="menu-title text-truncate">Home</span>
        <span class="badge rounded-pill badge-light-primary ms-auto me-1"></span>
    </a>
</li>
<li>
    <a class="dropmenu d-flex align-items-center" target="_self" href="#">
        <i class="ficon" data-feather="settings"></i>
        <span class="menu-title text-truncate text-custom">Pengaturan</span>
    </a>
    <ul>
        <li class="nav-item {{ Request::is('master/roles') || Request::is('master/roles/create') || Request::is('master/roles/*/edit') ? 'active ' : '' }}" id="purchases_index">
            <a class="submenu" href="{{ url('master/roles'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Hak Akses</span>
            </a>
        </li>
    </ul>
</li>