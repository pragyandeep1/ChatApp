
@include('layouts.admin_layout.head-main')

<head>

@section('title') {{'BusinessOdisha'}} @endsection

    @include('layouts.admin_layout.head')

    <!-- select2 css -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/pages/ecommerce-shop.init.js') }}"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
   
    @include('layouts.admin_layout.head-style')

<style>
    .bootstrap-tagsinput .tag{
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }
        .bootstrap-tagsinput {
            width: 100%;
        }
    .textarea-container {
  margin-left: 20px;
}
.select2-container{
    width: 100% !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" />
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
                $title = "Add Service";
                // $title = "Add Product/Service";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <form action="{{ url('save-product-service') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off" class="row g-3">
                                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Service Information</h4>
                                <!-- <h4 class="card-title">Product/Service Information</h4> -->
                                <!-- <p class="card-title-desc">Fill all information below</p> -->
                            </div>
                            <div class="card-body">
                               
                                
                                <div class="row mt-2">
                                        <div class="col-md-4">
                                            <!-- <div class="mb-3"> -->
                                                <label class="control-label">Type</label>
                                                <!-- <label class="control-label">Select type</label> -->
                                                <select class="form-control select2" id="drp-down" name="type">
                                                    <option >Select options</option>
                                                    <option value="product">Product</option>
                                                    <option value="service">Service</option>
                                                </select>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-md-8">
                                            <label class="control-label">Select Seller Name</label><br>
                                            <select class="form-control select2" id="seller-name" name="seller_name">
                                                    <option >Select seller name</option>
                                                    
                                            </select>
                                        </div>
                                        
                                        
                                    </div>
                                   
                                        <div  id="form-product" style="display:none;" 
                                        class="product-info">
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6" >
                                                    <label class="control-label">Select Category</label><br>
                                                    <select class="form-control select2" id="product-category" name="product-category">
                                                            <option >Select category</option>
                                                            
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="product_title" class="label-css">Product Title</label>
                                                    <input id="product_title" name="product_title" type="text" class="form-control input-css" >
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                        <label for="specification">Product Specification</label>
                                                        <input id="specification" name="specification" type="text" class="form-control input-css" >
                                                
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="packaging_type">Packaging Type</label>
                                                    <input type="text" name="packaging_type" id="packaging_type" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                        <label for="price">Price</label>
                                                        <input id="price" name="price" type="text" class="form-control input-css" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="unit">Unit</label>
                                                    <input type="text" name="unit" id="unit" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-12 col-md-12">
                                                    <label for="product_description">Product Description</label>
                                                    <textarea id="taskdesc-editor" name="product_description"></textarea>
                                                    <!-- <input id="product_description" name="product_description" type="text" class="form-control input-css" > -->
                                                
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                    <label for="image">Upload image</label>
                                                    <input id="image" name="image" type="file" class="form-control">
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="color">Color</label>
                                                    <input type="text" name="color" id="color" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                            <div class="col-6 col-md-6">
                                                    <label for="packagingsize">Packaging size</label>
                                                    <input type="text" name="packagingsize" id="packagingsize" class="form-control">
                                                
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="special_feature">Special feature</label>
                                                    <input type="text" name="special_feature" id="special_feature" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                    <label for="brand">Brand</label>
                                                    <input type="text" name="brand" id="brand" class="form-control">
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="country_origin">Country of origin</label>
                                                    <input type="text" name="country_origin" id="country_origin" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                        <label for="expiry_date">Expiry Date</label>
                                                        <input type="date" name="expiry_date" id="expiry_date" class="form-control">
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="order_quantity">Minimum Order Quantity</label>
                                                    <input type="text" name="order_quantity" id="order_quantity" class="form-control">
                                                </div>
                                                <div class="col-6 col-md-6">
                                                   
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                        <label for="expiry_date">SEO Title</label>
                                                        <input type="text" name="seo_title" id="seo_title" class="form-control">
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="seo_desc">SEO Description</label>
                                                    <input type="text" name="seo_desc" id="seo_desc" class="form-control">
                                                </div>
                                               
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                        <label for="expiry_date">SEO Tags</label>
                                                        <input type="text" name="seo_tags" id="seo_tags" class="form-control" data-role="tagsinput">
                                                </div>
                                               
                                            </div>
                                            <div class="row mt-2">
                                                <div class="d-flex flex-wrap gap-2 mt-4">
                                                    <button type="submit" id="create-product" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    
                                    <div  id="form-service" style="display:none;" class="service-info">
                                        
                                           <div class="row mt-2">
                                                <div class="col-md-6 col-6" >
                                                    <div class="mb-3">
                                                        <label class="control-label">Select Category</label><br>
                                                        <select class="form-control select2" id="service-category" name="service-category">
                                                                <option >Select category</option>
                                                                
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6 col-6">
                                                        <label for="address">Address</label>
                                                        <input id="address" name="address" type="text" class="form-control" >
                                                </div>
                                                
                                           </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-6">
                                                        <label for="phone">Phone no</label>
                                                        <div class="input-group">
                                                            <input id="phone" name="phone" type="text" class="form-control"  onkeyup="this.value=this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <input type="checkbox" name="is_whatsapp" id="whatsapp-checkbox" value="">
                                                                    <label class="form-check-label" for="whatsapp-checkbox">Whatsapp</label>
                                                                </span>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="features">Features</label>
                                                    <input id="features" name="features" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-6">
                                                    <label for="price">Price</label>
                                                    <input id="price" name="price" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">
                                                   
                                                </div>
                                                <div class="col-md-6 col-6">
                                                    <label for="unit">Unit</label>
                                                    <input id="unit" name="unit" type="text" class="form-control" >
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                    <label for="payment_mode">Mode of payment</label>
                                                    <input id="payment_mode" name="payment_mode" type="text" class="form-control" >
                                                </div>
                                                <div class="col-6 col-md-6 mt-3 mt-md-0">
                                                        <div class="form-group">
                                                            <label for="password">Availability</label>
                                                            <div class="d-flex p-1 align-items-center">
                                                            <label for="from" class="mr-2">From</label>
                                                            <input type="date" name="from_date" id="from" class="form-control mr-2">
                                                            <label for="to" class="mr-2">To</label>
                                                            <input type="date" name="to_date" id="to" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                <!-- <div class="col-6 col-md-6 mt-3 mt-md-0 ">
                                                    <label for="password">Availability</label>
                                                    <div class="d-flex p-2"> </div>
                                                    <label for="password" class="mr-2">From</label>
                                                    <input type="date" name="from_date" id="from">
                                                    <label for="password">To</label>
                                                    <input type="date" name="to_date" id="to">
                                                </div> -->
                                                
                                            </div>
                                            <div class="row mt-2">
                                            <div class="col-6 col-md-6">
                                                    <label for="service_highlight">Service Highlights</label>
                                                    <textarea name="service_highlight" id="service_highlight" ></textarea>
                                                    <!-- <input id="service_highlight" name="service_highlight" type="text" class="form-control" > -->
                                                    
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <label for="">Q & A</label>
                                                    <div class="container my-3">
                                                        <div id="text-box-container">
                                                            <div class="text-box mb-3">
                                                                <div class="input-group">
                                                                    <input type="text" name="question[]" class="form-control textbox" placeholder="Enter question 1">
                                                                    <div class="input-group-append">
                                                                    <button class="btn btn-outline-secondary add-more-textbox" type="button">Add answer</button>
                                                                    <button class="btn btn-outline-secondary remove-textbox" type="button" style="display: none;"><span><i class="fa fa-minus" style="font-size:13px;color:red"></i></span></button>
                                                                    </div>
                                                                </div>
                                                                <div class="textarea-container"></div>
                                                            </div>
                                                        </div>
                                                        <button id="add-more-box" class="btn btn-primary" type="button">Add More Question</button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-6">
                                                    <label for="address">Upload image</label>
                                                    <input id="image" name="image[]" type="file"
                                                                    class="form-control" multiple>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                        <label for="expiry_date">SEO Title</label>
                                                        <input type="text" name="seo_title" id="seo_title" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-6 col-md-6">
                                                    <label for="seo_desc">SEO Description</label>
                                                    <input type="text" name="seo_desc" id="seo_desc" class="form-control">
                                                </div>
                                                <div class="col-6 col-md-6">
                                                        <label for="expiry_date">SEO Tags</label>
                                                        <input type="text" name="seo_tags" id="seo_tags" class="form-control" data-role="tagsinput">
                                                </div>
                                            </div>
                                            
                                                <div class="button-container">
                                                    <button type="submit" id="create-service" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
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

<!-- <script>
  $(document).ready(function() {
  var max_textbox = 5; // maximum number of text boxes
  var max_textarea = 1; // maximum number of text areas under each text box
  
  // Add text box
  $('#add-more-box').click(function() {
    if ($('.text-box').length < max_textbox) {
      var new_textbox = $('.text-box:last').clone();
      new_textbox.find('input:text').val('');
      new_textbox.find('.textarea-container').empty();
      $('#text-box-container').append(new_textbox);
    }
  });
  
  // Add text area
  $('#text-box-container').on('click', '.add-more-textbox', function() {
    if ($(this).closest('.text-box').find('textarea').length < max_textarea) {
      var new_textarea = $('<textarea></textarea>').addClass('form-control mb-2');
      $(this).closest('.text-box').find('.textarea-container').append(new_textarea);
    }
  });
});


</script> -->
<script>
  $(document).ready(function() {
    var max_textbox = 5; // maximum number of text boxes
    var max_textarea = 1; // maximum number of text areas under each text box
    var question_index = 1; // index for question IDs
    var answer_index = 1; // index for answer IDs

    // Add text box
    $('#add-more-box').click(function() {
      if ($('.text-box').length < max_textbox) {
        var new_textbox = $('.text-box:last').clone();
        // Increment the question ID
        question_index++;
        new_textbox.find('input:text').attr('id', 'question'+question_index).val('');
        new_textbox.find('input:text').attr('placeholder', 'Enter Question ' + question_index);     
        new_textbox.find('.textarea-container').empty();
        new_textbox.find('.remove-textbox').show(); // show remove button
        $('#text-box-container').append(new_textbox);
      }
    });

    // Add text area
    $('#text-box-container').on('click', '.add-more-textbox', function() {
      if ($(this).closest('.text-box').find('textarea').length < max_textarea) {
        var new_textarea = $('<textarea></textarea>').addClass('form-control mb-2');
        // Increment the answer ID
        // answer_index++;
        new_textarea.attr('id', 'answer'+question_index);
        new_textarea.attr('name', 'answer[]');
        new_textarea.attr('placeholder', 'Enter Answer for Question ' + question_index);
        $(this).closest('.text-box').find('.textarea-container').append(new_textarea);
      }
    });
    // Remove text box
    $('#text-box-container').on('click', '.remove-textbox', function() {
      $(this).closest('.text-box').remove();
    });
  });
</script>


<script>
    $(document).ready(function(){
        // hide all divs initially
    $('#form-product').hide();
    $('#form-service').hide();
        $('#drp-down').on('select2:select', function (e) {
        var selectedValue = e.params.data.id;
       
        if (selectedValue == 'service') {
            $("#form-service").show();
            // $(".service-cat").show();
            // $(".product-cat").hide();
            $("#form-product").hide();
        }else{
            $("#form-product").show();
            // $(".product-cat").show();
            // $(".service-cat").hide();
            $("#form-service").hide();
        }
        // update form action with visible div's ID
        var visibleDiv = $('.product-info:visible, .service-info:visible');
        $('#userform').attr('action', '{{ url('save-product-service') }}?visible_div=' + visibleDiv.attr('id'));
        
});
// This part is for not submitting the hidden inputs so that it will be easy for making some fields as required
        $('#create-service').on('click', function(e) {
            var visibleDiv = $('.product-info:visible, .service-info:visible');
            var hiddenDiv = $('.product-info:not(:visible), .service-info:not(:visible)');
            // disable inputs in the hidden div
            hiddenDiv.find(':input').prop('disabled', true);
            // enable inputs in the visible div
            visibleDiv.find(':input').prop('disabled', false);
            
         });
        $('#create-product').on('click', function(e) {
            var visibleDiv = $('.product-info:visible, .service-info:visible');
            var hiddenDiv = $('.product-info:not(:visible), .service-info:not(:visible)');
            // disable inputs in the hidden div
            hiddenDiv.find(':input').prop('disabled', true);
            // enable inputs in the visible div
            visibleDiv.find(':input').prop('disabled', false);
        });
        
    });
</script>
<script>
    $(document).ready(function(){
        var _token = $('input[name="_token"]').val();
        $( "#seller-name" ).select2({
            
        ajax: { 
            url: "{{ url('getSellers') }}",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function (params) {
            return {
                _token: _token,
                search: params.term // search term
            };
            },
            processResults: function (response) {
            return {
                results: response
            };
            },
            cache: true
        }

        });

});
    
</script>
<script>
 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){

     $( "#product-category" ).select2({
        ajax: { 
          url: "{{ url('getProductcategory')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
               _token: CSRF_TOKEN,
               search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

     });
     $( "#service-category" ).select2({
        ajax: { 
          url: "{{ url('getServicecategory')}}",
          type: "post",
          dataType: 'json',
          delay: 250,
          data: function (params) {
            return {
               _token: CSRF_TOKEN,
               search: params.term // search term
            };
          },
          processResults: function (response) {
            return {
              results: response
            };
          },
          cache: true
        }

     });

   });


   
</script>
<!--tinymce js-->
<script src="{{ asset('libs/tinymce/tinymce.min.js') }}"></script>
<script src=" {{ asset('js/pages/task-create.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#service_highlight').summernote({
                height: 100,
            });
        });
    </script>
    
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
</body>

</html>