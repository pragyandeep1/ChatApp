<!DOCTYPE html>
<html lang="en">

<head>
    @section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.11.6/tiny-slider.css">

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
      .search_by_cities_box{
        cursor:none;
      }
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

    .search-bar {
        /*margin: auto;*/
        width: 71%;
    }
    .seo_tags_display{
      color: gray;
  font-size: 0.8em;
    }

    /* Autocomplete start  */
    #autocomplete-suggestions {
      position: absolute;
    z-index: 9755;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    max-height: 200px;
    overflow-y: auto;
    top: 234px;
    left: 291px;
}

.suggestion {
  padding: 8px;
  cursor: pointer;
}

.suggestion:hover {
  background-color: #f0f0f0;
}
.location_search{
  position: relative;
}
.suggestion.selected {
  background-color: #f0f0f0;
}
    /* Autocomplete end */
    </style>
</head>

<body>
    @include('customer.customer_navbar')
    <div class="cover_image_section bg-blue">
        <div class="container pt-5">
            <div class="header_container">
                <div class="header_container_content text-center">
                    <div class="home_greeting d-flex">
                        <p>Search’’</p>
                        <span class="flash">
                            <span class="authText authFirst">Discover, Connect, Succeed - All in One Place</span>
                            <!-- <span class="authText authSecond">Your Gateway to Product Agencies and Contacts</span>
                            <span class="authText authThird">Access Contact Details Effortlessly!</span> -->
                        </span>
                    </div>
                </div>
                <div style="padding: 0px 10%; margin-top: 30px;">
                    <form action="{{ url('/search') }}" method="get" id="search_res">
                        @csrf
                        <div class="form_div row">
                        <input type="hidden" name="city" value="" id="city">
                            <div class="location_search col-lg-12 col-md-12 pl-0 d-flex">
                                <button type="submit" id="dropdown-button" class="btn btn-default border eee rounded-left px-4" data-toggle="dropdown">
                                    <img src="{{ asset('customer-images/Location.svg') }}">
                                    Select Location
                                    <img src="{{ asset('customer-images/Arrow-Down.svg') }}">
                                  </button>
                                  <div class="dropdown-menu">
                                    @foreach ($cities as $city)
                                        <a class="dropdown-item city-dropdown-item" href="#" data-city="{{ $city->city }}">{{ $city->city }}</a>
                                    @endforeach
                                  </div>
                                <div class="input-group search-bar" style="left: -10px;">
                                    <input type="text" class="form-control border-left-0 rounded-right" name="search_name" id="search_name"
                                        placeholder="Search desired service or product name">
                                      
                                    <div class="input-group-append">
                                        <button type="submit" id="search_btn" class="position-relative border-0" style="left: -40px">
                                            <img src="{{ asset('customer-images/Search.svg') }}">
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="autocomplete-suggestions"></div>
                            <input type="hidden" id="input_type" name="input_type" value="">
                        </div>
                    </form>
                </div>

<!-- *CATEGORY SECTION START* -->
                <div class="subcontainer">
                    <div class="slider-container">
    <ul class="controls" id="customize-controls" aria-label="Carousel Navigation" tabindex="0">
        <li class="prev" data-controls="prev" aria-controls="customize" tabindex="-1">
            <img src="{{ asset('customer-images/Arrow-Left.svg') }}" alt="Previous">
        </li>
        <li class="next" data-controls="next" aria-controls="customize" tabindex="-1">
            <img src="{{ asset('customer-images/Arrow-Right.svg') }}" alt="Next">          
        </li>
    </ul>
    <div class="my-slider">
        <div class="slider-item">
            <div class="card">                
                <img src="{{ asset('customer-images/Hotel.svg') }}" alt="Hotel">
            </div>
        </div>
        
        <div class="slider-item">
            <div class="card">                
                <img src="{{ asset('customer-images/Restaurant.svg') }}" alt="Restaurant">                       
            </div>
        </div>
        
        <div class="slider-item">
            <div class="card">                
                <img src="{{ asset('customer-images/Home-Decor.svg') }}" alt="Home Decor">
            </div>
        </div>
        <div class="slider-item">
            <div class="card">                
                <img src="{{ asset('customer-images/Automobile.svg') }}" alt="Automobile">
            </div>
        </div>
    </div>    
</div>


                </div>
            </div>
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
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/barbequnation_logo.svg') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'Birthday Spot')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/bday_spot.png') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'Mukteswar Celebration - Best Wedding Planner in Bhubaneswar')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/Wedding Planner in Bhubaneswar (11).jpeg') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'Dofort Entertainment')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/download.jpg') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'SHADOW WEDLEE')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/2020-11-08.jpg') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'Angan Horizon')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/download (1).jpg') }}">
                                        </a>
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
                                    <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/business_logo.png') }}">
                                    </a>
                                        @endif
                                        @if($data->company_name == 'BHUJABAL CATERING')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/BHUJABAL-CATERING.jpg') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'Tandoor Hot - Wedding, Corporate, Birthday Caterering in Bhubaneswar')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/2019-03-15.jpg') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'Jhilimili Foods & Catering - Best Wedding Catering Service In Bhubaneswar')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/download (2).jpg') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'KITCHEN KING CATERER')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/images.jpg') }}">
                                        </a>
                                        @endif
                                        @if($data->company_name == 'Amicable Equipments Pvt. Ltd.')
                                        <a href="{{ url('/service-detail/'.$data->id) }}">
                                        <img src="{{ asset('images/trending_services/2021-01-13.jpg') }}">
                                        </a>
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
        </div>
        <!-- mobile end -->
    </div>
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



    $(".city-dropdown-item").on("click", function (event) {
        event.preventDefault();
        var selectedCity = $(this).data("city");
        setLocation(selectedCity); // Update the UI with the selected city
        loadAutocompleteData(selectedCity); // Load autocomplete data for the selected city
    });
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
  $("#search_name").on('input', function() {
    $("#input_type").val("company_name");
    var keyword = $(this).val().toLowerCase();
    var filteredTags = availableTags.filter(function(tag) {
      var lowercaseTags = tag.seo_tags ? tag.seo_tags.toLowerCase() : '';
      var lowercaseValue = tag.value ? tag.value.toLowerCase() : '';
      return (
        lowercaseTags.indexOf(keyword) !== -1 ||
        lowercaseValue.indexOf(keyword) !== -1 ||
        lowercaseTags.includes(keyword)
      );
    });
    renderSuggestions(filteredTags);
  });

  function renderSuggestions(tags) {
    var suggestions = '';
    tags.forEach(function(item, index) {
      var displayValues = item.seo_tags ? item.seo_tags.split(',') : [item.value];
      displayValues.forEach(function(tag) {
        var displayValue = tag.trim();
        suggestions += `<div class="suggestion" data-index="${index}" data-company-name="${item.value}" data-seo-tags="${item.seo_tags}">${displayValue}</div>`;
      });
    });
    $("#autocomplete-suggestions").html(suggestions);
  }

  var selectedSuggestionIndex = -1;

  $("#autocomplete-suggestions").on('click', '.suggestion', function() {
    var selectedValue = $(this).text();
    $("#input_type").val("seo_tags");
    $("#search_name").val(selectedValue);
    $("#autocomplete-suggestions").empty();
  });

  $("#search_name").on('keydown', function(event) {
    var suggestions = $(".suggestion");
    if (event.keyCode === 40) {
      // Arrow down key
      event.preventDefault();
      selectedSuggestionIndex = Math.min(selectedSuggestionIndex + 1, suggestions.length - 1);
    } else if (event.keyCode === 38) {
      // Arrow up key
      event.preventDefault();
      selectedSuggestionIndex = Math.max(selectedSuggestionIndex - 1, -1);
    } else if (event.keyCode === 13 && selectedSuggestionIndex !== -1) {
      // Enter key
      event.preventDefault();
      var selectedValue = suggestions.eq(selectedSuggestionIndex).text();
      $("#search_name").val(selectedValue);
      $("#autocomplete-suggestions").empty();
      selectedSuggestionIndex = -1;
      return;
    } else {
      selectedSuggestionIndex = -1;
      return;
    }

    suggestions.removeClass('selected');
    if (selectedSuggestionIndex !== -1) {
      suggestions.eq(selectedSuggestionIndex).addClass('selected');
    }
  });

  $(document).on('click', function(event) {
    if (!$(event.target).closest('#autocomplete-suggestions').length) {
      $("#autocomplete-suggestions").empty();
    }
  });
}

</script>

  <!-- USE THIS CODE BEFORE BODY TAG CLOSE -->
<!-- <script type="text/javascript">
    $('.js-scroll-trigger').click(function(){
        $('.navbar-collapse').collapse('hide');
    });
</script> -->

<!-- <script>
    var i = 0;
        var styles = [".authFirst", ".authSecond", ".authThird"];

        function toggleText() {
            $(styles[i]).fadeOut(500, function() {
                i = (i + 1) % styles.length;
                $(styles[i]).fadeIn(500);
            });
        }

        // Initial display
        $(styles[i]).fadeIn(500);

        // Cycle through text every 2 seconds (2000 milliseconds)
        setInterval(toggleText, 2000);
</script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.11.6/min/tiny-slider.js"></script>

<script>
const slider = tns({
    container: '.my-slider',
    loop: true,
    items: 1,
    slideBy: 'page',
    nav: false,    
    autoplay: true,
    speed: 400,
    autoplayButtonOutput: false,
    mouseDrag: true,
    lazyload: true,
    controlsContainer: "#customize-controls",
    responsive: {
        640: {
            items: 2,
        },
        768: {
            items: 3,
        }
    }
});

</script>

    
</body>

</html>