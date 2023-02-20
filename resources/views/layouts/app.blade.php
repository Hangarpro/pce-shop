<!doctype html>
<html lang="en">

  <head>

    @include('layouts.head')

  </head>

    <body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

          @include('layouts.navbar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        
                        <!-- end page title -->

                        @yield('section')

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                @include('layouts.footer')

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        @include('layouts.scripts')

    </body>

</html>