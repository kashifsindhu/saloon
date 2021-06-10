<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title') - Storakmart</title>

    <meta name="description"
        content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="{{ URL::to('/assets/vendor/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/assets/vendor/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/assets/vendor/charts-c3/plugin.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.css') }}" />

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::to('/assets/vendor/select2/select2.css') }}" />
    <!-- colorpicker -->
    <link rel="stylesheet"
        href="{{ URL::to('/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
    <!-- tagsinput -->
    <link rel="stylesheet" href="{{ URL::to('/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/assets/css/main.css') }}" type="text/css">

    {{-- files includes for datatables in index pages --}}
    <link rel="stylesheet" href="{{ URL::to('/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/assets/css/main.css') }}">

    {{-- sweetalerts --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="{{ URL::to('/admin/css/sweetalerts.css') }}">
    <script src="{{ URL::to('/admin/js/sweetalerts.js') }}"></script>

    {{-- Custom CSS File --}}
    <link rel="stylesheet" href="{{ URL::to('/admin/css/custom.css') }}">
</head>

<body class="theme-indigo">

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img src="{{ URL::to('/admin/images/preloaders/preloader.svg') }}" width="200" height="100"
                    alt="Pre-loader">
            </div>
            <p>Please wait...</p>
        </div>
    </div>

    {{-- INCLUDE TOPBAR --}}
    @include('admin.layouts.topbar')

    <div class="main_content" id="main-content">

        {{-- INCLUDE SIDEBAR --}}
        @include('admin.layouts.sidebar')

        {{-- INCLUDE SEETTINGS0-BAR --}}
        @include('admin.layouts.settingsbar')

        <div class="page">
            @yield('content')
        </div>
    </div>

    <!-- Core -->
    <script src="{{ URL::to('/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ URL::to('/assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ URL::to('/assets/bundles/c3.bundle.js') }}"></script>
    <script src="{{ URL::to('/assets/bundles/jvectormap.bundle.js') }}"></script>

    <!-- JVectorMap Plugin Js -->
    <script src="{{ URL::to('/assets/js/theme.js') }}"></script>
    <script src="{{ URL::to('/assets/js/pages/index.js') }}"></script>
    <script src="{{ URL::to('/assets/js/pages/todo-js.js') }}"></script>

    <!-- Select2 Js -->
    <script src="{{ URL::to('/assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ URL::to('/assets/js/theme.js') }}"></script>
    <script src="{{ URL::to('/assets/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ URL::to('/assets/js/pages/advanced-form.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ URL::to('/assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/jquery-datatable/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::to('/assets/vendor/jquery-datatable/buttons/buttons.print.min.js') }}"></script>

    @yield('customScripts')
</body>

</html>
