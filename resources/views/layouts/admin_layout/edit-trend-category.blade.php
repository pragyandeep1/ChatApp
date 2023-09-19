@include('layouts.admin_layout.head-main')

<head>

@section('title') {{'BusinessOdisha'}} @endsection

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
                $title = "Edit Trending Category";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-12 col-md-12">
                    
                        <div class="card">
                            <div class="card-body">                            
                            <form role="form" method="post" action="{{ url('update-trend-category/'.$trend_category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                              
                                    <div class="row" id="form-data" >
                                        <div class="col-12">
                                           
                                                <div class="row">
                                                <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="speciality">Select Category
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                           
                                                        <select type="text" name="category_id" class="form-control" id="category_id">
                                                           
                                                            @if($categories)
                                                                @foreach($categories as $item)
                                                                    <?php $dash=''; ?>
                                                                    
                                                                    <option  data-value="{{ $trend_category->category_id }}" value="{{$item->id}}" @if($trend_category->category_id == $item->id ) selected @endif>{{$item->name}}

                                                                    </option>
                                                                   
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        </div>
                                                        
                                                       
                                                       
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="speciality">Category Title
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input id="category_title" name="category_title" type="text" class="form-control" value="{{$trend_category->category_title}}" required >
                                                            <span id="error_speciality"></span>
                                                        </div>
                                                        
                                                       
                                                       
                                                    </div>
                                                   
                                                    
                                                    <div class="col-sm-6">
                                                    <div class="mb-3">
                                                            <label for="background_image">Background image</label>
                                                            <input id="background_image" name="background_image" type="file" class="form-control">

                                                            
                                                            <img src="{{ asset('uploads/trending-category/'.$trend_category->background_image)}}"
                                                                width="200" height="180"alt="">
                                                        </div>
                                                        
                                    
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" id="create" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                </div>
                                            </form>
                               
                                            @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                @if(\Session::has('error'))
                    <div>
                        <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div>
                        <li class="alert alert-success">{!! \Session::get('success') !!}</li>
                    </div>
                @endif
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
<script>
    var inputElement = document.getElementById("slug");

inputElement.addEventListener("keydown", function(event) {
  if (event.code === "Space") {
    event.preventDefault();
  }
});

</script>
</body>

</html>