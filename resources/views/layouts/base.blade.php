<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="dark" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Drezoc - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Drezoc - Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{url('assets/css/style.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{url('assets/js/config.js')}}"></script>
</head>

<body>

    <div class="layout-wrapper">

       <div>
           @include('layouts.sidebar')
        </div>

        @yield('content')

        
          <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div><script>document.write(new Date().getFullYear())</script> © Drezoc</div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Design & Develop by <a href="https://myrathemes.com/" target="_blank">MyraStudio</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Jquery Sparkline Chart  -->
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- Jquery-knob Chart Js-->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>


    <!-- Morris Chart Js-->
    <script src="assets/libs/morris.js/morris.min.js"></script>

    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init-->
    <script src="assets/js/pages/dashboard.js"></script>

</body>

</html>
