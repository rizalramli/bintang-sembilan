@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ (($configData['theme'] === 'dark') || ($configData['theme'] === 'semi-dark')) ? 'menu-dark' : 'menu-light'}} menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ url('home') }}">
                    <span class="brand-logo">
                         
                    <h2 class="brand-text" >POS </h2>
                    </span>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            {{-- Foreach menu item starts --}}
            {{-- <li class="navigation-header">
        <span>Navigasi Header</span>
        <i data-feather="more-horizontal"></i>
      </li>  --}}
            {{-- Add Custom Class with nav-item --}}

            <li class="nav-item {{ Request::is('home*') || Request::is('/') ? 'active' : '' }}">
                <a href="{{ url('home') }}" class="d-flex align-items-center" target="_self">
                    <i data-feather='home'></i>
                    <span class="menu-title text-truncate">Home</span>
                    <span class="badge rounded-pill badge-light-primary ms-auto me-1"></span>
                </a>
            </li>
 
            {{-- @include('layouts.menu')  --}}
        </ul>

        


    </div>
</div>
<!-- END: Main Menu-->