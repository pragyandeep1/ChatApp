<!DOCTYPE html>
<html lang="en">

<head>
    @section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.js"></script>
 
    <!-- slider cdn -->
    <!-- Add the Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Add the Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- end slider cdn -->
  
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

<body id="top-body">
    @include('customer.customer_navbar')
    <div class="cover_image_section bg-blue">
        <div class="container pt-5">
            <div class="header_container">
                <div class="header_container_content text-center">
                    <div class="home_greeting d-flex">
                        <p>Search’’</p>
                        <span class="typewriter-text">
                            <span></span>
                        </span>
                    </div>
                </div>
                <div style="padding: 0 10%; margin-top: 30px; position: relative;">
                    <form action="{{ url('/search') }}" method="get" id="search_res">
                        @csrf
                        <div class="form_div row">
                        <input type="hidden" name="city" value="#" id="city" >
                            <div class="location_search col-lg-12 col-md-12 pl-0 d-flex" style=" 
                            margin-left: 50px;">
                                <button type="submit" id="dropdown-button" class="btn btn-default border eee rounded-left px-4" data-toggle="dropdown" style="border-top-left-radius: 10px !important; border-bottom-left-radius: 10px !important;">
                                    <img src="{{ asset('customer-images/Location.svg') }}">
                                    Select Location
                                    <img src="{{ asset('customer-images/Arrow-Down.svg') }}">
                                  </button>
                                  <div class="dropdown-menu">
                                    @foreach ($cities as $city)
                                        <a class="dropdown-item city-dropdown-item" href="#" data-city="{{ $city->city }}">{{ $city->city }}</a>
                                    @endforeach
                                  </div>
                                <div class="input-group search-bar" style="left: -10px; border-radius: 0 0 20px">
                                    <input type="text" class="form-control border-left-0" name="search_name" id="search_name" placeholder="Search desired service or product name" required>
                                    <div class="input-group-append">
                                        <button type="submit" id="search_btn" class="position-relative border-0" style="padding-right: 30px; background-color: #fff; border-top-right-radius: 10px; border-bottom-right-radius: 10px; width: 20px">
                                            <img src="{{ asset('customer-images/Search.svg') }}" style="position: absolute; 
                                                top: 50%; 
                                                transform: translateY(-50%);
                                                z-index: 2; " >
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="autocomplete-suggestions"></div>
                            <input type="hidden" id="input_type" name="input_type" value="#">
                        </div>
                    </form>
                </div>

<!-- *CATEGORY SECTION START* -->
    <div class="subcontainer">
        <div class="slider-wrapper mt-5" id="slider-wrapper">
            <div class="controller">
                <div id="controls">
                    <button class="previous" style="height: 96px; width: 42px">
                        <img src="{{ asset('customer-images/Arrow-Left.svg') }}" alt="Previous">
                    </button>
                    <button class="next" style="height: 96px; width: 42px">
                        <img src="{{ asset('customer-images/Arrow-Right.svg') }}" alt="Next">
                    </button>
                </div>
            </div>
            <!-- <br> -->
            <div class="my-slider">
                <div>
                    <div class="slide">
                        <div class="slide-img img-1">
                            <div class="svg-container" id="img-1">
                                <!-- Original SVG icon -->
                                <img src="{{ asset('customer-images/hotel.svg') }}" class="svg original" alt="sample icon">
                                <!-- Hover SVG icon with different colors -->
                                <img src="{{ asset('customer-images/hotel-hover.png') }}" class="svg hover" alt="sample icon">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-2">
                            <img src="{{ asset('customer-images/restaurant.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/restaurant-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-3">
                            <img src="{{ asset('customer-images/home-decor.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/home-decor-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-4">
                            <img src="{{ asset('customer-images/automobile.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/automobile-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="slide">
                        <div class="slide-img img-1">
                            <img src="{{ asset('customer-images/rent_Sell.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/rent_Sell-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-2">
                            <img src="{{ asset('customer-images/education.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/education-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-4">
                            <img src="{{ asset('customer-images/hospital.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/hospital-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="slide">
                        <div class="slide-img img-1">
                            <img src="{{ asset('customer-images/hostel.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/hostel-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-2">
                            <img src="{{ asset('customer-images/pet_house.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/pet_house-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-3">
                            <img src="{{ asset('customer-images/dentist.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/dentist-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-4">
                            <img src="{{ asset('customer-images/estate-agent.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/estate-agent-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-2">
                            <img src="{{ asset('customer-images/gym.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/gym-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-3">
                            <img src="{{ asset('customer-images/driving-school.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/driving-school-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-4">
                            <img src="{{ asset('customer-images/event-organizes.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/event-organizes-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-1">
                            <img src="{{ asset('customer-images/courier-service.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/courier-service-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-2">
                            <img src="{{ asset('customer-images/pet_house.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/pet_house-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-3">
                            <img src="{{ asset('customer-images/travel.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/travel-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-4">
                            <img src="{{ asset('customer-images/other.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/other-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="slide">
                        <div class="slide-img img-1">
                            <img src="{{ asset('customer-images/retail.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/retail-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-2">
                            <img src="{{ asset('customer-images/finance-services.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/finance-services-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-3">
                            <img src="{{ asset('customer-images/photographer.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/photographer-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-4">
                            <img src="{{ asset('customer-images/spirituality.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/spirituality-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                <div>
                    <div class="slide">
                        <div class="slide-img img-4">
                            <img src="{{ asset('customer-images/electronic-repair.svg') }}" class="svg original" alt="sample icon">
                            <img src="{{ asset('customer-images/electronic-repair-hover.png') }}" class="svg hover" alt="sample icon">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div style="position: relative; top: -4rem;"> -->
        <div>
            <img src="{{ asset('customer-images/hero-baner.svg') }}" style="width: 100%;" alt="hero-baner">
        </div>
    </div>

 <!-- *CATEGORY SECTION END* -->   
</div>
                </div>
            <hr style="height: 4px; background-color:#D4D4D4">
            </div>

        </div>

    </div>

    <div class="service_category_section bg_white">
        <div class="container-fluid">
            <div class="our_cat_section_heading">
                <div class="center_title">
                    
                    <div style="border: 1px solid #B6B6BB;;">
                        <p class="text-capitalize">top categories to choose from</p>
                    </div>  
                    <!-- <h2 class="heading_styling">Service <span class="highlight_title">Cat</span>egory</h2> -->
                    <span class="line1"></span>
                    <span class="line2"></span>
                    <span class="line3"></span>
                    <span class="line4"></span>
                    <span class="line5"></span>
                    <span class="line6"></span>
                </div>
            </div>
        </div>

    </div>

   <div class="Trending_services bg_white">
        <div class="product_category_section">
            <div class="container-fluid">
                <div class="our_cat_section_heading">
                    <div class="center_title">
                        <h2>Business &amp; Services</h2>
                    </div>
                    <span class="line7"></span>
                    <span class="line8"></span>
                </div>
                <div class="custom-div">
                    <div>
                        <img src="{{ asset('customer-images/rectangular.svg') }}" style="z-index: 2;">
                        <h2 class="text-light" style="position: absolute; right: 100px; margin-top: 2rem; z-index: 2;">"Develop a winning business strategy for future success."</h2>
                    </div>
                  <img src="{{ asset('customer-images/office-meeting.png') }}" style="left: 0; z-index: 1;">
                  <img src="{{ asset('customer-images/vector6.svg') }}" style="left: 0; z-index: 1;">
                </div>
<!-- slider img -->
              <div style="position: relative; left: 100px; margin-top: 7rem; z-index: 3; max-width:800px; height:220px">
                <div class="swiper-container">
                    <div class="swiper-wrapper pl-5">  
                           <div class="swiper-slide">
                             <div class="image-content">
                                <div class="card-image">
                                    <img src="{{ asset('customer-images/rectangle1.png') }}"  width="240px" style="height:100%;"><br>
                                    <h6 class="name">B2B Business Service</h6>
                                </div>
                             </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                    <img src="{{ asset('customer-images/rectangle2.png') }}" width="240px" style="height:100%;"><br>
                                    <h6 class="name">Lawyer</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                               <div class="image-content">
                                  <div class="card-image">
                                    <img src="{{ asset('customer-images/rectangle3.png') }}" width="240px" style="height:100%;">
                                    <h6 class="name">Charted Accountant</h6>
                                  </div>
                               </div>
                            </div>
                            <div class="swiper-slide">
                              <div class="image-content">
                                 <div class="card-image">
                                   <img src="{{ asset('customer-images/rectangle1.png') }}" width="240px" style="height:100%;">
                                   <h6 class="name">AC Services</h6>
                                 </div>
                              </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('customer-images/rectangle2.png') }}"  width="240px" style="height:100%;">
                                        <h6 class="name">Packer and Movers</h6>
                                    </div>
                                </div>
                             </div>
                             <div class="swiper-slide">
                              <div class="image-content">
                                <div class="card-image">
                                <img src="{{ asset('customer-images/rectangle3.png') }}" width="240px" style="height:100%;">
                                <h6 class="name">Electronic Services</h6>
                                </div>
                              </div>
                             </div>

                     </div>
                    <div class="swiper-button-next">
                        <!-- <img src="{{ asset('customer-images/Arrow-Left.svg') }}" class="swiper-navBtn" width="50" height="50"> -->
                    </div>
                    <div class="swiper-button-prev">
                        <!-- <img src="{{ asset('customer-images/Arrow-Right.svg') }}" class="swiper-navBtn" width="50" height="50"> -->
                    </div>
                 </div>
               </div>
               <!-- end slider img -->
              
            </div>
        </div>
          <div class="container-fluid row mx-auto" id="sales_background">
        </div>
    </div>

   
    <!-- <img src="{{ asset('customer-images/rectangle90.svg') }}"> -->

    <div>
        <p id="txt-msg">"Connecting with us unlocks valuable <span class="prod">Product & Service<span> insights."</p>
    </div>

    @include('customer.customer_footer')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
     <script>
        var swiper = new Swiper(".swiper-container", {
        slidesPerView: 3, // Show 3 cards in a slide
        spaceBetween: 12, // Set the gap between cards
        loop: true,
        centeredSlides: true,
        fadeEffect: {
            crossFade: true,
        },
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
            slidesPerView: 1,
            },
            520: {
            slidesPerView: 2,
            },
            950: {
            slidesPerView: 3,
            },
        },
        });
    </script> 
  
   
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

<script>
        const phrases = [
            "Discover, Connect, Succeed - All in One Place",
            "Your Gateway to Product Agencies and Contacts",
            "Access Contact Details Effortlessly!"
        ];

        const textElement = document.querySelector('.typewriter-text span');
        let phraseIndex = 0;
        let letterIndex = 0;
        let isDeleting = false;

        // Initialize the text to an empty string
        textElement.textContent = '';

        function typeWriter() {
            const currentPhrase = phrases[phraseIndex];
            const visibleText = currentPhrase.slice(0, letterIndex);

            textElement.textContent = visibleText;

            if (!isDeleting) {
                letterIndex++;

                if (letterIndex <= currentPhrase.length) {
                    setTimeout(typeWriter, 100); // Typing speed
                } else {
                    isDeleting = true;
                    setTimeout(typeWriter, 1000); // Delay before starting to delete
                }
            } else {
                letterIndex--;

                if (letterIndex >= 0) {
                    setTimeout(typeWriter, 50); // Deletion speed
                } else {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length; // Loop through phrases
                    setTimeout(typeWriter, 500); // Delay before typing the next phrase
                }
            }
        }

        typeWriter();
    </script>

    <script>
        let slider = tns({
            container: ".my-slider",
            "slideBy": 1,
            "speed": 400,
            "nav": false,
            controlsContainer: "#controls",
            prevButton: ".previous",
            nextButton: ".next",
            responsive:{
                1600:{
                    items:12
                },
                1024:{
                    items:10
                },
                768:{
                    items:6
                },
                480:{
                    items:3
                }
            }
        });
    </script>
</body>

</html>