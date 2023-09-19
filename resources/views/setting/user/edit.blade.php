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
                    $title = "Edit User";
                    ?>
                    @include('layouts.admin_layout.breadcrumb')
                    <!-- end page title -->

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Basic Information</h4>
                                    <p class="card-title-desc">Fill all information below</p>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('users.update',$user->id)}}" class="row g-3">
                                        @csrf
                                        @method('put')
                                        <div class="col-md-6">
                                            <label for="name" class="label-css text-gray-700 select-none font-medium">User
                                                Name</label>
                                            <input id="name" type="text" name="name"
                                                value="{{ old('name',$user->name) }}" placeholder="Enter name"
                                                class="input-css px-1 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="email"
                                                class="label-css text-gray-700 select-none font-medium">Email</label>
                                            <input id="email" type="text" name="email"
                                                value="{{ old('email',$user->email) }}" placeholder="Enter email"
                                                class="input-css px-1 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="password"
                                                class="label-css text-gray-700 select-none font-medium">Password</label>
                                            <input id="password" type="text" name="password"
                                                value="{{ old('password') }}" placeholder="Enter password"
                                                class="input-css px-1 py-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                        </div>

                                        <div class="col-md-6">
                                            <label for="password_confirmation"
                                                class="label-css text-gray-700 select-none font-medium">Confirm Password</label>
                                            <input id="password_confirmation" type="text" name="password_confirmation"
                                                placeholder="Re-enter password"
                                                class="input-css px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200" />
                                        </div>

                                        <h3 class="text-xl my-4 text-gray-600">Role</h3>
                                        <div class="row">
                                            @foreach($roles as $role)
                                            <div class="col-4">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <div class="d-flex flex-column">
                                                    <label class="d-inline-flex align-items-center mt-3">
                                                        <input type="checkbox"
                                                            class="form-checkbox h-5 w-5 text-blue-600" name="roles[]"
                                                            value="{{$role->id}}"
                                                            @if(count($user->roles->where('id',$role->id)))
                                                        checked
                                                        @endif
                                                        ><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-center mt-16 mb-16">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Submit</button>
                                        </div>
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