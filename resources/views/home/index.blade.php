@include('layouts.admin_layout.head-main')

<head>

    <title> Dason - Admin & Dashboard Template</title>

    @include('layouts.admin_layout.head')
    @include('layouts.admin_layout.head-style')

</head>

<body data-topbar="dark">

<!-- Begin page -->
<div id="layout-wrapper">
@include('layouts.admin_layout.menu')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?php
                $maintitle = "Dashboard";
                $title = "Welcome !";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                

              

               

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

         @include('layouts.admin_layout.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->
@include('layouts.admin_layout.right-sidebar') 
@include('layouts.admin_layout.vendor-scripts')
<!-- apexcharts -->
<script src="{{ asset('libs/apexcharts/apexcharts.min.js') }} "></script>

<!-- Plugins js-->
<script src="{{ asset('libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- dashboard init -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
<script>
    $(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert-success").alert('close');
    }, 2000);
})
</script>

</body>

</html>