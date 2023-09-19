<!DOCTYPE html>
<html lang="en">

<head>
@section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
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

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <!-- sweet alert -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" />
    <link rel="stylesheet" href="{{ asset('css/free-listing-style.css') }}">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .select2-container{
            width: 100% !important;
        }

    </style>
</head>

<body>
    @include('customer.customer_navbar')
    <div class="container-custom">
        <div class="container container bg_white width_limit">
            <div class="form_tagline">
                Enter your business details for <span class="free_highlight">FREE</span> in largest local search engine.
            </div>
            <form action="{{ url('/save-freelisting') }}" method="post" id="userform" name="userform">
                @csrf
                <div class="form_head_title">Enter your detail below</div>
                <div class="form_head_title_aesthetic">* denotes mandatory fields</div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" id="company_name" placeholder="Company Name*"
                            name="company_name" required oninput="validateInput(this)">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="City*" name="city" required oninput="validateInput(this)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="input-group mt-3 mb-3">
                            <div class="input-group-prepend">
                                <!-- <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">
                                Title
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Mr</a>
                                <a class="dropdown-item" href="#">Mrs</a>
                                <a class="dropdown-item" href="#">Ms</a>
                                <a class="dropdown-item" href="#">Dr</a>
                              </div> -->


                                <select class="form-control" id="nameprefix" name="nameprefix">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Dr">Dr</option>
                                </select>

                            </div>
                            <input type="text" class="form-control" placeholder="First name*" name="firstName" required oninput="validateInput(this)">
                        </div>
                    </div>
                    <div class="col mt-3 mb-3">
                        <input type="text" class="form-control" placeholder="Last Name*" name="lastName" required oninput="validateInput(this)">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="tel" class="form-control" id="phone" placeholder="Mobile Number*"
                            name="phone" required onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10">
                    </div>
                    <div class="col">
                        <input type="tel" class="form-control" placeholder="Landline Number" name="landlineNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10">
                    </div>
                </div>
                <hr>
                <div class="form_head_title">Enter your Business detail below</div>
                <div class="form-row">
                    <div class="col">
                        <select class="form-control" id="drp-down" name="type">
                            <option>Select options</option>
                            <!-- <option value="product">Product</option> -->
                            <option value="service">Service</option>

                        </select>
                    </div>
                    <div class="col"></div>

                </div>
                <div id="form-product" style="display:none;" class="product-info">
                    <div class="row mt-2">
                        <div class="col-6 col-md-6">
                            <label class="control-label">Select Category</label><br>
                            <select class="form-control select2" id="product-category" name="product-category">
                                <option>Select category</option>

                            </select>
                        </div>
                        <div class="col-6 col-md-6">
                            <label for="product_title" class="label-css">Product Title</label>
                            <input id="product_title" name="product_title" type="text" class="form-control input-css">
                        </div>


                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-6">
                            <label for="specification">Product Specification</label>
                            <input id="specification" name="specification" type="text" class="form-control input-css">

                        </div>
                        <div class="col-6 col-md-6">
                            <label for="packaging_type">Packaging Type</label>
                            <input type="text" name="packaging_type" id="packaging_type" class="form-control">
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-6">
                            <label for="price">Price</label>
                            <input id="price" name="price" type="text" class="form-control input-css"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">

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





                </div>
                <div id="form-service" style="display:none;" class="service-info">

                    <div class="row mt-2">
                        <div class="col-md-6 col-6">
                            <div class="mb-3">
                                <label class="control-label">Select Category</label><br>
                                <select class="form-control select2" id="service-category" name="service-category">
                                    <option>Select category</option>

                                </select>
                            </div>

                        </div>
                        <div class="col-md-6 col-6">
                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="form-control">
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 col-6">
                            <label for="phone">Phone no</label>
                            <div class="input-group">
                                <input id="phone" name="phone" type="text" class="form-control"
                                    onkeyup="this.value=this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')">
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
                            <input id="price" name="price" type="text" class="form-control"
                                onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')">

                        </div>
                        <div class="col-md-6 col-6">
                            <label for="unit">Unit</label>
                            <input id="unit" name="unit" type="text" class="form-control">
                        </div>


                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-6">
                            <label for="payment_mode">Mode of payment</label>
                            <input id="payment_mode" name="payment_mode" type="text" class="form-control">
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

                        

                    </div>
                    <div class="row mt-2">
                        <div class="col-6 col-md-6">
                            <label for="service_highlight">Service Highlights</label>
                            <textarea name="service_highlight" id="service_highlight"></textarea>
                         

                        </div>
                        <div class="col-md-6 col-6">
                            <label for="address">Upload image</label>
                            <input id="image" name="image[]" type="file" class="form-control" multiple>
                        </div>

                    </div>
                    <div class="row mt-2">
                        
                        
                    </div>
                    


                </div>
                <button type="submit" id="create-service" class="btn btn-primary waves-effect waves-light mt-3">Save Changes</button>
                <!-- <button type="submit" class="btn btn-primary mt-3">Submit</button> -->
            </form>
        </div>
    </div>




    @include('customer.customer_footer')
    <!-- sweet alert code start  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>
    @if(session('success'))
    <script>
        var base_url = window.location.origin;
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}',
        // text: '{{ session('success') }}',
    }).then(function() {
    window.location = base_url;
});
    </script>
    @endif
    <!-- sweet alert code end  -->
    <!-- select 2 plugin -->
<script src="{{ asset('libs/select2/js/select2.min.js')}}"></script>
<!-- init js -->
<script src="{{ asset('js/pages/ecommerce-select2.init.js') }}"></script>
    <script>
   $(document).ready(function() {
    $('#form-product').hide();
    $('#form-service').hide();
        $('#drp-down').on('change', function() {
           // hide all divs initially
           var selectedValue = $(this).val();
      
        // var selectedValue = e.params.data.id;
       
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
        $('#userform').attr('action', '{{ url('save-freelisting') }}?visible_div=' + visibleDiv.attr('id'));
        
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#service_highlight').summernote({
                height: 100,
            });
        });
    </script>

    <!--tinymce js-->
<script src="{{ asset('libs/tinymce/tinymce.min.js') }}"></script>
<script src=" {{ asset('js/pages/task-create.init.js') }}"></script>

<script>
  function validateInput(input) {
    // Remove any numeric characters from the input
    input.value = input.value.replace(/[0-9]/g, '');
}
</script>
@include('customer.search_bar_all_page')

</body>

</html>