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

<!-- Tags input css start -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>
   
<!-- Tags input css end -->

    <style>
         .bootstrap-tagsinput{
            width: 100%;
        }
        .label-info{
            background-color: #17a2b8;

        }
        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,
            border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
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

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <?php
                $maintitle = "Ecommerce";
                $title = "Edit Promotion";
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
                                    <form action="{{ url('update-promotion/'.$admanagement->id) }}" id="userform"
                                        name="userform" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row" id="form-data">
                                            <div class="col-12">

                                            <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="package1">Package 1</label>
                                            <input id="package1" data-role="tagsinput" name="package1" type="text" class="form-control"
                                                required
                                                value="{{ $admanagement->package1 }}">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="package2">Package 2</label>
                                            <input id="package2" data-role="tagsinput" name="package2" type="text" class="form-control"
                                                required
                                                value="{{ $admanagement->package2 }}">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="package3">Package 3</label>
                                            <input id="package3" data-role="tagsinput" name="package3" type="text" class="form-control"
                                                required
                                                value="{{ $admanagement->package3 }}">
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