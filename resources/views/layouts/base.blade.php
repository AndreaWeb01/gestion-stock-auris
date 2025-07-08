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
    <link rel="shortcut icon" href="{{url('assets/images/favicon.ico')}}">

    <link href="{{url('assets/libs/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{url('assets/css/style.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <script src="{{url('assets/js/config.js')}}"></script>
    <link rel="shortcut icon" href="{{url('assets/images/favicon.ico')}} ">

        <!-- third party css -->
        <link href="{{url('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

		<!-- App css -->
		<link href="{{url('assets/css/style.min.css')}}" rel="stylesheet" type="text/css">
		<link href="{{url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
		<script src="{{url('assets/js/config.js')}}"></script>



</head>

<body>

    <div class="layout-wrapper">

        <div>@include('layouts.sidebar')</div>
        <div class="page-content">

            <!-- ========== Topbar Start ========== -->

            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">
                     <div>
                         @include('layouts.top-bar')
                    </div>

                    <!-- start page title -->


        @yield('content')

    </div>


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
    <script src="{{url('assets/js/vendor.min.js')}}"></script>
    <script src="{{url('assets/js/app.js')}}"></script>

    <!-- Jquery Sparkline Chart  -->
    <script src="{{url('assets/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Jquery-knob Chart Js-->
    <script src="{{url('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>


    <!-- Morris Chart Js-->
    <script src="{{url('assets/libs/morris.js/morris.min.js')}}"></script>

    <script src="{{url('assets/libs/raphael/raphael.min.js')}}"></script>

    <!-- Dashboard init-->
    <script src="{{url('assets/js/pages/dashboard.js')}}"></script>

    <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.js"></script>

        <!-- third party js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables js -->
        <script src="assets/js/pages/datatables.js"></script>
        @yield('scripts')

</body>

</html>
