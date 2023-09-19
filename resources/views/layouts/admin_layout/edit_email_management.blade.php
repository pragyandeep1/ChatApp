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
                $title = "Edit Email Setting";
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
                                    <form action="{{ url('update-email-send-settings/'.$admanagement->id) }}"
                                        id="userform" name="userform" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row" id="form-data">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label for="purpose">Purpose</label>
                                                        <input id="purpose" name="purpose" type="text"
                                                            class="form-control" required
                                                            value="{{ $admanagement->purpose }}">
                                                    </div>



                                                    <div class="col-md-6 mb-4">
                                                        <label for="email">Email</label>
                                                        <input id="email" name="email" type="text" class="form-control"
                                                            value="{{ $admanagement->email }}">

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label for="name">Name</label>
                                                        <input id="name" name="name" type="text"
                                                            class="form-control" 
                                                            value="{{ $admanagement->name ?? '' }}">
                                                    </div>



                                                    <div class="col-md-6 mb-4">
                                                        <label for="cc">CC</label>
                                                        <input id="cc" name="cc" type="text" class="form-control"
                                                            value="{{ $admanagement->cc ?? '' }}">

                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label for="reply_to">Reply To</label>
                                                        <input id="reply_to" name="reply_to" type="text"
                                                            class="form-control" 
                                                            value="{{ $admanagement->reply_to ?? '' }}">
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