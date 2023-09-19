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
<!-- <div class="filter_section">
    <div class="container">
        <div class="row row_align_center">
            <div class="col-lg-10">    
                <div class="other_links">
                    <ul class="main_list">
                        <li class="main_list_item">
                            <div class="btn-group pr-3 cat_btn">
                                <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle custom_button" href="">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i> Categories
                                </a>
                                <ul class="dropdown-menu fweez" role="menu" aria-labelledby="dropdownMenu">
                                  
                                   
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item" tabindex="-1" href="#">
                                      xyz
                                        </a>
                                        <ul class="dropdown-menu fweeq p-3">
                                            <li>
                                            <div class="row">
                                           
                                                <div class="col-6">
                                                    <h2>xyz</h2>
                                                    
                                                </div>
                                               
                                            </div>
                                        </li>  
                                        </ul>
                                    </li>
                                   
                                    
                                </ul>
                            </div>
                        </li>

                       
                    </ul>
                </div>
            </div>
                
            </div>
        </div>
    </div> -->
    </div>
    <div class="container-custom">
    <div class="container mydiv">
        <div class="category_title">
            <h1>Search results For Product </h1>        
        </div>
        <div class="row">
        {{-- @foreach($services as $service) --}}
        <img src="{{ asset('customer-images/under-maintenance-sign-500x500.webp')}}" alt="">
            <!-- <div class="col-lg-3 col-md-3 col-sm-6 padding_gap">
                <a href="#">
                    <div class="product_box">
                        <div class="product_badge">
                            Just Launched
                        </div>
                        <div class="product_thumbnail">
                            <img class="product_thumbnail_image" src="{{ asset('uploads/userdata/No_Logo_Available.png') }}">
                        </div>
                        <div class="product_title_div">
                            <span class="product_title">
                                <a href="{{-- url('/service-detail/'.$service->id) --}}"  class="sml-name">
                                    {{-- $service->company_name --}}</a>
                                
                            </span>
                        </div>
                        <div class="minimum_price_section">
                        
                            <span class="minimum_price"><span class="rs_symbol">₹</span></span>
                            <div class="discount_section">
                              
                            </div>
                            <div class="product_left">
                                
                            </div>
                            <div class="lead_time">
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div> -->
           {{-- @endforeach --}}
        </div>
    </div>
    </div>
@include('customer.product_footer')
</body>
</html>