<li class="nav-item {{ Request::is('home*') || Request::is('/') ? 'active' : '' }}">
    <a href="{{ url('home') }}" class="d-flex align-items-center" target="_self">
        <i data-feather='home'></i>
        <span class="menu-title text-truncate">Dashboard</span>
        <span class="badge rounded-pill badge-light-primary ms-auto me-1"></span>
    </a>
</li>
<li>
    <a class="dropmenu d-flex align-items-center" target="_self" href="#">
        <i class="ficon" data-feather="shopping-bag"></i>
        <span class="menu-title text-truncate text-custom">Transaksi</span>
    </a>
    <ul>
        <li class="nav-item {{ Request::is('transaction/incomingWoods') || Request::is('transaction/incomingWoods/create') || Request::is('transaction/incomingWoods/*/edit') || Request::is('transaction/incomingWoods/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('transaction/incomingWoods'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Kayu Masuk</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a class="dropmenu d-flex align-items-center" target="_self" href="#">
        <i class="ficon" data-feather="users"></i>
        <span class="menu-title text-truncate text-custom">Karyawan</span>
    </a>
    <ul>
        <li class="nav-item {{ Request::is('employee/attendances') || Request::is('employee/attendances/create') || Request::is('employee/attendances/*/edit') || Request::is('employee/attendances/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('employee/attendances'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Kehadiran</span>
            </a>
        </li>
    </ul>
</li>
<li>
    <a class="dropmenu d-flex align-items-center" target="_self" href="#">
        <i class="ficon" data-feather="settings"></i>
        <span class="menu-title text-truncate text-custom">Pengaturan</span>
    </a>
    <ul>
        <li class="nav-item {{ Request::is('master/woodTypes') || Request::is('master/woodTypes/create') || Request::is('master/woodTypes/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/woodTypes'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Jenis Kayu</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('master/suppliers') || Request::is('master/suppliers/create') || Request::is('master/suppliers/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/suppliers'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Pemasok</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('master/warehouses') || Request::is('master/warehouses/create') || Request::is('master/warehouses/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/warehouses'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Gudang</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('master/employees') || Request::is('master/employees/create') || Request::is('master/employees/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/employees'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Karyawan</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('master/users') || Request::is('master/users/create') || Request::is('master/users/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/users'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Pengguna</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('master/roles') || Request::is('master/roles/create') || Request::is('master/roles/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/roles'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Hak Akses</span>
            </a>
        </li>
    </ul>
</li>


