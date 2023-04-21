<!doctype html>
<html lang="en">

<head>

    @include('admin.layouts.head')

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div class="wrapper">

        @include('admin.layouts.navbar')

        @include('admin.layouts.sidebar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

                    @yield('section')

        <!-- end main content-->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- END layout-wrapper -->

    @include('admin.layouts.scripts')

</body>

</html>
