<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js">
    </script>
    <!-- <script type="text/javascript" src="https://use.fontawesome.com/b9bdbd120a.js"></script> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->

    <title>Customer Registration</title>
    <style>
    .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
    }

    @media (min-width: 1025px) {
        .h-custom-2 {
            height: 80%;
        }
    }

    form {
        justify-content: center;
        align-items: center;
        margin: auto;
    }

    .logo-div {
        text-align: left;
    }

    .pwd_input {
        border-radius: 0 0.25rem 0.25rem 0;
        padding: 0.75rem 0.75rem;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">



                <div class="col-sm-4 text-black">
                    <div class="d-flex align-items-center h-custom-2 px-5 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert"> {{session('success')}}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger" role="alert"> {{session('error')}}
                        </div>
                        @endif
                        <form method="POST" action="{{ route('otp.generatebyphone') }}">
                            @csrf
                            <div class="fw-normal mb-3 pb-3 logo-div">
                                <i class="fas fa-shopping-bag fa-2x " style="color: #709085;"></i>

                            </div>
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login with mobile no.</h3>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline usertype">

                                        <label for="mobile"
                                            class="col-md-6 col-form-label select">{{ __('Select User Type') }}</label>
                                        <select name="user_type" id="user_type" class="form-control form-select"> 
                                            <option value="customer">Customer</option>
                                            <option value="seller">Seller</option>
                                        </select>
                                    </div>
                                    <div class="form-outline">

                                        <label for="mobile"
                                            class="col-md-6 col-form-label">{{ __('Mobile No') }}</label>

                                        <!-- <div class="col-md-6"> -->
                                        <input id="mobile" type="text"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile') }}" required autocomplete="mobile" autofocus
                                            placeholder="Enter  Registered Mobile Number"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10">

                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <!-- </div> -->
                                    </div>
                                </div>

                                <span id="succ-msg" class="alert alert-success"></span>
                                <span id="err-msg" class="alert alert-danger"></span>


                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-primary btn-block" type="submit" id="checkButton">Submit</button>
                            </div>

                            <!-- <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Generate OTP') }}
                                </button>

                                @if (Route::has('login'))
                                    <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('Login With Username') }}
                                    </a>
                                @endif
                            </div>
                        </div> -->
                        </form>
                    </div>
                </div>
                <div class="col-sm-8 px-0 d-none d-sm-block">
                    <img src="{{ asset('frontend/img/beautiful-young-family-with-child-compress.png') }}"
                        alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: center;">
                </div>
            </div>
        </div>
    </section>

    <script>
    $(document).ready(function() {
        $('#succ-msg').hide();
        $('#err-msg').hide();
        $('.usertype').hide();
        $('#mobile').on('input', function() {
            var mobileNumber = $(this).val();
            var user_type = $('#user_type').val();

            // Clear previous message and enable the button
            $('#message').text('');
            $('#checkButton').prop('disabled', false);

            // if (mobileNumber.length === 10) {
            $.ajax({
                url: "{{ url('checkMobileRegistered') }}",
                method: 'POST',
                data: {
                    mobile_number: mobileNumber,
                    // user_type: user_type,
                    _token: '{{csrf_token()}}'
                },
                success: function(response) {
                    if (response.registered == 'registered') {
                        // Mobile number is registered
                        console.log('Mobile number is registered');
                        // $('#succ-msg').text('Mobile number is registered.');
                        $('#succ-msg').hide();
                        $('#checkButton').prop('disabled', false);
                    } else {
                        // Mobile number is not registered
                        // console.log('Mobile number is not registered');
                        // $('.usertype').show();
                        $('#err-msg').html(
                            'Mobile number is not registered.Select <a href="{{ url("/customer-register")}}">Register here</a> type to register.'
                            );
                        $("#user_type").click(function() {
                            var selectedValue = $("#user_type").val();
                                if (selectedValue == 'seller') {
                                $('#err-msg').html(
                                '<a href="{{ url("/seller-register")}}">Register here</a>.'
                                );
                                }else{
                                    $('#err-msg').html(
                                    '<a href="{{ url("/customer-register")}}">Register here</a>.'
                                    );
                                }
                        });
                        
                        
                        // $('#err-msg').text('Mobile number is not registered.Please register.');
                        $('#err-msg').show();
                        $('#checkButton').prop('disabled', true);
                    }
                }
            });
            // }
        });
    });
    </script>

</body>

</html>