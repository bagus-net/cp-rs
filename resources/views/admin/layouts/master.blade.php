<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts.title-meta')
    @include('admin.layouts.head')
</head>

@section('body')

<body>
    @show

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin.layouts.topbar')
        @include('admin.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="card-image skeleton">
            <div id="loading" class="loading">
                <div class="loading-circle"></div>
            </div>
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                @include('admin.layouts.footer')
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        @include('admin.layouts.right-sidebar')
        <!-- /Right-bar -->

        <!-- JAVASCRIPT -->
        @include('admin.layouts.vendor-scripts')
</body>

</html>