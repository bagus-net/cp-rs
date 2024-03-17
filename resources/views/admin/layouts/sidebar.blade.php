<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{url('dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/mgm.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/mgm-light.png') }}" alt="" height="40">
            </span>
        </a>

        <a href="{{url('dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/mgm.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/mgm-dard.png') }}" alt="" height="40">
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
                <li class="menu-title">@lang('translation.Menu')</li>

                <li>
                    {{-- <a href="{{url('index')}}"> --}}
                    <a href="{{url('/dashboard')}}">
                        <i class="uil-home-alt"></i>
                        <span>@lang('translation.Dashboard')</span>
                    </a>
                </li>
                {{-- SIDEBAR SPK --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-grid-alt"></i>
                        @if (Auth::user()->level == '2' OR Auth::user()->level == '1')
                            @if ($countlistmg > 0)
                                <span class="badge rounded-pill bg-info float-end"> {{ $countlistmg }}</span>
                            @endif
                        @endif
                        
                        @if (Auth::user()->level == '4' OR Auth::user()->level == '1')
                            @if ($countlistqc > 0)
                                <span class="badge rounded-pill bg-danger float-end"> {{ $countlistqc }}</span>
                            @endif
                        @endif
                        <span>@lang('Transaksi')</span> 
                    </a>
                    @if (Auth::user()->level == '3' OR Auth::user()->level == '1')
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="{{ url('/ftkp/add') }}">@lang('Create FTKP')</a></li>
                        </ul>
                    @endif
                    @if (Auth::user()->level == '4' OR Auth::user()->level == '1')
                        <ul class="sub-menu" aria-expanded="true">
                            <li>
                                <a href="{{ url('/qc') }}">@lang('List Approve QC')
                                    @if ($countlistqc > 0)
                                        <span class="badge rounded-pill bg-danger float-end">{{ $countlistqc }}</span>
                                    @endif
                                </a>
                            </li> 
                        </ul>
                    @endif
                    @if (Auth::user()->level == '2' OR Auth::user()->level == '1')
                        <ul class="sub-menu" aria-expanded="true">
                            <li>
                                <a href="{{ url('/manager') }}">@lang('List Approve Manager')
                                    @if ($countlistmg > 0)
                                        <span class="badge rounded-pill bg-info float-end">{{ $countlistmg }}</span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    @endif
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-task  "></i>
                        <span>@lang('Report')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href={{ url('/history') }}>@lang('History')</a></li>
                        <li><a href={{ url('/laporanftkp') }}>@lang('Laporan FTKP')</a></li>
                    </ul>
                </li>

                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-server"></i>
                        <span>@lang('Daftar')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href={{ url('/ftkp') }}>@lang('Data FKTP')</a></li>
                        @if (Auth::user()->level == '1')
                        {{-- <li><a href={{ url('/spk') }}>@lang('Data Order Produksi')</a></li>
                        <li><a href={{ url('/cust') }}>@lang('Data Master Customer')</a></li>
                        <li><a href={{ url('/kategori') }}>@lang('Data Master Kategori')</a></li> --}}
                        @endif
                    </ul>
                </li>
                
                @if (Auth::user()->level == '1')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-user-circle"></i>
                        <span>@lang('Users Management')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href={{ route('user.list') }}>@lang('User')</a></li>
                        <li><a href={{ route('role.list') }}>@lang('Roles')</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->