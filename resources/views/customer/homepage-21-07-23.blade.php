<!-- Previous code for auto suggestion of tags with comma separated value
 -->
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <link rel="stylesheet" href="{{ asset('css/style_3_1.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- auto complete start -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- auto complete end -->

    <!-- <link rel="stylesheet" href="{{ asset('css/frontend-style.css') }}"> -->
    <style>
    .border {
        border: 1px solid #ffffff !important;
    }

    .eee {
        background-color: #fff;
        border-radius: 0;
        border: unset !important;
    }

    .drydr {
        background-color: #fff;
        padding: 0;
        color: orangered;
        border: unset;
    }

    .www i:hover {
        color: mediumvioletred;
    }

    .drydr i {
        color: orangered;
    }

    .www {
        display: flex;
    }

    .catogory_search select {
        height: 50px;
    }

    .sarch-bar {
        margin: auto;
        width: 71%;
    }
    .seo_tags_display{
      color: gray;
  font-size: 0.8em;
    }
    </style>
</head>

<body>
    @include('customer.customer_navbar')
    <div class="cover_image_section">
        <div class="container">
            <div class="header_container">
                <div class="header_container_content">
                    <div class="home_greeting">
                        Discover & connect.
                        <span class="authFirstname">Your own web directory.</span>
                    </div>
                </div>
                <div style="padding: 0px 10%;">
                    <form action="{{ url('/search') }}" method="post" id="search_res">
                        @csrf
                        <div class="form_div row">
                        <input type="hidden" name="city" value="" id="city">
                            <!-- <div class="catogory_search col-lg-3 col-md-3 pr-0">
                <select class="form-control select2" id="city" name="city" placeholder="City name" required>
                    <option value="">Select cities</option>
                        @foreach ($cities as $city)
                          <option value="{{ $city->city }}">{{ $city->city }}<option> 
                           @endforeach
                </select>
                   
                </div> -->
                            <!-- <div class="catogory_search col-lg-3 col-md-3 px-1">
                <select class="form-control select2" id="category" name="category" placeholder="Category name" required>
                    <option value="">Select Category</option>
                    
                          <option value="product">Product</option>
                          <option value="service">Service</option>
                    
                </select>
                   
                </div> -->
                            <div class="location_search col-lg-12 col-md-12 pl-0">
                                <div class="input-group sarch-bar">
                                    <input type="text" class="form-control" name="search_name" id="search_name"
                                        placeholder="Search desired service or product name">
                                        <span id="seo_tags_display"></span>
                                    <div class="input-group-append">
                                        <button class="btn btn-dark search_icon" type="submit" id="search_btn"><span
                                                class="material-symbols-outlined">search</span></button>
                                        <!-- <button class="btn btn-dark search_icon" type="button" id="search_btn"><span class="material-symbols-outlined">search</span></button> -->
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

                <div class="popular_links">
                    <ul>
                        <li class="quick_links"><a href="{{ url('servicecategory/27') }}">Restaurants</a></li>
                        <li class="quick_links"><a href="{{ url('servicecategory/36') }}">Dentists</a></li>
                        <li class="quick_links"><a href="{{ url('servicecategory/33') }}">Medical Clinics</a></li>
                        <li class="quick_links"><a href="{{ url('servicecategory/29') }}">Car Repair</a></li>
                        <li class="quick_links"><a href="{{ url('servicecategory/28') }}">Home Decor</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="string_img">
            <img src="{{ asset('customer-images/final-svg-cover-01.svg') }}">
        </div>
    </div>
    <div class="service_category_section bg_white">
        <div class="container-fluid">
            <div class="our_cat_section_heading">
                <div class="center_title">
                    <h2 class="heading_styling">Service <span class="highlight_title">Cat</span>egory</h2>
                    <p>Click and find the services near you.</p>
                </div>
                <!-- <div class="right_side">
              <button class="button_view_all">View All</button>
            </div> -->
            </div>
        </div>
        <div class="container-fluid">
            <div class="our_cat_section_section">
                @foreach($services as $service)

                
                <a href="{{url('/servicecategory/'.$service->id)}}" class="our_cat_section_box">
                    <div class="our_cat_section_link">
                        <h5>{{ $service->name }}</h5>
                        <h6>
                        @php 
                            $parentCategories = \App\Models\Category::whereNull('parent_id')->pluck('id');
                            $childCategories = \App\Models\Category::where('parent_id', $service->id)->pluck('id');
                        @endphp

                        @php
                            $count_ad = \App\Models\Service::whereIn('category_id', $childCategories)->count();
                        @endphp

                          {{ $count_ad }}
                          Ads

                        </h6>
                        <img src="{{ asset('uploads/category/'.$service->thumbnail) }}" alt="icons">
                    </div>
                </a>
                @endforeach
                <a href="{{ url('/allservice') }}" class="our_cat_section_box view_all_box">
                    <div class="our_cat_section_link">
                        <!-- <img src="images/Service_icons/menu.png" alt="icons"> -->
                        <h5>View<br>All</h5>
                    </div>
                </a>
            </div>
        </div>

    </div>


    <!-- <div class="product_category_section bg_grey">
    <div class="container-fluid">
        <div class="our_cat_section_heading">
            <div class="center_title">
              <h2 class="heading_styling">Product <span class="highlight_title">Cat</span>egory</h2>
              <p>We are the bridge that connects buyers and sellers in one place.</p>
            </div>
           
        </div>
    </div>
    <div class="container-fluid">
        <div class="our_cat_section_section">
          @foreach($products as $product)
            <a href="{{ url('/product/'.$product->id) }}" class="our_cat_section_box">
              <div class="our_cat_section_link">
                <h5>{{ $product->name }}</h5>
                <h6>09 Ads</h6>
                <img src="{{ asset('uploads/category/'.$product->thumbnail) }}" alt="icons">
              </div>
            </a>
           @endforeach
              <a href="{{ url('/allproducts_page') }}" class="our_cat_section_box view_all_box">
                <div class="our_cat_section_link">
                 
                  <h5>View<br>All</h5>
                </div>
              </a>
            
    
        </div>
    </div>

</div>  -->
    <div class="Trending_services bg_white">
        <div class="product_category_section">
            <div class="container-fluid">
                <div class="our_cat_section_heading">
                    <div class="center_title">
                        <h2 class="heading_styling">Trending <span class="highlight_title">Ser</span>vices</h2>
                        <p>Find services at your fingertips.</p>
                    </div>
                    <!-- <div class="right_side">
                  <button class="button_view_all">View All</button>
                </div> -->
                </div>
            </div>
        </div>
        <div class="container-fluid row mx-auto">
          <!-- trending service start -->
          @php 
          $trending_services_one = App\Models\Trendingservice::where('id','1')->first();
          $trending_services_two = App\Models\Trendingservice::where('id','2')->first();

          @endphp
                   
            <div class="category_detail_section col">
                <div class="left_side col">
                    <div class="row">
                    <!-- asset('/customer-images/' . $trending_services_one->background_image) -->
                    <!-- background: linear-gradient(to bottom,rgba(10,10,10,0) 0,#161616a8 61%,#1e1e1ecf 100%), url('{{ asset('/uploads/trending-category/' . $trending_services_one->background_image) }}'); -->
                         <div class="col category_banner_section" style="background: linear-gradient(to bottom,rgba(10,10,10,0) 0,#161616a8 61%,#1e1e1ecf 100%), url('{{ asset('/uploads/trending-category/' . $trending_services_one->background_image) }}');">
                            <div class="category_banner">
                                <div class="banner_content">
                                    <h2>{{ $trending_services_one->category_title }}</h2>
                                    @php
                                    $subcategories=  App\Models\Category::where('parent_id',$trending_services_one->category_id)->limit(6)->get();
                               
                                    @endphp
                                    <ul>
                                        @foreach($subcategories as $subcategory)
                                        <li><a href="{{ url('/service_subcategory/subcat/'.$subcategory->id)}}">{{ $subcategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <a href="#" class="view_all_cat_btn">View All</a>
                                </div>
                            </div>
                        </div>
                        
                      
                       
                        @php
                            $sellers = App\Models\Sellerinfo::where('category_id', $trending_services_one->category_id)->limit(6)->get();
                          $sell_arr = $sellers->toArray();
                        @endphp
                        
                        <div class="col px-0">
                            <div class="sub_category_columns">
                                @foreach($sellers as $seller)
                                @php 
                                $data = json_decode($seller);
                                @endphp
                                <div class="sub_category_set row">
                                    <div class="product_thumbnail col-5">
                                        @if($data->company_name == 'Barbeque Nation')
                                        <img src="{{ asset('images/trending_services/barbequnation_logo.svg') }}">
                                        @endif
                                        @if($data->company_name == 'Birthday Spot')
                                        <img src="{{ asset('images/trending_services/bday_spot.png') }}">
                                        @endif
                                        @if($data->company_name == 'Mukteswar Celebration - Best Wedding Planner in Bhubaneswar')
                                        <img src="{{ asset('images/trending_services/Wedding Planner in Bhubaneswar (11).jpeg') }}">
                                        @endif
                                        @if($data->company_name == 'Dofort Entertainment')
                                        <img src="{{ asset('images/trending_services/download.jpg') }}">
                                        @endif
                                        @if($data->company_name == 'SHADOW WEDLEE')
                                        <img src="{{ asset('images/trending_services/2020-11-08.jpg') }}">
                                        @endif
                                        @if($data->company_name == 'Angan Horizon')
                                        <img src="{{ asset('images/trending_services/download (1).jpg') }}">
                                        @endif

                                    </div>
                                    <div class="product_meta col-7">
                                        <!-- <h2><a href="#">Office Automation Products</a></h2> -->
                                        <ul>
                                            <li><a href="{{ url('/service-detail/'.$data->id) }}">{{ str_limit($data->company_name,20) }}</a></li>
                                            <!-- <li><a href="#">Xerox Machines</a></li>
                                            <li><a href="#">Fingerprint Scanners</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        
                      
                    </div>
                </div>
            </div>
            <div class="category_detail_section col">
                <div class="left_side col">
                    <div class="row">
                    <!-- asset('/customer-images/' . $trending_services_two->background_image) -->
                    <!-- background: linear-gradient(to bottom,rgba(10,10,10,0) 0,#161616a8 61%,#1e1e1ecf 100%), url('{{ asset('/uploads/trending-category/' . $trending_services_two->background_image) }}'); -->
                         <div class="col category_banner_section" style="background: linear-gradient(to bottom,rgba(10,10,10,0) 0,#161616a8 61%,#1e1e1ecf 100%), url('{{ asset('/uploads/trending-category/' . $trending_services_two->background_image) }}');">
                            <div class="category_banner">
                                <div class="banner_content">
                                    <h2>{{ $trending_services_two->category_title }}</h2>
                                    @php
                                    $subcategories=  App\Models\Category::where('parent_id',$trending_services_two->category_id)->limit(6)->get();
                                    $subcategories_first =  App\Models\Category::where('parent_id',$trending_services_two->category_id)->first();
                               
                                    @endphp
                                    <ul>
                                        @foreach($subcategories as $subcategory)
                                        <li><a href="{{ url('/service_subcategory/subcat/'.$subcategory->id)}}">{{ $subcategory->name }}</a></li>
                                        @endforeach
                                    </ul>
                                    <a href="#" class="view_all_cat_btn">View All</a>
                                </div>
                            </div>
                        </div>
                        
                      
                       
                        @php
                            $sellers = App\Models\Sellerinfo::where('category_id', $subcategories_first->id)->limit(6)->get();
                          
                          $sell_arr = $sellers->toArray();
                        @endphp
                        
                        <div class="col px-0">
                            <div class="sub_category_columns">
                                @foreach($sellers as $seller)
                                @php 
                                $data = json_decode($seller);
                                @endphp
                                <div class="sub_category_set row">
                                    <div class="product_thumbnail col-5">
                                    @if($data->company_name == 'MAYFAIR Outdoor Catering & Events')
                                        <img src="{{ asset('images/trending_services/business_logo.png') }}">
                                        @endif
                                        @if($data->company_name == 'BHUJABAL CATERING')
                                        <img src="{{ asset('images/trending_services/BHUJABAL-CATERING.jpg') }}">
                                        @endif
                                        @if($data->company_name == 'Tandoor Hot - Wedding, Corporate, Birthday Caterering in Bhubaneswar')
                                        <img src="{{ asset('images/trending_services/2019-03-15.jpg') }}">
                                        @endif
                                        @if($data->company_name == 'Jhilimili Foods & Catering - Best Wedding Catering Service In Bhubaneswar')
                                        <img src="{{ asset('images/trending_services/download (2).jpg') }}">
                                        @endif
                                        @if($data->company_name == 'KITCHEN KING CATERER')
                                        <img src="{{ asset('images/trending_services/images.jpg') }}">
                                        @endif
                                        @if($data->company_name == 'Amicable Equipments Pvt. Ltd.')
                                        <img src="{{ asset('images/trending_services/2021-01-13.jpg') }}">
                                        @endif
                                    </div>
                                    <div class="product_meta col-7">
                                        <!-- <h2><a href="#">Office Automation Products</a></h2> -->
                                        <ul>
                                            <li><a href="{{ url('/service-detail/'.$data->id) }}">{{ str_limit($data->company_name,12) }}</a></li>
                                            <!-- <li><a href="#">Xerox Machines</a></li>
                                            <li><a href="#">Fingerprint Scanners</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        
                      
                    </div>
                </div>
            </div>
          
            <!-- trending service end -->
        </div>
        <!-- mobile Start -->
        <div class="container-fluid">
            <div class="mobile_product_service_box row">
                <div class="mobile_product_service_box_column col">
                    <div class="mobile_product_service_box_image">
                        <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                    </div>
                    <div class="mobile_product_service_category">
                        <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                        <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                        <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
                    </div>
                </div>
                <div class="mobile_product_service_box_column col">
                    <div class="mobile_product_service_box_image">
                        <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                    </div>
                    <div class="mobile_product_service_category">
                        <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                        <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                        <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
                    </div>
                </div>
                <div class="mobile_product_service_box_column col">
                    <div class="mobile_product_service_box_image">
                        <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                    </div>
                    <div class="mobile_product_service_category">
                        <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                        <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                        <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
                    </div>
                </div>
                <div class="mobile_product_service_box_column col">
                    <div class="mobile_product_service_box_image">
                        <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                    </div>
                    <div class="mobile_product_service_category">
                        <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                        <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                        <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
                    </div>
                </div>
                <div class="mobile_product_service_box_column col">
                    <div class="mobile_product_service_box_image">
                        <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                    </div>
                    <div class="mobile_product_service_category">
                        <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                        <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                        <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
                    </div>
                </div>
                <div class="mobile_product_service_box_column col">
                    <div class="mobile_product_service_box_image">
                        <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                    </div>
                    <div class="mobile_product_service_category">
                        <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                        <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                        <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
                    </div>
                </div>
            </div>
            <!-- <div class="mobile_product_service_box row">
            <div class="mobile_product_service_box_column col">
              <div class="mobile_product_service_box_image">
                <img src="images/photocopier-machine-125x125.jpg">
            </div>
              <div class="mobile_product_service_category">
                <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
            </div>
          </div>
            <div class="mobile_product_service_box_column col">
              <div class="mobile_product_service_box_image">
                <img src="images/photocopier-machine-125x125.jpg">
        </div>
              <div class="mobile_product_service_category">
                <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
            </div>
            </div>
            <div class="mobile_product_service_box_column col">
              <div class="mobile_product_service_box_image">
                <img src="images/photocopier-machine-125x125.jpg">
          </div>
              <div class="mobile_product_service_category">
                <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
                <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
                <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
        </div> 
      </div>
    </div> -->
        </div>
        <!-- mobile end -->
    </div>
    <!-- <div class="Trending_services bg_grey">
    <div class="product_category_section">
        <div class="container-fluid">
            <div class="our_cat_section_heading">
                  <div class="center_title">
                    <h2 class="heading_styling">Trending <span class="highlight_title">Pro</span>ducts</h2>
                  <p>Business marketplace for you.</p>
                </div>
               
            </div>
        </div>
    </div>
      <div class="container-fluid row mx-auto">
        <div class="category_detail_section col">
            <div class="left_side col">
                <div class="row">
                    <div class="col category_banner_section">
        <div class="category_banner">
          <div class="banner_content">
                            <h2>Electronics & Electrical Goods & Supplies</h2>
            <ul>
              <li><a href="#">Voltage & Power Stabilizers</a></li>
              <li><a href="#">GPS and Navigation Devices</a></li>
              <li><a href="#">Biometrics & Access Control Devices</a></li>
              <li><a href="#">CCTV, Surveillance Systems and Parts</a></li>
            </ul>
            <a href="#" class="view_all_cat_btn">View All</a>
          </div>
        </div>
                    </div>
                    <div class="col px-0">
        <div class="sub_category_columns">
                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/photocopier-machine-125x125.jpg')}}">
                                </div>
                                <div class="product_meta col-7"><h2><a href="#">Office Automation Products</a></h2>
            <ul>
              <li><a href="#">Multifunction Printer</a></li>
              <li><a href="#">Xerox Machines</a></li>
              <li><a href="#">Fingerprint Scanners</a></li>
            </ul>
          </div>
          </div>

                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/lighting-controllers1-125x125.jpg') }}"></div>
                                <div class="product_meta col-7">
                                    <h2>
                                        <a href="#">Control & Automation</a>
                                    </h2>
              <ul>
                <li><a href="#">VFD</a></li>
                <li><a href="#">PLC</a></li>
                <li><a href="#">HMI</a></li>
              </ul>
            </div>
            </div>

                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/street-light-125x125.jpg') }}">
                                </div>
                                <div class="product_meta col-7"><h2><a href="#">Commercial Lights</a></h2>
                <ul>
                  <li><a href="#">Flood Lights</a></li>
                  <li><a href="#">Street Lights</a></li>
                  <li><a href="#">Panel Light</a></li>
                </ul>
              </div>
              </div>
        </div>
                    </div>
                    <div class="col px-0">
        <div class="sub_category_columns">
                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                                </div>
                                <div class="product_meta col-7"><h2><a href="#">Office Automation Products</a></h2>
            <ul>
              <li><a href="#">Multifunction Printer</a></li>
              <li><a href="#">Xerox Machines</a></li>
              <li><a href="#">Fingerprint Scanners</a></li>
            </ul>
          </div>
          </div>

                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/lighting-controllers1-125x125.jpg') }}"></div>
                                <div class="product_meta col-7">
                                    <h2>
                                        <a href="#">Control & Automation</a>
                                    </h2>
              <ul>
                <li><a href="#">VFD</a></li>
                <li><a href="#">PLC</a></li>
                <li><a href="#">HMI</a></li>
              </ul>
            </div>
            </div>

                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/street-light-125x125.jpg') }}">
                                </div>
                                <div class="product_meta col-7"><h2><a href="#">Commercial Lights</a></h2>
                <ul>
                  <li><a href="#">Flood Lights</a></li>
                  <li><a href="#">Street Lights</a></li>
                  <li><a href="#">Panel Light</a></li>
                </ul>
              </div>
              </div>
          </div>
      </div>
                </div>
            </div>
        </div>
        <div class="category_detail_section col">
            <div class="left_side col">
                <div class="row">
                    <div class="col category_banner_section">
        <div class="category_banner">
          <div class="banner_content">
                            <h2>Electronics & Electrical Goods & Supplies</h2>
            <ul>
              <li><a href="#">Voltage & Power Stabilizers</a></li>
              <li><a href="#">GPS and Navigation Devices</a></li>
              <li><a href="#">Biometrics & Access Control Devices</a></li>
              <li><a href="#">CCTV, Surveillance Systems and Parts</a></li>
            </ul>
            <a href="#" class="view_all_cat_btn">View All</a>
          </div>
        </div>
                    </div>
                    <div class="col px-0">
        <div class="sub_category_columns">
                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                                </div>
                                <div class="product_meta col-7"><h2><a href="#">Office Automation Products</a></h2>
            <ul>
              <li><a href="#">Multifunction Printer</a></li>
              <li><a href="#">Xerox Machines</a></li>
              <li><a href="#">Fingerprint Scanners</a></li>
            </ul>
          </div>
          </div>

                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/lighting-controllers1-125x125.jpg') }}"></div>
                                <div class="product_meta col-7">
                                    <h2>
                                        <a href="#">Control & Automation</a>
                                    </h2>
              <ul>
                <li><a href="#">VFD</a></li>
                <li><a href="#">PLC</a></li>
                <li><a href="#">HMI</a></li>
              </ul>
            </div>
            </div>

              <div class="sub_category_set row">
                    <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/street-light-125x125.jpg') }}">
                    </div>
                    <div class="product_meta col-7"><h2><a href="#">Commercial Lights</a></h2>
                      <ul>
                        <li><a href="#">Flood Lights</a></li>
                        <li><a href="#">Street Lights</a></li>
                        <li><a href="#">Panel Light</a></li>
                      </ul>
                    </div>
              </div>
        </div>
                    </div>
                    <div class="col px-0">
        <div class="sub_category_columns">
                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
                                </div>
                                <div class="product_meta col-7"><h2><a href="#">Office Automation Products</a></h2>
            <ul>
              <li><a href="#">Multifunction Printer</a></li>
              <li><a href="#">Xerox Machines</a></li>
              <li><a href="#">Fingerprint Scanners</a></li>
            </ul>
          </div>
          </div>

                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/lighting-controllers1-125x125.jpg') }}"></div>
                                <div class="product_meta col-7">
                                    <h2>
                                        <a href="#">Control & Automation</a>
                                    </h2>
              <ul>
                <li><a href="#">VFD</a></li>
                <li><a href="#">PLC</a></li>
                <li><a href="#">HMI</a></li>
              </ul>
            </div>
            </div>

                            <div class="sub_category_set row">
                                <div class="product_thumbnail col-5"><img src="{{ asset('customer-images/street-light-125x125.jpg') }}">
                                </div>
                                <div class="product_meta col-7"><h2><a href="#">Commercial Lights</a></h2>
                <ul>
                  <li><a href="#">Flood Lights</a></li>
                  <li><a href="#">Street Lights</a></li>
                  <li><a href="#">Panel Light</a></li>
                </ul>
              </div>
              </div>
          </div>
      </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- mobile Start -->
    <!-- <div class="container-fluid">
        <div class="mobile_product_service_box row">
            <div class="mobile_product_service_box_column col">
          <div class="mobile_product_service_box_image">
            <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
          </div>
          <div class="mobile_product_service_category">
            <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
            <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
            <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
          </div>
        </div>
            <div class="mobile_product_service_box_column col">
          <div class="mobile_product_service_box_image">
                <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
          </div>
          <div class="mobile_product_service_category">
            <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
            <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
            <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
          </div>
        </div>
            <div class="mobile_product_service_box_column col">
          <div class="mobile_product_service_box_image">
            <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
          </div>
          <div class="mobile_product_service_category">
            <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
            <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
            <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
          </div>
        </div>
            <div class="mobile_product_service_box_column col">
          <div class="mobile_product_service_box_image">
                <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
          </div>
          <div class="mobile_product_service_category">
            <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
            <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
            <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
          </div>
        </div>
            <div class="mobile_product_service_box_column col">
          <div class="mobile_product_service_box_image">
            <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
          </div>
          <div class="mobile_product_service_category">
            <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
            <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
            <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
          </div>
        </div>
            <div class="mobile_product_service_box_column col">
          <div class="mobile_product_service_box_image">
            <img src="{{ asset('customer-images/photocopier-machine-125x125.jpg') }}">
          </div>
          <div class="mobile_product_service_category">
            <a href="#" class="mobile_product_service_category_items">Multifunction Printer</a>
            <a href="#" class="mobile_product_service_category_items">Xerox Machines</a>
            <a href="#" class="mobile_product_service_category_items">Fingerprint Scanners</a>
          </div>
        </div>
        </div>
        
    </div> -->
    <!-- mobile end -->
    <!-- </div> -->
    <div class="search_by_cities bg_white">
        <div class="product_category_section">
            <div class="container-fluid">
                <div class="our_cat_section_heading">
                    <div class="center_title">
                        <h2 class="heading_styling">Search <span class="highlight_title">by</span>Cities</h2>
                        <p>Search and explore any city. One-stop solution.</p>
                    </div>
                    <!-- <div class="right_side">
                  <button class="button_view_all">View All</button>
                </div> -->
                </div>
            </div>
        </div>


        <div class="container-fluid search_by_cities_flex">
            @foreach($cities as $city)
            <div class="search_by_cities_section_area">
                <a href="#" class="search_by_cities_box">
                    <img src="{{ asset('uploads/city/'.$city->image) }}" class="city_image">
                    <div class="city_name">{{ $city->city}}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @include('customer.customer_footer')



    

    <script>
    // $(document).ready(function() {

    //   function loadAutocompleteData(cityId, category) {
    //     var availableTags = [];
    //     $.ajax({
    //       method: 'GET',
    //       url: "{{ url('service_list_ajax') }}",
    //       data: { cityId: cityId, category: category },
    //       success: function(response) {
    //         startAutocomplete(response);
    //       },
    //     });
    //   }

    //   function startAutocomplete(availableTags) {
    //     $("#search_name").autocomplete({
    //       source: availableTags,
    //     });
    //   }

    //   // Load autocomplete data on city or category change
    //   $('#city, #category').on('change', function() {
    //     var cityId = $('#city').val();
    //     var category = $('#category').val();
    //     loadAutocompleteData(cityId, category);
    //   });

    //   // Initial loading of autocomplete data
    //   var initialCityId = $('#city').val();
    //   var initialCategory = $('#category').val();
    //   loadAutocompleteData(initialCityId, initialCategory);
    // });
    </script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> -->
    <!-- <script>
    $(document).ready(function() {
       
        const findmystat = () => {
    const status = document.querySelector('#dropdown-button');
    const cityname = document.querySelector('#city');
    const success=(position)=>{
        console.log(position);
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?Latitude=${latitude}&Longitude=${longitude}`;
        fetch(geoApiUrl)
        .then(res => res.json())
        .then(data => {
            console.log(data)
            var city = data.city
            status.textContent = data.city
            cityname.textContent = data.city
            loadAutocompleteData(city);
        })
    }
    const error=(position)=>{
        alert('Please click on allow map');
        console.log(position);
        
    }
    navigator.geolocation.getCurrentPosition(success,error);

}
document.querySelector('#location-button').addEventListener('click',findmystat);
    });
    function loadAutocompleteData(cityId) {
        console.log(cityId);
    var availableTags = [];
    $.ajax({
      method: 'GET',
      url: "{{ url('service_list_ajax') }}",
      data: { cityId: cityId },
      success: function(response) {
        console.log(response);
        var uniqueTags = getUniqueTags(response);
      startAutocomplete(uniqueTags);
        // startAutocomplete(response);
      },
    });
  }

  // function startAutocomplete(availableTags) {
  //   $("#search_name").autocomplete({
  //     source: availableTags,
  //   });
  // }

  function getUniqueTags(tags) {
  var uniqueTags = [];
  var seen = {};

  tags.forEach(function(tag) {
    var lowercaseTags = tag.seo_tags ? tag.seo_tags.toLowerCase() : '';
    if (!seen[lowercaseTags]) {
      seen[lowercaseTags] = true;
      uniqueTags.push(tag);
    }
  });

  return uniqueTags;
}

  function startAutocomplete(availableTags) {
  $("#search_name").autocomplete({
    source: function(request, response) {
      var keyword = request.term.toLowerCase();
      var filteredTags = availableTags.filter(function(tag) {
        var lowercaseTags = tag.seo_tags ? tag.seo_tags.toLowerCase() : '';
        var lowercaseValue = tag.value ? tag.value.toLowerCase() : '';
        return (
          lowercaseTags.indexOf(keyword) !== -1 ||
          lowercaseValue.indexOf(keyword) !== -1 ||
          lowercaseTags.includes(keyword)
        );
      });
      response(filteredTags);
    },
    select: function(event, ui) {
      event.preventDefault();
      var selectedValue = ui.item.seo_tags ? ui.item.seo_tags : ui.item.value;
      $("#search_name").val(selectedValue);
    },
    focus: function(event, ui) {
      event.preventDefault();
      var focusedValue = ui.item.seo_tags ? ui.item.seo_tags : ui.item.value;
      $("#search_name").val(focusedValue);
    },
    response: function(event, ui) {
      if (ui.content.length === 0) {
        $("#search_name").val("");
      }
    },
    minLength: 1,
    messages: {
      noResults: '',
      results: function() {}
    },
    create: function() {
      $(this).data('ui-autocomplete')._renderItem = function(ul, item) {
        var displayValue = item.seo_tags ? item.seo_tags : item.value;
        return $('<li>')
          .append('<div>' + displayValue + '</div>')
          .appendTo(ul);
      };
    }
  });
}





    </script> -->

    
    <script>
  $(document).ready(function() {
    // Function to handle location selection
    const setLocation = (city) => {
      const status = document.querySelector('#dropdown-button');
      const cityname = document.querySelector('#city');

      // Update the UI with the selected city
      status.textContent = city;
      cityname.textContent = city;

      // Store the selected city in a cookie that expires in 1 day (adjust as needed)
      const expirationDate = new Date();
      expirationDate.setDate(expirationDate.getDate() + 1);
      document.cookie = `selectedCity=${city}; expires=${expirationDate.toUTCString()}; path=/`;

      // Load autocomplete data for the selected city
      loadAutocompleteData(city);
    };

    // Function to get user's location using geolocation
    const getUserLocation = () => {
      const success = (position) => {
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var geoApiUrl = `https://api.bigdatacloud.net/data/reverse-geocode-client?Latitude=${latitude}&Longitude=${longitude}`;
        fetch(geoApiUrl)
          .then(res => res.json())
          .then(data => {
            var city = data.city;
            setLocation(city); // Auto-select the user's location
          });
      };

      const error = (position) => {
        // Handle geolocation error if needed
      };

      navigator.geolocation.getCurrentPosition(success, error);
    };

    // Call the function to get the user's location and set it on page load
    getUserLocation();
  });

  // Function to retrieve a cookie value by its name
  function getCookie(name) {
    var value = '; ' + document.cookie;
    var parts = value.split('; ' + name + '=');
    if (parts.length === 2) return parts.pop().split(';').shift();
  }

 

  // The rest of your JavaScript code remains unchanged
  // ...
  function loadAutocompleteData(cityId) {
        console.log(cityId);
    var availableTags = [];
    $.ajax({
      method: 'GET',
      url: "{{ url('service_list_ajax') }}",
      data: { cityId: cityId },
      success: function(response) {
        console.log(response);
        var uniqueTags = getUniqueTags(response);
      startAutocomplete(uniqueTags);
        // startAutocomplete(response);
      },
    });
  }

  // function startAutocomplete(availableTags) {
  //   $("#search_name").autocomplete({
  //     source: availableTags,
  //   });
  // }

  function getUniqueTags(tags) {
  var uniqueTags = [];
  var seen = {};

  tags.forEach(function(tag) {
    var lowercaseTags = tag.seo_tags ? tag.seo_tags.toLowerCase() : '';
    if (!seen[lowercaseTags]) {
      seen[lowercaseTags] = true;
      uniqueTags.push(tag);
    }
  });

  return uniqueTags;
}

  function startAutocomplete(availableTags) {
  $("#search_name").autocomplete({
    source: function(request, response) {
      var keyword = request.term.toLowerCase();
      var filteredTags = availableTags.filter(function(tag) {
        var lowercaseTags = tag.seo_tags ? tag.seo_tags.toLowerCase() : '';
        var lowercaseValue = tag.value ? tag.value.toLowerCase() : '';
        return (
          lowercaseTags.indexOf(keyword) !== -1 ||
          lowercaseValue.indexOf(keyword) !== -1 ||
          lowercaseTags.includes(keyword)
        );
      });
      response(filteredTags);
    },
    
    select: function(event, ui) {
      event.preventDefault();
      var selectedValue = ui.item.seo_tags ? ui.item.seo_tags : ui.item.value;
      $("#search_name").val(selectedValue);
    },
    focus: function(event, ui) {
      event.preventDefault();
      var focusedValue = ui.item.seo_tags ? ui.item.seo_tags : ui.item.value;
      $("#search_name").val(focusedValue);
    },
    response: function(event, ui) {
      if (ui.content.length === 0) {
        $("#search_name").val("");
      }
    },
    minLength: 1,
    messages: {
      noResults: '',
      results: function() {}
    },
    create: function() {
      $(this).data('ui-autocomplete')._renderItem = function(ul, item) {
        // var displayValue = item.seo_tags ? item.seo_tags : item.value;
        var displayValues = item.seo_tags ? item.seo_tags.split(',') : [item.value];
        var listItem = $('<li>');
        displayValues.forEach(function(tag) {
          // $('<div>').text(tag.trim()).appendTo(listItem);
          var displayValue = $('<div>').text(tag.trim()).html(); // Escape HTML characters
          $('<div>').html(displayValue).appendTo(listItem); // Use html() to prevent highlighting

        });
        return listItem.appendTo(ul);
        // return $('<li>')
        //   .append('<div>' + displayValue + '</div>')
        //   .appendTo(ul);
      };
    }
  });
}
</script>

    
</body>

</html>