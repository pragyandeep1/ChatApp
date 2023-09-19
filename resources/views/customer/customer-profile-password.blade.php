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
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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

    .star-mark {
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
                                            <h4 class="text-right">Password Change</h4>
                                        </div>
                                        <form action="{{ url('/customer-password-update') }}" method="POST"
                                            enctype="multipart/form-data" id="profile-form">
                                            @csrf
                                            @method('PUT')


                                            @if(session('success'))
                                            <div class="alert alert-success" data-timeout="5000">
                                                <!-- 5000 milliseconds = 5 seconds -->
                                                {{ session('success') }}
                                            </div>
                                            @endif

                                            @if(session('error'))
                                            <div class="alert alert-danger" data-timeout="5000">
                                                {{ session('error') }}
                                            </div>
                                            @endif

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label class="labels">Old Password</label>
                                                    <input type="password" class="form-control" name="oldpassword"
                                                        placeholder="Old Password" value="" id="oldpassword">
                                                    @error('oldpassword')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="labels">Password</label>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password" value="" id="passwordone">
                                                    @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror

                                                </div>
                                                <div class="col-md-6">
                                                    <label class="labels">Confirm Password</label>
                                                    <input type="password" onkeyup="validate_password()"
                                                        class="form-control" value="" placeholder="Confirm Password"
                                                        name="cpassword" id="cpasswordone">
                                                    <span id="wrong_pass_alert"></span>
                                                </div>
                                            </div>
                                            <span style="color:red;" id="PasswordnotMatch"></span>
                                            <span style="color:green;" id="CheckPasswordMatch"></span>

                                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                                    type="submit" id="create">Save Profile</button></div>
                                        </form>
                                    </div>
                                </div>

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
    function validate_password() {
        var pass = document.getElementById('passwordone').value;
        var confirm_pass = document.getElementById('cpasswordone').value;
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


</body>

</html>