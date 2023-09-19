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
                $title = "Update Seller Profile";
                ?>
                    @include('layouts.admin_layout.breadcrumb')
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-12">
                             <!-- @if (session('success'))  -->
                             
                            <h6 class="alert alert-success">{{ session('success') }}</h6>
                         <!-- @endif  -->
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Basic Information</h4>
                                    <p class="card-title-desc">Fill all information below</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('update-profile/'.$adminData->id) }}" id="userform"
                                        name="userform" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row" id="form-data">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <label for="image">Upload Profile Picture</label>
                                                        <input id="image" name="profile_image" type="file" class="form-control">
                                                       
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="avatar-xxl me-3">
                                                            <img src="{{ asset('uploads/userdata/profile_image/'.$adminData->profile_image)}}" class="img-fluid rounded-circle d-block img-thumbnail" id="showimg">
                                                        </div>
                                                        
                                                    </div>
            
                                                </div>
                                            {{-- <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <label for="seller_name">Name of the Company</label>
                                                    <input id="seller_name" name="seller_name" type="text" class="form-control"
                                                        required
                                                        value="{{ $adminData->company_name }}">
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label for="seller_name">Name of the Seller</label>
                                                    <input id="seller_name" name="seller_name" type="text" class="form-control"
                                                    
                                                        value="{{ $adminData->seller_name }}">


                                                </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="name">Name of User</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                required
                                                value="{{ $adminData->name }}">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="mobile">Phone</label>
                                            <input id="mobile" name="mobile" type="text" class="form-control" 
                                                onkeyup="this.value=this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')"
                                                value="{{ $adminData->mobile }}">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="email">Email</label>
                                            <input id="email" name="email" type="text" class="form-control"
                                                value="{{ $adminData->email }}">
                                            <span id="error_email"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address"
                                                value="{{ $adminData->address }}" class="form-control">


                                        </div>
                                        {{-- <div class="col-md-6 mb-4">
                                            <label for="manufacturerbrand">Year of Establishment</label>
                                            <select class="form-control" id="year_drp_down" name="year_drp_down">

                                            </select>
                                        </div> --}}
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="password">Password</label>
                                            <input id="password" name="password" type="password" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="cpassword">Confirm Password</label>
                                            <input id="cpassword" name="cpassword" type="password" class="form-control"
                                                onkeyup="validate_password()">
                                            <span id="wrong_pass_alert"></span>
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
    
    
    <script>
    function validate_password() {
        var pass = document.getElementById('password').value;
        var confirm_pass = document.getElementById('cpassword').value;
        if (pass != '') {
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML = '☒ Use same password';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }

    }
    </script>
    <script>
    $(document).ready(function() {

        $('#email').blur(function() {
            var error_email = '';
            var email = $('#email').val();
            var _token = $('input[name="_token"]').val();
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email)) {
                $('#error_email').html('<label class="text-danger">Invalid Email</label>');
                $('#email').addClass('has-error');
                $('#create').attr('disabled', 'disabled');
            } else {
                $.ajax({
                    url: "{{ url('email_available_check') }}",
                    method: "POST",
                    data: {
                        email: email,
                        _token: _token
                    },
                    success: function(result) {
                        if (result == 'unique') {
                            $('#error_email').html(
                                '<label class="text-success">Email Available</label>');
                            $('#email').removeClass('has-error');
                            $('#create').attr('disabled', false);
                        } else {
                            $('#error_email').html(
                                '<label class="text-danger">Email not Available</label>'
                                );
                            $('#email').addClass('has-error');
                            $('#create').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        });

    });
    </script>
    <!--tinymce js-->
    <script src="{{ asset('libs/tinymce/tinymce.min.js') }}"></script>
    <script src=" {{ asset('js/pages/task-create.init.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showimg').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
</body>

</html>