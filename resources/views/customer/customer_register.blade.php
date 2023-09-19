<!DOCTYPE html>
<html lang="en">
<head>
@section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link href="{{ asset('css/Registration_page.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
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
    </style>
</head>
<body>
    <div class="custom_bg container-fluid">
        <div class="row">
            <div class="leftside col-md-6">
                <div class="row header_section">
                    <div class="left_logo col">
                        <img src="{{ asset('images/register-images/logo.png') }}" alt="">
                    </div>
                    <div class="right_button col">
                        <a href="{{ url('/userlogin')}}" class="btn btn-outline-info" role="button">Sign in</a>
                        <!-- <a href="{{ url('/')}}" class="btn btn-outline-info" role="button">Sign in</a> -->
                    </div>
                </div>
                <div class="form_wrapper">
                    <div class="form_header_section">
                        <h2 class="main_form_heading">Register as Customer</h2>
                        <h3 class="main_form_subtitle">Please Enter your details</h3>
                    </div>
                    @if(Session::has('error_message'))
                    <div class="alert alert-danger">
                        {{ Session::get('error_message') }}
                    </div>
                    @endif
                    <div class="form_section">
                    <form  action="{{ url('/save-customer') }}" method="POST" enctype="multipart/form-data">
                       @csrf
                            <div class="row mb-2">
                              <div class="col">
                                <label for="full_name">Full Name: <span class="star-mark">*</span></label>
                                <input type="text" class="form-control" id="full_name" placeholder="Enter your name" name="full_name" oninput="validateInput(this)" required>
                              </div>
                              <div class="col" style="position: relative;">
                                <label for="phone">Phone: <span class="star-mark">*</span></label>
                                <input required type="tel" class="form-control" placeholder="Enter Phone Number" id="mobile" name="mobile"  onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10">
                                <span id="error_mobile" style="position: absolute;top: 39px;left: 225px;"></span>
                              </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                  <label for="email">Email:<span class="star-mark">*</span></label>
                                  <input type="email" required class="form-control" id="email" placeholder="Enter your Email Id" name="email">
                                  <span id="error_email" style="position: absolute;top: 39px;left: 225px;"></span>
                                </div>
                                <div class="col">
                                  <label for="address">Address:<span class="star-mark">*</span></label>
                                  <input type="text" class="form-control" placeholder="Enter Your Address" name="full_address" id="full_address" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                  <label for="dob">DOB:</label>
                                  <input type="date" class="form-control" id="dob" name="dob">
                                </div>
                                <div class="col">
                                  <label for="state">State:</label>
                                  <input type="text" class="form-control" placeholder="Enter State" name="state" id="state" value="Odisha" readonly>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                  <label for="city">City:</label>                                 
                                  <select name="city" class="form-control" id="city">
                                    <option value="0">Select City</option>
                                  @foreach(App\Models\City::all() as $city)
                                        <option value="{{ $city->id}}">{{ $city->city}}</option>
                                    @endforeach

                                  </select>
                                  <!-- <input type="text" class="form-control" placeholder="Enter City" id="city" name="city"> -->
                                </div>
                                <div class="col">
                                  <label for="pin">Pincode:</label>
                                  <input type="text" class="form-control" placeholder="Enter Pincode" name="pincode" id="pincode" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10" maxlength="6">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                  <label for="password">Password:<span class="star-mark">*</span></label>
                                  <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required>
                                </div>
                                <div class="col">
                                  <label for="cpassword">Confirm Password:<span class="star-mark">*</span></label>
                                  <input type="password" class="form-control" placeholder="Password Again" id="cpassword" name="cpassword" required>
                                </div>
                            </div>
                            <span style="color:red;" id="PasswordnotMatch"></span>
                              <span  style="color:green;" id="CheckPasswordMatch"></span>
                            <div class="sub_button text-center">
                                <button type="submit" class="btn btn-primary mt-3" id="create">Submit</button>
                            </div>
                        </form>
                    </div>
                     <div class="flex items-center justify-end mt-4">
                     <a href="{{ route('gmail.login', ['user_type' => 'customer']) }}">
                        <!-- <a href="{{ route('gmail.login', ['type' => 'customer']) }}"> -->
                          <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                        </a>
                       
                        <a class="ml-1 btn btn-primary" href="{{ route('facebook.login',['type' => 'customer']) }}" style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;" id="btn-fblogin">
                        <!-- <a class="ml-1 btn btn-primary" href="{{ route('facebook.login') }}?type=customer }}" style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;" id="btn-fblogin"> -->
                            <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook
                      </a>
                        <!-- <a class="ml-1 btn btn-primary" href="{{ route('facebook.login') }}" style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;" id="btn-fblogin">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook
                      </a> -->
                      </div>
                    <div class="form_bottom">
                        <h3>Not a Customer, <span class="highlight_text"><a href="{{url('/seller-register')}}">Register as a Seller</a></span></h3>
                    </div>
                </div>
                <div class="footer">
                    <div class="row">
                        <div class="col copyright">
                            <p>© copyright-2023 Business Odisha</p>
                        </div>
                        <div class="col quick_links">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item"><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                                <li class="list-inline-item"><a href="{{ url('/terms') }}">terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
               
            </div>
            <div class="rightside col-md-6 px-0">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                      <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ asset('images/register-images/customer.jpg') }}" alt="Los Angeles">
                        <div class="carousel-caption">
                          <!-- <h3>Los Angeles</h3> -->
                          <p>Customer can contact seller easily</p>
                        </div>   
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('images/register-images/Sellerservice.jpg') }}" alt="Chicago">
                        <div class="carousel-caption">
                          <!-- <h3>Advertise your service for more business</h3> -->
                          <p>Advertise your service for more business</p>
                        </div>   
                      </div>
                      <div class="carousel-item">
                        <img src="{{ asset('images/register-images/Advertising.jpg') }}" alt="New York">
                        <div class="carousel-caption">
                          <!-- <h3>New York</h3> -->
                          <p>Seller can add their service</p>
                        </div>   
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
                  </div>
            </div>
        </div>
    </div>
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
</body>
</html>