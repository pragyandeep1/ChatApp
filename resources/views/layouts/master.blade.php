
@include('layouts.admin_layout.head-main')
<head>

    <title>  BusinessOdisha </title>

    @include('layouts.admin_layout.head')
    @include('layouts.admin_layout.head-style')

</head>

<body data-topbar="dark">

<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-50">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="{{ url('/') }}" class="d-block auth-logo">
                                <!-- {{asset('images/front_images/img/loading.gif')}} -->
                                    <img src="{{ asset('customer-images/BO_logo.png') }}" alt="" width="150px"> 
                                    <!-- <img src="{{asset('images/admin_login_images/logo-sm.svg') }}" alt="" height="28">  -->
                                    <!-- <span class="logo-txt">BusinessOdisha</span> -->
                                </a>
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Welcome Back !</h5>
                                    @if (Session::has('error_message'))
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        <h4 class="text-center" style="color: #dc3545">{{ Session::get('error_message') }}</h4>
                                    </div>
                                    <?php Session::forget('error_message'); ?>
                                @endif
                                @if (Session::has('success_message'))
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        <h4 class="text-center" style="color: #0a9634">{{ Session::get('success_message') }}</h4>
                                    </div>
                                    <?php Session::forget('success_message'); ?>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <p class="text-muted mt-2">Sign in to continue to BusinessOdisha.</p>
                                </div>
                                <form method="post" action="{{ url('/login') }}">
                                @csrf
                                    <div class="form-floating form-floating-custom mb-4">
                                        <input type="text" class="form-control" id="email" name="email" value="" placeholder="Enter User Name" required>
                                        <label for="input-username">Username</label>
                                        <span class="text-danger"></span>
                                        <div class="form-floating-icon">
                                            <i data-feather="users"></i>
                                        </div>
                                    </div>

                                    <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                        <input type="password" class="form-control pe-5" id="password" name="password" value="" placeholder="Enter Password" required>
                                        <span class="text-danger"></span>
                                        <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0 " id="password-addon">
                                            <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                        </button>
                                        <label for="input-password">Password</label>
                                        <div class="form-floating-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-check font-size-15">
                                                <!-- <input class="form-check-input" type="checkbox" id="remember-check">
                                                <label class="form-check-label font-size-13" for="remember-check">
                                                    Remember me
                                                </label> -->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary waves-effect waves-light" style="float:right; width:45%;" type="submit">Log In</button>
                                    </div>
                                </form>
                                
                                <div class="mb-3">
                                        <a href="{{ url('/otp/login') }}" class="btn btn-primary waves-effect waves-light" style="width:45%;">Log in with OTP</a>
                                        <!-- <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log in with otp</button> -->
                                        <div class="mt-3">
                                            <h2 style="font-size: 15px;">Not yet Registered, <span style=""><a href="{{ url('/customer-register') }}">Signup Here</a></span></h2>
                                        </div>
                                    </div>
                                
                            </div>
                            <div class="mt-1 text-center">
                                <p>or sign up with:</p>
                                <a href="{{ url('/customer-register') }}"  class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </a>

                                <a href="{{ url('/customer-register') }}" class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </a>

                               
                                </div>
                            <div class="mt-4 mt-md-5 text-center">
                                
                                <!-- <p class="mb-0">© <script>
                                        document.write(new Date().getFullYear())
                                    </script>  <i class="mdi mdi-heart text-danger"></i> </p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay"></div>
                   
                    <!-- end bubble effect -->
                    <div class="row justify-content-center align-items-end">
                        <div class="col-xl-7">
                            <div class="p-0 p-sm-4 px-xl-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                            <img src="{{ asset('images/admin_login_images/users/avatar-1.jpg') }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                            <img src="{{ asset('images/admin_login_images/users/avatar-2.jpg') }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                            <img src="{{ asset('images/admin_login_images/users/avatar-3.jpg') }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                        </button>
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-center text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                <h4 class="mt-4 fw-medium lh-base text-white">“I feel confident
                                                    imposing change
                                                    on myself. It's a lot more progressing fun than looking back.
                                                    That's why
                                                    I ultricies enim
                                                    at malesuada nibh diam on tortor neaded to throw curve balls.”
                                                </h4>
                                                <div class="mt-4 pt-1 pb-5 mb-5">
                                                    <h5 class="font-size-16 text-white">Richard Drews
                                                    </h5>
                                                    <p class="mb-0 text-white-50">Web Designer</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-center text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                <h4 class="mt-4 fw-medium lh-base text-white">“Our task must be to
                                                    free ourselves by widening our circle of compassion to embrace
                                                    all living
                                                    creatures and
                                                    the whole of quis consectetur nunc sit amet semper justo. nature
                                                    and its beauty.”</h4>
                                                <div class="mt-4 pt-1 pb-5 mb-5">
                                                    <h5 class="font-size-16 text-white">Rosanna French
                                                    </h5>
                                                    <p class="mb-0 text-white-50">Web Developer</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-center text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>
                                                <h4 class="mt-4 fw-medium lh-base text-white">“I've learned that
                                                    people will forget what you said, people will forget what you
                                                    did,
                                                    but people will never forget
                                                    how donec in efficitur lectus, nec lobortis metus you made them
                                                    feel.”</h4>
                                                <div class="mt-4 pt-1 pb-5 mb-5">
                                                    <h5 class="font-size-16 text-white">Ilse R. Eaton</h5>
                                                    <p class="mb-0 text-white-50">Manager
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>
@include('layouts.admin_layout.vendor-scripts')

</body>

</html>