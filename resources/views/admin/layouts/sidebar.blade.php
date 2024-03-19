<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{url('dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('minible/assets/images/LOGO PKM CERME.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('minible/assets/images/LOGO PKM CERME.png') }}" alt="" height="40">
            </span>
        </a>

        <a href="{{url('dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('minible/assets/images/LOGO PKM CERME.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('minible/assets/images/LOGO PKM CERME.png') }}" alt="" height="40">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">@lang('Menu')</li>

                <li>
                    {{-- <a href="{{url('index')}}"> --}}
                    <a href="{{url('/dashboard')}}">
                        <i class="uil-home-alt"></i>
                        <span>@lang('Dashboard')</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-blogger-alt"></i>
                        <span>@lang('Menu')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href={{ route('banner.list') }}>@lang('Banner')</a></li>
                        <li><a href={{ route('blog.list') }}>@lang('Blog')</a></li>
                        <li><a href={{ route('foto.list') }}>@lang('Galeri')</a></li>
                        <li><a href={{ route('dokter.list') }}>@lang('Dokter')</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-user-circle"></i>
                        <span>@lang('Users Management')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->