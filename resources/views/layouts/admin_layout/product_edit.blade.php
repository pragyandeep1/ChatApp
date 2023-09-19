
@include('layouts.admin_layout.head-main')

<head>

    <title> | Dason - Admin & Dashboard Template</title>

    @include('layouts.admin_layout.head')

    <!-- select2 css -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/pages/ecommerce-shop.init.js') }}"></script>
    
    @include('layouts.admin_layout.head-style')

<style>
    .textarea-container {
  margin-left: 20px;
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
                $title = "Add Product/Service";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <form action="{{ url('update-product/'.$productdata->id) }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off" class="row g-3">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Product/Service Information</h4>
                                <!-- <p class="card-title-desc">Fill all information below</p> -->
                            </div>
                            <div class="card-body">
                               
                                
                                <div class="row mt-2">
                                        <div class="col-md-3">
                                            <!-- <div class="mb-3"> -->
                                                <label class="control-label">Select type</label>
                                                <select class="form-control select2" id="drp-down" name="type">
                                                    <option >Select options</option>
                                                    <option value="product" selected>Product</option>
                                                  
                                                </select>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-md-9">
                                            <label class="control-label">Select Seller Name</label><br>
                                            <select class="form-control select2" id="seller-name" name="seller_name">
                                                    <option >Select seller name</option>
                                                    @foreach($sellernames as $sellername)
                                                    <option value="{{ $sellername->id }}" @if($sellername->id == $productdata->seller_name) selected @endif>{{ $sellername->name }}</option>
                                                    @endforeach
                                                    
                                            </select>
                                        </div>
                                    </div>
                                   
                                        <div  id="form-product"  class="product-info">
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-6" >
                                                        <div class="mb-3">
                                                            <label class="control-label">Select Category</label><br>
                                                            <select class="form-control select2" id="category_id" name="category_id">
                                                                    <option >Select category</option>
                                                                    @foreach($categories as $category)
                                                                    <option value="{{ $category->id}}" @if($category->id == $productdata->category_id ) selected @endif>{{ $category->name}}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="product_title" class="label-css">Product Title</label>
                                                    <input id="product_title" name="product_title" type="text" class="form-control input-css"  value="{{ $productdata->product_title}}">
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                        <label for="specification">Product Specification</label>
                                                        <input id="specification" name="specification" type="text" class="form-control input-css" value="{{ $productdata->specification}}">
                                                
                                                </div>
                                                <div class="col-6 col-md-6">
                                                        <label for="packaging_type">Packaging Type</label>
                                                        <input type="text" name="packaging_type" id="packaging_type" class="form-control" value="{{ $productdata->packaging_type}}">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                        <label for="price">Price</label>
                                                        <input id="price" name="price" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" type="text" class="form-control input-css" value="{{ $productdata->price}}">
                                                
                                                </div>
                                                <div class="col-6 col-md-6">
                                                        <label for="unit">Unit</label>
                                                        <input type="text" name="unit" id="unit" class="form-control" value="{{ $productdata->unit}}">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                            <div class="col-12 col-md-12">
                                                    <label for="product_description">Product Description</label>
                                                    <!-- <input id="product_description" name="product_description" type="text" class="form-control input-css" value="{{ $productdata->name}}"> -->
                                                    <textarea id="taskdesc-editor" name="product_description">{{ $productdata->product_description}}</textarea>
                                                
                                                </div>
                                                
                                                
                                            </div>
                                            
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                    <label for="image">Upload image</label>
                                                    <input id="image" name="image" type="file" class="form-control">
                                                    <img src="{{ asset('uploads/product/'.$productdata->image)}}" height="100px" width="100px">
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="color">Color</label>
                                                    <input type="text" name="color" id="color" class="form-control" value="{{ $productdata->color}}">
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="row mt-2">
                                            <div class="col-6 col-md-6">
                                                    <label for="packagingsize">Packaging size</label>
                                                    <input type="text" name="packagingsize" id="packagingsize" class="form-control" value="{{ $productdata->packagingsize}}">
                                                
                                                </div>
                                            <div class="col-6 col-md-6">
                                                    <label for="special_feature">Special feature</label>
                                                    <input type="text" name="special_feature" id="special_feature" class="form-control" value="{{ $productdata->special_feature}}">
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                    <label for="brand">Brand</label>
                                                    <input type="text" name="brand" id="brand" class="form-control" value="{{ $productdata->brand}}">
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="country_origin">Country of origin</label>
                                                    <input type="text" name="country_origin" id="country_origin" class="form-control" value="{{ $productdata->country_origin}}">
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="row mt-2">
                                            <div class="col-6 col-md-6">
                                                    <label for="expiry_date">Expiry Date</label>
                                                    <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ $productdata->expiry_date}}">
                                                </div>
                                            <div class="col-6 col-md-6">
                                                    <label for="order_quantity">Minimum Order Quantity</label>
                                                    <input type="text" name="order_quantity" id="order_quantity" class="form-control" value="{{ $productdata->order_quantity}}">
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="d-flex flex-wrap gap-2 mt-4">
                                                    <button type="submit" id="create-product" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    
                                    

                                 
                                   



                                       
                                               
                                  
                                        </div> 
                                   
                                </div>
                            </div>
                            <!-- end of row -->
                            
                           
                            
                           
</form>
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
<script src="{{ asset('libs/tinymce/tinymce.min.js') }}"></script>
<script src=" {{ asset('js/pages/task-create.init.js') }}"></script>
</body>

</html>