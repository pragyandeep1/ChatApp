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
                $title = "Category List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-12 col-md-12">
                    
                        <div class="card">
                            <div class="card-body">                            
                            <form role="form" method="post" action="{{ url('update-category/'.$category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                              
                                    <div class="row" id="form-data" >
                                        <div class="col-12">
                                           
                                                <div class="row">
                                                <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="speciality">Type
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                           <select name="type" class="form-select">
                                                                <option value="0">Select options</option>
                                                                <option value="product" @if($category->type == "product" ) selected @endif>Product</option>
                                                                <option value="service" @if($category->type == "service" ) selected @endif>Service</option>
                                                           </select>
                                                        </div>
                                                        
                                                       
                                                       
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="speciality">Name of Category
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input id="name" name="name" type="text" class="form-control" value="{{$category->name}}" required >
                                                            <span id="error_speciality"></span>
                                                        </div>
                                                        
                                                       
                                                       
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="slug">Category Slug</label>
                                                            <input id="slug" name="slug" type="text" class="form-control" value="{{$category->slug}}" required >
                                                            <span id="error_speciality"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                        <label>Select parent category</label>
                                                        <select type="text" name="parent_id" class="form-control">
                                                            <option value="" >None</option>
                                                            @if($categories)
                                                                @foreach($categories as $item)
                                                                    <?php $dash=''; ?>
                                                                    <option  value="{{$item->id}}" @if($category->parent_id == $item->id ) selected @endif>{{$item->name}}</option>
                                                                    @if(count($item->subcategory))
                                                                        @include('layouts.admin_layout.sub-category-list-option-for-update',['subcategories' => $item->subcategory])
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <div class="mb-3">
                                                            <label for="thumbnail">Upload thumbnail</label>
                                                            <input id="thumbnail" name="thumbnail" type="file" class="form-control">

                                                            
                                                            <img src="{{ asset('uploads/category/'.$category->thumbnail)}}"
                                                                width="200" height="180"alt="">
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