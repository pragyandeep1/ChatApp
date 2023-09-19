<!DOCTYPE html>
<html lang="en">
<head>
@section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    

    <script src='https://asvd.github.io/dragscroll/dragscroll.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>

    <!-- <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'> -->
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700'> -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('customer-images/product_files/style.css') }}">
    <style>
      .sml-name{
        display: block;
        white-space: nowrap;
        width: 15em;
        overflow: hidden;
        text-overflow: ellipsis;
      }
    </style>
</head>
<body>
@include('customer.product_navbar')

    <div class="container-custom">
    <div class="container mydiv">
        <div class="category_title">
            <h1>Search results</h1>        
        </div>
        <div class="row">
            @if(count($services) > 0)
            @foreach($services as $service)
            <div class="col-lg-3 col-md-3 col-sm-6 padding_gap">
                <a href="#">
                    <div class="product_box">
                        <!-- <div class="product_badge">
                            Just Launched
                        </div> -->
                        <div class="product_thumbnail" style="text-align: center;">
                        @php
                        $images = json_decode($service->image);
                        @endphp
                        @if(is_array($images) && count($images) > 0)
                            @php
                                $firstImage = $images[0];
                            @endphp
                            <img class="product_thumbnail_image" src="{{ asset('uploads/service/'.$firstImage) }}" style="width: 254px; height: 223px;">
                        @else
                            <img class="product_thumbnail_image" src="{{ asset('uploads/userdata/no-image-new.jpg') }}" style="width: 254px; height: 223px;">
                        @endif

                            
                            <!-- <img class="product_thumbnail_image" src="{{ asset('uploads/userdata/No_Logo_Available.png') }}"> -->
                        </div>
                        <div class="product_title_div">
                            <span class="product_title">
                                <a href="{{ url('/service-detail/'.$service->id) }}"  class="sml-name">{{ $service->company_name }}</a>
                                
                            </span>
                        </div>
                        <div class="minimum_price_section">
                        
                            <!-- <span class="minimum_price"><span class="rs_symbol">₹</span></span> -->
                            <div class="discount_section">
                              
                            </div>
                            <div class="product_left">
                                
                            </div>
                            <div class="lead_time">
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div>
           @endforeach
           @else
           <div class="nodata_found mb-4" style="background-color: white;">
                <img src="{{ asset('customer-images/1920 x 400-01.png') }}" alt="No Data" class="img-fluid">
            </div>
           @endif
           
        </div>
        <!-- Display pagination links -->
{{ $services->appends(request()->except('page'))->links() }} 
    </div>
    </div>
@include('customer.product_footer')
</body>
</html>