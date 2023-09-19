@include('layouts.admin_layout.head-main')

<head>

@section('title') {{'BusinessOdisha'}} @endsection

    @include('layouts.admin_layout.head')

    <!-- select2 css -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/pages/ecommerce-shop.init.js') }}"></script>

    @include('layouts.admin_layout.head-style')

    <style>
    .button-container {
        display: flex;
        flex-wrap: wrap;
        gap: 2px;
        justify-content: flex-end;
    }
    </style>
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
                $maintitle = "Ecommerce";
                $title = "Edit Advertise";
                ?>
                    @include('layouts.admin_layout.breadcrumb')
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Basic Information</h4>
                                    <p class="card-title-desc">Fill all information below</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update-advertise/'.$admanagement->id) }}" id="userform"
                                        name="userform" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row" id="form-data">
                                            <div class="col-12">

                                            <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="ad_name">Name of the Advertise</label>
                                            <input id="ad_name" name="ad_name" type="text" class="form-control"
                                                required
                                                value="{{ $admanagement->ad_name }}">
                                        </div>
                                      
                                   
                                      
                                        <div class="col-md-6 mb-4">
                                            <label for="image">Upload image</label>
                                            <input id="image" name="image" type="file" class="form-control">
                                            <img src="{{ asset('uploads/userdata/'.$admanagement->image)}}" width="200"
                                                height="180" alt="{{ $admanagement->image }}">
                                        </div>

                                    </div>
                                   
                                                
                                                
                                                
                                                <div class="button-container">
                                                    <!-- <div class="d-flex flex-wrap gap-2"> -->
                                                    <button type="submit" id="create"
                                                        class="btn btn-primary waves-effect waves-light">Save
                                                        Changes</button>
                                                    <button type="button"
                                                        class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page-content -->

    @include('layouts.admin_layout.footer')
    </div>
    <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('layouts.admin_layout.right-sidebar')
    @include('layouts.admin_layout.vendor-scripts')

    <!-- select 2 plugin -->
    <script src="{{ asset('libs/select2/js/select2.min.js')}}"></script>

    <!-- dropzone plugin -->
    <script src="{{ asset('libs/dropzone/min/dropzone.min.js')}}"></script>

    <!-- init js -->
    <script src="{{ asset('js/pages/ecommerce-select2.init.js') }}"></script>
    <script>
    $('#drp-down').on('select2:select', function(e) {
        $("#form-data").css("display", "block");
    });
    </script>
    
</body>

</html>