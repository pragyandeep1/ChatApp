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
                $title = "Edit Seller";
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
                                    <form action="{{ url('update-seller/'.$clinicdata->id) }}" id="userform"
                                        name="userform" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row" id="form-data">
                                            <div class="col-12">

                                            <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="seller_name">Name of the Company</label>
                                            <input id="seller_name" name="seller_name" type="text" class="form-control"
                                                required
                                                value="{{ $clinicdata->company_name }}">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="seller_name">Name of the Seller</label>
                                            <input id="seller_name" name="seller_name" type="text" class="form-control"
                                               
                                                value="{{ $clinicdata->seller_name }}">


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="phone">Phone</label>
                                            <input id="phone" name="phone" type="text" class="form-control" 
                                                onkeyup="this.value=this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')"
                                                value="{{ $clinicdata->phone }}">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="email">Email</label>
                                            <input id="email" name="email" type="text" class="form-control"
                                                value="{{ $clinicdata->email }}">
                                            <span id="error_email"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="full_address">Address</label>
                                            <input type="text" name="full_address" id="full_address"
                                                value="{{ $clinicdata->full_address }}" class="form-control">


                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="manufacturerbrand">Year of Establishment</label>
                                            <select class="form-control" id="year_drp_down" name="year_drp_down">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="longitude">Longitude</label>
                                            <input id="longitude" name="longitude" value="{{ $clinicdata->longitude }}"
                                                type="text" class="form-control"
                                                onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="latitude">Latitude</label>
                                            <input id="latitude" name="latitude" type="text" class="form-control"
                                                value="{{ $clinicdata->latitude }}"
                                                onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                        </div>
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
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="pan_no">PAN No.</label>
                                            <input type="text" name="pan_no" id="pan_no" class="form-control"
                                                value="{{ $clinicdata->pan_no }}">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="closing_time">GST No.</label>
                                            <input type="text" name="gst_no" id="gst_no" class="form-control"
                                                value="{{ $clinicdata->gst_no }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="opening_time">Opening time</label><br />
                                            <select name="opening_time" id="opening_time" class="form-select select2">
                                                <option value="0">Select Slot Start Time</option>
                                                <option value="6am"
                                                    {{ ($clinicdata->opening_time == '6am')? 'selected':'' }}>
                                                    6.00 AM</option>
                                                <option value="7am"
                                                    {{ ($clinicdata->opening_time == '7am')? 'selected':'' }}>
                                                    7.00 AM</option>
                                                <option value="8am"
                                                    {{ ($clinicdata->opening_time == '8am')? 'selected':'' }}>
                                                    8.00 AM</option>
                                                <option value="9am"
                                                    {{ ($clinicdata->opening_time == '9am')? 'selected':'' }}>
                                                    9.00 AM</option>
                                                <option value="10am"
                                                    {{ ($clinicdata->opening_time == '10am')? 'selected':'' }}>
                                                    10.00 AM</option>
                                                <option value="11am"
                                                    {{ ($clinicdata->opening_time == '11am')? 'selected':'' }}>
                                                    11.00 AM</option>
                                                <option value="12pm"
                                                    {{ ($clinicdata->opening_time == '12pm')? 'selected':'' }}>
                                                    12.00 PM</option>
                                                <option value="1pm"
                                                    {{ ($clinicdata->opening_time == '1pm')? 'selected':'' }}>
                                                    1.00 PM</option>
                                                <option value="2pm"
                                                    {{ ($clinicdata->opening_time == '2pm')? 'selected':'' }}>
                                                    2.00 PM</option>
                                                <option value="3pm"
                                                    {{ ($clinicdata->opening_time == '3pm')? 'selected':'' }}>
                                                    3.00 PM</option>
                                                <option value="4pm"
                                                    {{ ($clinicdata->opening_time == '4pm')? 'selected':'' }}>
                                                    4.00 PM</option>
                                                <option value="5pm"
                                                    {{ ($clinicdata->opening_time == '5pm')? 'selected':'' }}>
                                                    5.00 PM</option>
                                                <option value="6pm"
                                                    {{ ($clinicdata->opening_time == '6pm')? 'selected':'' }}>
                                                    6.00 PM</option>
                                                <option value="7pm"
                                                    {{ ($clinicdata->opening_time == '7pm')? 'selected':'' }}>
                                                    7.00 PM</option>
                                                <option value="8pm"
                                                    {{ ($clinicdata->opening_time == '8pm')? 'selected':'' }}>
                                                    8.00 PM</option>
                                                <option value="9pm"
                                                    {{ ($clinicdata->opening_time == '9pm')? 'selected':'' }}>
                                                    9.00 PM</option>
                                                <option value="10pm"
                                                    {{ ($clinicdata->opening_time == '10pm')? 'selected':'' }}>
                                                    10.00 PM</option>
                                                <option value="11pm"
                                                    {{ ($clinicdata->opening_time == '11pm')? 'selected':'' }}>
                                                    11.00 PM</option>
                                                <option value="12am"
                                                    {{ ($clinicdata->opening_time == '12am')? 'selected':'' }}>
                                                    12.00 AM</option>
                                                <option value="1am"
                                                    {{ ($clinicdata->opening_time == '1am')? 'selected':'' }}>
                                                    1.00 AM</option>
                                                <option value="2am"
                                                    {{ ($clinicdata->opening_time == '2am')? 'selected':'' }}>
                                                    2.00 AM</option>
                                                <option value="3am"
                                                    {{ ($clinicdata->opening_time == '3am')? 'selected':'' }}>
                                                    3.00 AM</option>
                                                <option value="4am"
                                                    {{ ($clinicdata->opening_time == '4am')? 'selected':'' }}>
                                                    4.00 AM</option>
                                                <option value="5am"
                                                    {{ ($clinicdata->opening_time == '5am')? 'selected':'' }}>
                                                    5.00 AM</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="closing_time">Closing time</label><br>
                                            <select name="closing_time" id="closing_time" class="form-select select2">
                                                <option value="0">Select Closing Time</option>
                                                <option value="6am"
                                                    {{ ($clinicdata->closing_time == '6am')? 'selected':'' }}>
                                                    6.00 AM</option>
                                                <option value="7am"
                                                    {{ ($clinicdata->closing_time == '7am')? 'selected':'' }}>
                                                    7.00 AM</option>
                                                <option value="8am"
                                                    {{ ($clinicdata->closing_time == '8am')? 'selected':'' }}>
                                                    8.00 AM</option>
                                                <option value="9am"
                                                    {{ ($clinicdata->closing_time == '9am')? 'selected':'' }}>
                                                    9.00 AM</option>
                                                <option value="10am"
                                                    {{ ($clinicdata->closing_time == '10am')? 'selected':'' }}>
                                                    10.00 AM</option>
                                                <option value="11am"
                                                    {{ ($clinicdata->closing_time == '11am')? 'selected':'' }}>
                                                    11.00 AM</option>
                                                <option value="12pm"
                                                    {{ ($clinicdata->closing_time == '12pm')? 'selected':'' }}>
                                                    12.00 PM</option>
                                                <option value="1pm"
                                                    {{ ($clinicdata->closing_time == '1pm')? 'selected':'' }}>
                                                    1.00 PM</option>
                                                <option value="2pm"
                                                    {{ ($clinicdata->closing_time == '2pm')? 'selected':'' }}>
                                                    2.00 PM</option>
                                                <option value="3pm"
                                                    {{ ($clinicdata->closing_time == '3pm')? 'selected':'' }}>
                                                    3.00 PM</option>
                                                <option value="4pm"
                                                    {{ ($clinicdata->closing_time == '4pm')? 'selected':'' }}>
                                                    4.00 PM</option>
                                                <option value="5pm"
                                                    {{ ($clinicdata->closing_time == '5pm')? 'selected':'' }}>
                                                    5.00 PM</option>
                                                <option value="6pm"
                                                    {{ ($clinicdata->closing_time == '6pm')? 'selected':'' }}>
                                                    6.00 PM</option>
                                                <option value="7pm"
                                                    {{ ($clinicdata->closing_time == '7pm')? 'selected':'' }}>
                                                    7.00 PM</option>
                                                <option value="8pm"
                                                    {{ ($clinicdata->closing_time == '8pm')? 'selected':'' }}>
                                                    8.00 PM</option>
                                                <option value="9pm"
                                                    {{ ($clinicdata->closing_time == '9pm')? 'selected':'' }}>
                                                    9.00 PM</option>
                                                <option value="10pm"
                                                    {{ ($clinicdata->closing_time == '10pm')? 'selected':'' }}>
                                                    10.00 PM</option>
                                                <option value="11pm"
                                                    {{ ($clinicdata->closing_time == '11pm')? 'selected':'' }}>
                                                    11.00 PM</option>
                                                <option value="12am"
                                                    {{ ($clinicdata->closing_time == '12am')? 'selected':'' }}>
                                                    12.00 AM</option>
                                                <option value="1am"
                                                    {{ ($clinicdata->closing_time == '1am')? 'selected':'' }}>
                                                    1.00 AM</option>
                                                <option value="2am"
                                                    {{ ($clinicdata->closing_time == '2am')? 'selected':'' }}>
                                                    2.00 AM</option>
                                                <option value="3am"
                                                    {{ ($clinicdata->closing_time == '3am')? 'selected':'' }}>
                                                    3.00 AM</option>
                                                <option value="4am"
                                                    {{ ($clinicdata->closing_time == '4am')? 'selected':'' }}>
                                                    4.00 AM</option>
                                                <option value="5am"
                                                    {{ ($clinicdata->closing_time == '5am')? 'selected':'' }}>
                                                    5.00 AM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            @php
                                            $arr = explode(',',$clinicdata->business_hr);

                                            @endphp
                                            <label for="password">Business Hour</label><br />
                                            <label class="form-check-label" for="monday">
                                                Monday
                                            </label>
                                            <input type="checkbox" name="business_hr[]" id="business_hr1" value="monday"
                                                {{ (in_array('monday',$arr))? 'checked':'' }}>
                                            <label class="form-check-label" for="tuesday">
                                                Tuesday
                                            </label>
                                            <input type="checkbox" name="business_hr[]" id="business_hr2"
                                                value="tuesday" {{ (in_array('tuesday',$arr))? 'checked':'' }}>
                                            <label class="form-check-label" for="wednesday">
                                                Wednesday
                                            </label>
                                            <input type="checkbox" name="business_hr[]" id="business_hr3"
                                                value="wednesday" {{ (in_array('wednesday',$arr))? 'checked':'' }}>
                                            <label class="form-check-label" for="formCheck1">
                                                Thursday
                                            </label>
                                            <input type="checkbox" name="business_hr[]" id="business_hr4"
                                                value="thursday" {{ (in_array('thursday',$arr))? 'checked':'' }}>
                                            <label class="form-check-label" for="formCheck1">
                                                Friday
                                            </label>
                                            <input type="checkbox" name="business_hr[]" id="business_hr5" value="friday"
                                                {{ (in_array('friday',$arr))? 'checked':'' }}>
                                            <label class="form-check-label" for="formCheck1">
                                                Saturday
                                            </label>
                                            <input type="checkbox" name="business_hr[]" id="business_hr6"
                                                value="saturday" {{ (in_array('saturday',$arr))? 'checked':'' }}>
                                            <label class="form-check-label" for="formCheck1">
                                                Sunday
                                            </label>
                                            <input type="checkbox" name="business_hr[]" id="business_hr7" value="sunday"
                                                {{ (in_array('sunday',$arr))? 'checked':'' }}>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="image">City Name</label>
                                            <input id="city" name="city" type="text" class="form-control" value="{{ $clinicdata->city }}">
                                           
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="image">Upload logo</label>
                                            <input id="image" name="image" type="file" class="form-control">
                                            <img src="{{ asset('uploads/userdata/'.$clinicdata->image)}}" width="200"
                                                height="180" alt="">
                                        </div>

                                    </div>
                                    <div class="card-header">
                                                    <h4 class="card-title">Social Information</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                        <label for="image">Website URL</label>
                                                        <input id="website" name="website" type="text" value="{{ $clinicdata->website }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                        <label for="image">Linkedin</label>
                                                        <input id="linkedin" name="linkedin" type="text" value="{{ $clinicdata->linkedin }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                        <label for="image">Facebook</label>
                                                        <input id="facebook" name="facebook" type="text" value="{{ $clinicdata->facebook }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                        <label for="image">Instagram</label>
                                                        <input id="instagram" name="instagram" type="text" value="{{ $clinicdata->instagram }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                        <label for="image">Rank</label>
                                                        <input id="rank" name="rank" type="text" value="{{ $clinicdata->rank }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                        <label for="image">Twitter</label>
                                                        <input id="twitter" name="twitter" type="text" value="{{ $clinicdata->twitter }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                        <label for="image">Google Rating</label>
                                                        <input id="google_rating" name="google_rating" type="text" value="{{ $clinicdata->google_rating }}"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="form-outline">
                                                        <label for="image">Map URL</label>
                                                        <input id="Gmaps_URL" name="Gmaps_URL" type="text"
                                                                class="form-control" value="{{ $clinicdata->Gmaps_URL }}">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="card-header">
                                                    <h4 class="card-title">Company Information</h4>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mb-4">
                                                        <div class="form-outline">
                                                        <!-- <label for="image">Company Information</label> -->
                                                        <textarea name="company_info" id="taskdesc-editor"></textarea>
                                                        </div>
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
    // let dateDropdown = document.getElementById('year_drp_down'); 
    //    var hidden_year_drp_down = document.getElementById('hidden_year_drp_down').value;
    //    if (typeof hidden_year_drp_down !== 'undefined') {
    //     dateDropdown.innerText = hidden_year_drp_down;
    //     } else {
    //         let currentYear = new Date().getFullYear();    
    //         let earliestYear = 1970;     
    //         while (currentYear >= earliestYear) {      
    //             let dateOption = document.createElement('option');          
    //             dateOption.text = currentYear;      
    //             dateOption.value = currentYear;        
    //             dateDropdown.add(dateOption);      
    //             currentYear -= 1;    
    //         }
    //     }
    </script>
    <script>
    let tableDate = new Date('{{ $clinicdata->year_drp_down }}');

    let dateDropdown = document.getElementById('year_drp_down');

    let selectedOption = dateDropdown.querySelector(`option[value="${tableDate.getFullYear()}"]`);

    if (selectedOption) {
        selectedOption.selected = true;
    } else {
        let currentYear = new Date().getFullYear();
        let earliestYear = 1970;

        while (currentYear >= earliestYear) {
            let dateOption = document.createElement('option');
            dateOption.text = currentYear;
            dateOption.value = currentYear;
            dateDropdown.add(dateOption);

            if (currentYear === tableDate.getFullYear()) {
                dateOption.selected = true;
            }

            currentYear--;
        }
    }
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
</body>

</html>