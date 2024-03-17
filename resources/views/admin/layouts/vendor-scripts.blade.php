<!-- JAVASCRIPT -->
<script src="{{ URL::asset('/minible/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ URL::asset('/minible/assets/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{ URL::asset('/minible/assets/libs/metismenu/metismenu.min.js')}}"></script>
<script src="{{ URL::asset('/minible/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ URL::asset('/minible/assets/libs/node-waves/node-waves.min.js')}}"></script>
<script src="{{ URL::asset('/minible/assets/libs/waypoints/waypoints.min.js')}}"></script>
<script src="{{ URL::asset('/minible/assets/libs/jquery-counterup/jquery-counterup.min.js')}}"></script>


@yield('script')

<!-- App js -->
<script src="{{ URL::asset('/minible/assets/js/app.min.js')}}"></script>
<!-- Loading js -->
<script src="{{ URL::asset('/minible/assets/js/loading.js')}}"></script>

@yield('script-bottom')