<!DOCTYPE html>
<html lang="en">
<head>
@section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

    
    


    
    <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
    <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/customer-style.css') }}">
    <style>
        /* password match start */
        #passwordIcon {
        position: absolute;
        top: 71%;
        right: 15px;
        transform: translateY(-50%);
      }
      #passwordIcon.fa-times::before {
          content: "\f00d";
          color: red;
      }

      #passwordIcon.fa-check::before {
          content: "\f00c";
          color: green;
      }
      .star-mark{
        color: red;
      }
        /* password match end */
        .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
    </style>
</head>
<body>
@include('customer.customer_navbar')
<!-- <div class="container rounded bg-white mt-5 mb-5">
    
</div> -->
<!-- Code start  -->
<div class="container-custom">
      <div class="container">
        <div class="result_section_area row">
          @include('customer.customer-sidebar')
          <div class="right_side col-lg-9">
            <div class="right_side_box mt-2 ml-0">
              <!-- <div class="title_section">
                <img src="{{ asset('customer-images/customer-profile-images/Untitled-3.png') }}" alt="" style="width: 100%;">
                <h1>About us</h1>
              </div> -->
              <div class="profile_body_section">
              <div class="row">
        <!-- <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
               
                <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                <span class="text-black-50">{{ Auth::user()->email }}</span>
                <span> </span>
            </div>
        </div> -->
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{ url('/customer-profile-update/'.Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Full Name</label>
                    <input type="text" class="form-control" placeholder="Full name" value="{{ Auth::user()->name }}" name="name" oninput="validateInput(this)">

                </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Mobile Number</label>
                        <input type="text" class="form-control" placeholder="Enter mobile number" value="{{ Auth::user()->mobile }}" name="mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10">
                        <span id="error_mobile" style="position: absolute;top: 39px;left: 225px;"></span>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">DOB</label>
                        <input type="date" class="form-control" placeholder="Enter dob" value="{{ $customer->dob ?? '' }}" name="dob">
                    </div>
                <div class="col-md-12">
                    <label class="labels">Address Line </label>
                    <input type="text" class="form-control" placeholder="enter address " value="{{ $customer->full_address ?? '' }}" name="full_address">
                </div>
                    
                   
                    <!-- <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                    <!-- <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                    <div class="col-md-12">
                        <label class="labels">Email ID</label>
                        <input type="text" class="form-control" placeholder="enter email id" value="{{ Auth::user()->email }}" name="email" id="email">
                        <span id="error_email" style="position: absolute;top: 39px;left: 225px;"></span>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Pincode</label>
                        <input type="text" class="form-control" name="pincode" placeholder="Pincode" value="{{ $customer->pincode ?? ''}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10" maxlength="6">
                    </div>
                    
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Image Upload</label>
                        <input type="file" class="form-control"   name="profile_image" id="image">
                    </div>
                    <div class="col-md-6">
                    @if(empty(Auth::user()->profile_image))
                    <img class="rounded-circle mt-5" width="250px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" id="showimg">
                        @else
                        <img class="rounded-circle mt-5" src="{{ asset('uploads/userdata/profile_image/'.Auth::user()->profile_image) }}">
                        @endif
                        
                    </div>
                </div>
                <!-- <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password" value="" id="password">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Confirm Password</label>
                        <input type="text" class="form-control" value="" placeholder="Confirm Password" name="cpassword" id="cpassword"></div>
                    </div>
                    <span style="color:red;" id="PasswordnotMatch"></span>
                              <span  style="color:green;" id="CheckPasswordMatch"></span> -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="labels">
                            State/Region
                        </label>
                        <input type="text" class="form-control" name="state" placeholder="State/Region" value="{{ $customer->state ?? '' }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">City</label>
                        <select name="city" class="form-select form-control" id="city">
                            <option value="0">Select City</option>
                            
                            
                            
                            @foreach(App\Models\City::all() as $city)
                                <option value="{{ $city->id}}" >{{ $city->city}}</option>
                            @endforeach
                            <!-- @foreach(App\Models\City::all() as $city)
                           {{-- @if($customer->city== $city->id) selected @endif --}}
                                <option value="{{ $city->id}}" >{{ $city->city}}</option>
                            @endforeach -->
        
                        </select>
                        <!-- <input type="text" class="form-control" value="" placeholder="state"> -->
                    </div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" id="create">Save Profile</button></div>
                </form>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Code end -->
@include('customer.customer_footer')
    @include('customer.search_bar_all_page')
    <script>
  function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#cpassword").val();
    if (password !== confirmPassword) {
        // $("#PasswordnotMatch").html("Passwords do not match!");
        // $("#CheckPasswordMatch").hide();
        $('#create').attr('disabled', 'disabled');
        $('#passwordIcon').removeClass('fa fa-check').addClass('fa fa-times');
    } else {
        // $("#CheckPasswordMatch").html("Passwords match.");
        // $("#PasswordnotMatch").hide();
        $('#create').attr('disabled', false);
        $('#passwordIcon').removeClass('fa fa-times').addClass('fa fa-check');
    }
}
   
    $(document).ready(function() {
        $("#cpassword").keyup(checkPasswordMatch);
    });
    </script>
<script>
  $(document).ready(function(){
    $('#email').blur(function() {
        var error_email = '';
        var email = $('#email').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(email)) {
          $('#error_email').html('<i class="fas fa-times-circle text-danger"></i>');
          $('#email').addClass('has-error');
          $('#create').attr('disabled', 'disabled');
        } else {
          $.ajax({
            url: "{{ url('customer_email_available_check') }}",
            method: "POST",
            data: { email: email, _token: _token },
            success: function(result) {
              if (result.registered == 'failed') {
                $('#error_email').html('<i class="fa fa-check-circle text-success"></i>');
                $('#email').removeClass('has-error');
                $('#create').attr('disabled', false);
              } else {
                $('#error_email').html('<i class="fa fa-times-circle text-danger"></i>');
                $('#email').addClass('has-error');
                $('#create').attr('disabled', 'disabled');
              }
            }
          });
        }
    });
    $('#mobile').blur(function() {
        var error_mobile = '';
        var mobile = $('#mobile').val();
        var _token = $('input[name="_token"]').val();
        var filter = /^\d{10}$/;

        // if (!filter.test(mobile)) {
        //   $('#error_mobile').html('<i class="fas fa-times-circle text-danger"></i>');
        //   $('#mobile').addClass('has-error');
        //   $('#create').attr('disabled', 'disabled');
        // } else {
          $.ajax({
            url: "{{ url('customer_phone_available_check') }}",
            method: "POST",
            data: { mobile: mobile, _token: _token },
            success: function(result) {
              if (result.registered == 'failed') {
                $('#error_mobile').html('<i class="fas fa-check-circle text-success"></i>');
                $('#mobile').removeClass('has-error');
                $('#create').attr('disabled', false);
              } else {
                $('#error_mobile').html('<i class="fas fa-times-circle text-danger"></i>');
                $('#mobile').addClass('has-error');
                $('#create').attr('disabled', 'disabled');
              }
            }
          });
        // }
    });
  });
  

</script>
<script>
  function validateInput(input) {
    // Remove any numeric characters from the input
    input.value = input.value.replace(/[0-9]/g, '');
}
</script>
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