<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/upcube/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:29:29 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Buy Brand Tools | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Buy Brand Tools Admin" name="description" />
    <meta content="Buy Brand Tools Admin" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('back/assets/') }}/images/favicon.ico">

    <!-- jquery.vectormap css -->
    <link href="{{ asset('back/assets/') }}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css"
        rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('back/assets/') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('back/assets/') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('back/assets/') }}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('back/assets/') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('back/assets/') }}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    @stack('css')

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    @include('back.includes.header')
    @include('back.includes.sidebar')
    <!-- Begin page -->
    <div id="layout-wrapper">

        <div class="main-content">
            @yield('content')
            @include('back.includes.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('back/assets/') }}/libs/jquery/jquery.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/node-waves/waves.min.js"></script>


    <!-- apexcharts -->
    @if(Route::currentRouteName() == 'admin.dashboard')
        <script src="{{ asset('back/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('back/assets/js/pages/dashboard.init.js') }}"></script>
    @endif

    <!-- jquery.vectormap map -->
    <script src="{{ asset('back/assets/') }}/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js">
    </script>
    <script src="{{ asset('back/assets/') }}/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js">
    </script>

    <!-- Required datatable js -->
    <script src="{{ asset('back/assets/') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('back/assets/') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('back/assets/') }}/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="{{ asset('back/assets/') }}/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ asset('back/assets/') }}/js/app.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Toastr bildirimleri -->
    @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
    @stack('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
</body>


<!-- Mirrored from themesdesign.in/upcube/layouts/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:30:06 GMT -->

</html>