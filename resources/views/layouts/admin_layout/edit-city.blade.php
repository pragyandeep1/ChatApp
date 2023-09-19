@include('layouts.admin_layout.head-main')

<head>

    <title> | Dason - Admin & Dashboard Template</title>

    @include('layouts.admin_layout.head')

    @include('layouts.admin_layout.head-style')

</head>


<!-- Begin page -->
<body data-topbar="dark">
<div id="layout-wrapper">

@include('layouts.admin_layout.menu')

    
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?php
                $maintitle = "Ecommerce";
                $title = "City List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                    
                        <div class="card">
                            <div class="card-body">                            
                            <form action="{{ url('update-city/'.$city->id) }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')
                                    
                                    <div class="row" id="form-data" >
                                        <div class="col-12">
                                                <div class="row">
                                                    <label for="state" class="col-sm-3 col-form-label">Name of State</label>
                                                    <div class="col-sm-9 mb-4">
                                                       
                                                        <input type="text" class="form-control" name="state" id="state" value="Odisha" disabled>
                                                       
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="city" class="col-sm-3 col-form-label">Name of City</label>
                                                    <div class="col-sm-9 mb-4">
                                                        <input id="city" name="city" type="text" class="form-control" value="{{ $city->city}}" required >
                                                        <span id="error_city"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <label for="city" class="col-sm-3 col-form-label">Image upload</label>
                                                    <div class="col-sm-9 mb-4">
                                                        <input id="image" name="image" type="file" class="form-control"  >
                                                        <span id="error_image"></span>
                                                        <img src="{{ asset('uploads/city/'.$city->image)}}"
                                                                width="200" height="180"alt="">
                                                    </div>
                                                </div>
                                                
                                               
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" id="create" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                </div>
                                            </form>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->




            </div>
                    
                     <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.admin_layout.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('layouts.admin_layout.right-sidebar') 
@include('layouts.admin_layout.vendor-scripts')


</body>

</html>