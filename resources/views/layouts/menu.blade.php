@can('dashboard-dashboard')
<li class="nav-item {{ Request::is('home*') || Request::is('/') ? 'active' : '' }}">
    <a href="{{ url('/') }}" class="d-flex align-items-center" target="_self">
        <i data-feather='home'></i>
        <span class="menu-title text-truncate">Dashboard</span>
        <span class="badge rounded-pill badge-light-primary ms-auto me-1"></span>
    </a>
</li>
@endcan

@canany(['transaksi-kayu masuk sakr','transaksi-kayu masuk dagang','transaksi-kayu keluar','transaksi-pemasukan','transaksi-pengeluaran','transaksi-penyewaan truk'])
<li>
    <a class="dropmenu d-flex align-items-center" target="_self" href="#">
        <i data-feather='clipboard'></i>
        <span class="menu-title text-truncate text-custom">Transaksi</span>
    </a>
    <ul>
        @can('transaksi-kayu masuk sakr')
        <li class="nav-item {{ Request::is('transaction/incomingWoods') || Request::is('transaction/incomingWoods/create') || Request::is('transaction/incomingWoods/*/edit') || Request::is('transaction/incomingWoods/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('transaction/incomingWoods'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Kayu Masuk SAKR</span>
            </a>
        </li>
        @endcan

        @can('transaksi-kayu masuk dagang')
        <li class="nav-item {{ Request::is('transaction/incomingWoodTrades') || Request::is('transaction/incomingWoodTrades/create') || Request::is('transaction/incomingWoodTrades/*/edit') || Request::is('transaction/incomingWoodTrades/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('transaction/incomingWoodTrades'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Kayu Masuk Dagang</span>
            </a>
        </li>
        @endcan

        @can('transaksi-kayu keluar')
        <li class="nav-item {{ Request::is('transaction/outcomingWoods') || Request::is('transaction/outcomingWoods/create') || Request::is('transaction/outcomingWoods/*/edit') || Request::is('transaction/outcomingWoods/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('transaction/outcomingWoods'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Kayu Keluar</span>
            </a>
        </li>
        @endcan

        @can('transaksi-penyewaan truk')
        <li class="nav-item {{ Request::is('transaction/truckRentals') || Request::is('transaction/truckRentals/create') || Request::is('transaction/truckRentals/*/edit') || Request::is('transaction/truckRentals/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('transaction/truckRentals'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Penyewaan Truk</span>
            </a>
        </li>
        @endcan

        @can('transaksi-pemasukan')
        <!-- <li class="nav-item {{ Request::is('transaction/incomes') || Request::is('transaction/incomes/create') || Request::is('transaction/incomes/*/edit') || Request::is('transaction/incomes/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('transaction/incomes'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Pemasukan</span>
            </a>
        </li> -->
        @endcan

        @can('transaksi-pengeluaran')
        <li class="nav-item {{ Request::is('transaction/expenses') || Request::is('transaction/expenses/create') || Request::is('transaction/expenses/*/edit') || Request::is('transaction/expenses/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('transaction/expenses'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Operasional</span>
            </a>
        </li>
        @endcan

    </ul>
</li>
@endcanany

@canany(['karyawan-kehadiran','karyawan-penggajian'])
<li>
    <a class="dropmenu d-flex align-items-center" target="_self" href="#">
        <i class="ficon" data-feather="users"></i>
        <span class="menu-title text-truncate text-custom">Karyawan</span>
    </a>
    <ul>
        @can('karyawan-kehadiran')
        <li class="nav-item {{ Request::is('employee/attendances') || Request::is('employee/attendances/create') || Request::is('employee/attendances/*/edit') || Request::is('employee/attendances/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('employee/attendances'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Kehadiran</span>
            </a>
        </li>
        @endcan

        @can('karyawan-penggajian')
        <li class="nav-item {{ Request::is('employee/salaries') || Request::is('employee/salaries/create') || Request::is('employee/salaries/*/edit') || Request::is('employee/salaries/*') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('employee/salaries'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Penggajian</span>
            </a>
        </li>
        @endcan

    </ul>
</li>
@endcanany

@canany(['laporan-log sengon masuk','laporan-balken keluar','laporan-kayu keluar','laporan-operasional','laporan-hasil dan laba','laporan-penyewaan truk','laporan-kehadiran'])
<li>
    <a class="dropmenu d-flex align-items-center" target="_self" href="#">
        <i data-feather='file-text'></i>
        <span class="menu-title text-truncate text-custom">Laporan</span>
    </a>
    <ul>
        @can('laporan-log sengon masuk')
        <li class="nav-item {{ Request::is('report/incomingWoods') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/incomingWoods'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Log Sengon Masuk</span>
            </a>
        </li>
        @endcan

        @can('laporan-balken keluar')
        <li class="nav-item {{ Request::is('report/outcomingWoodsBalken') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/outcomingWoodsBalken'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Balken Keluar</span>
            </a>
        </li>
        @endcan

        @can('laporan-kayu keluar')
        <li class="nav-item {{ Request::is('report/outcomingWoods') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/outcomingWoods'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Kayu Keluar</span>
            </a>
        </li>
        @endcan

        @can('laporan-operasional')
        <li class="nav-item {{ Request::is('report/expense') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/expense'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Operasional</span>
            </a>
        </li>
        @endcan

        @can('laporan-hasil dan laba')
        <li class="nav-item {{ Request::is('report/profit_loss') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/profit_loss'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Hasil Dan Laba</span>
            </a>
        </li>
        @endcan

        @can('laporan-penyewaan truk')
        <li class="nav-item {{ Request::is('report/truckRentals') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/truckRentals'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Penyewaan Truk</span>
            </a>
        </li>
        @endcan

        @can('laporan-penggajian')
        <!-- <li class="nav-item {{ Request::is('report/salaries') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/salaries'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Penggajian</span>
            </a>
        </li> -->
        @endcan

        @can('laporan-pemasukan')
        <!-- <li class="nav-item {{ Request::is('report/income') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/income'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Pemasukan</span>
            </a>
        </li> -->
        @endcan

        @can('laporan-kehadiran')
        <li class="nav-item {{ Request::is('report/attendances') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('report/attendances'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Kehadiran</span>
            </a>
        </li>
        @endcan

    </ul>
</li>
@endcanany

@canany(['pengaturan-template kayu masuk','pengaturan-template kayu keluar','pengaturan-produk','pengaturan-jenis kayu masuk','pengaturan-jenis kayu keluar','pengaturan-customer','pengaturan-supplier','pengaturan-gudang','pengaturan-karyawan','pengaturan-pengguna','pengaturan-hak akses','pengaturan-perusahaan'])
<li>
    <a class="dropmenu d-flex align-items-center" target="_self" href="#">
        <i class="ficon" data-feather="settings"></i>
        <span class="menu-title text-truncate text-custom">Pengaturan</span>
    </a>
    <ul>

        @can('pengaturan-template kayu masuk')
        <li class="nav-item {{ Request::is('master/templateWoods') || Request::is('master/templateWoods/create') || Request::is('master/templateWoods/*/edit') || Request::is('master/woodCategories') || Request::is('master/woodCategories/create') || Request::is('master/woodCategories/*/edit') || Request::is('master/woodSizes') || Request::is('master/woodSizes/create') || Request::is('master/woodSizes/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/templateWoods'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Template Kayu Masuk</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-template kayu keluar')
        <li class="nav-item {{ Request::is('master/templateWoodOuts') || Request::is('master/templateWoodOuts/create') || Request::is('master/templateWoodOuts/*/edit') || Request::is('master/woodCategoryOuts') || Request::is('master/woodCategoryOuts/create') || Request::is('master/woodCategoryOuts/*/edit') || Request::is('master/woodSizeOuts') || Request::is('master/woodSizeOuts/create') || Request::is('master/woodSizeOuts/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/templateWoodOuts'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Template Kayu Keluar</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-produk')
        <li class="nav-item {{ Request::is('master/products') || Request::is('master/products/create') || Request::is('master/products/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/products'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Produk</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-jenis kayu masuk')
        <li class="nav-item {{ Request::is('master/woodTypes') || Request::is('master/woodTypes/create') || Request::is('master/woodTypes/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/woodTypes'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Jenis Kayu Masuk</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-jenis kayu keluar')
        <li class="nav-item {{ Request::is('master/woodTypeOuts') || Request::is('master/woodTypeOuts/create') || Request::is('master/woodTypeOuts/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/woodTypeOuts'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Jenis Kayu Keluar</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-customer')
        <li class="nav-item {{ Request::is('master/customers') || Request::is('master/customers/create') || Request::is('master/customers/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/customers'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Customer</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-supplier')
        <li class="nav-item {{ Request::is('master/suppliers') || Request::is('master/suppliers/create') || Request::is('master/suppliers/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/suppliers'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Supplier</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-gudang')
        <li class="nav-item {{ Request::is('master/warehouses') || Request::is('master/warehouses/create') || Request::is('master/warehouses/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/warehouses'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Gudang</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-karyawan')
        <li class="nav-item {{ Request::is('master/employees') || Request::is('master/employees/create') || Request::is('master/employees/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/employees'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Karyawan</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-pengguna')
        <li class="nav-item {{ Request::is('master/users') || Request::is('master/users/create') || Request::is('master/users/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/users'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Pengguna</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-hak akses')
        <li class="nav-item {{ Request::is('master/roles') || Request::is('master/roles/create') || Request::is('master/roles/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/roles'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Hak Akses</span>
            </a>
        </li>
        @endcan

        @can('pengaturan-perusahaan')
        <li class="nav-item {{ Request::is('master/companies/*/edit') ? 'active ' : '' }}">
            <a class="submenu" href="{{ url('master/companies/1/edit'); }}">
                <i class="ficon" data-feather="circle"></i>
                <span class="text text-custom">Perusahaan</span>
            </a>
        </li>
        @endcan
        
    </ul>
</li>
@endcanany


