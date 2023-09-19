<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

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



    <link rel="stylesheet" href="{{ asset('css/service_category_style.css') }}">
    <style>
    .right_side_box {
    background-color: #f5f5f5;
    padding: 10px;
}

.advance_deal {
    font-weight: bold;
    font-size: 15px;
}

.related_search {
    list-style-type: none;
    padding-left: 0;
    margin-top: 10px;
}

.related_search li {
    margin-top: 5px;
}

.related_search a {
    color: #777777;
    text-decoration: none;
}

.related_search li:not(:first-child) a {
    padding-left: 10px;
}
.first-child-highlight a {
    font-weight: bold;
}

.first-child-highlight a::before {
    content: '\25B6'; /* Unicode arrow symbol */
    position: absolute;
    right: 304px;
}
.loader {
  border: 4px solid #f3f3f3;
  border-top: 4px solid #3498db;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  animation: spin 2s linear infinite;
  margin: auto;
  display: none; /* Initially hide the loader */
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

    </style>
</head>

<body>
    @include('customer.customer_navbar')
    <div class="ads_space">
        <img width="auto" height="113"
            src="https://images.jdmagicbox.com/bhubaneshwar/q7/0674px674.x674.220521000430.p9q7/cbnr/744e52af32560d40a89d556b736eacb4.jpg"
            alt="" class="">
    </div>
    <div class="container-custom">
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_items">
                <li class="breadcrumb_items_title"><a href="#">{{ $parent_category->name?? '' }}</a></li>
                <li class="breadcrumb_items_title"><a href="#">{{ $category->name?? '' }}</a></li>
                    
                </ul>
            </div>
        </div>

        <div class="category_heading container">
            <h1>{{ $category->name?? '' }} {{ $parent_category->name?? '' }} List</h1>
        </div>

        <div class="container product_and_service_filter_section">
            <div class="product_and_service_filters">
                <div class="product_and_service_filter_box">
                    <div class="filter_box_dropdown">
                        <button class="btn dropdown-toggle grey_button" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort by
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                            <a class="dropdown-item" href="#" data-sort="asc">Ascending</a>
                            <a class="dropdown-item" href="#" data-sort="desc">Descending</a>
                            <a class="dropdown-item" href="#" data-sort="rating">Rating</a>

                        </div>
                    </div>

                    <div class="filter_box_button">
                        <div class="grey_filter_box">
                            <a href="#">
                                <span class="filter_icon"><img src="{{ asset('customer-images/filter_toprated_3x.webp') }}"></span>
                                <span class="filter_title">Top Rated</span>
                            </a>
                        </div>
                    </div>
                    <div class="filter_box_button">
                        <div class="grey_filter_box">
                            <a href="#">
                                <span class="filter_icon"><img src="{{ asset('customer-images/filter_jdverified_3x.png') }}"></span>
                                <span class="filter_title">Verified</span>
                            </a>
                        </div>
                    </div>
                    <div class="filter_box_button">
                        <div class="grey_filter_box">
                            <a href="#">
                                <span class="filter_icon"><img src="{{ asset('customer-images/heart-component.svg') }}"></span>
                                <!-- <span class="filter_icon"><img src="{{ asset('customer-images/filter_jdtrust_3x.webp') }}"></span> -->
                                <span class="filter_title">Most Liked</span>
                            </a>
                        </div>
                    </div>
                    <div class="filter_box_button">
                        <div class="grey_filter_box">
                            <a href="#">
                                <span class="filter_icon"><img src="{{ asset('customer-images/filter_responsive_3x.webp') }}"></span>
                                <span class="filter_title">Quick Response</span>
                            </a>
                        </div>
                    </div>
                  
                   
                    <div class="filter_box_dropdown">
                        <button class="btn dropdown-toggle grey_button" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ratings
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Any</a>
                            <a class="dropdown-item" href="#">3.5</a>
                            <a class="dropdown-item" href="#">4.0</a>
                            <a class="dropdown-item" href="#">4.5</a>
                            <a class="dropdown-item" href="#">5.0</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="result_section_area row">
                <div class="left_side col-lg-9">
                
                @if (!empty($seller_infos))
                @foreach($seller_infos as $seller_info)
                    <div class="left_side_box mt-4 row ml-0">
                        <div class="result_box_image col-lg-3">
                        <img src="{{ asset('uploads/userdata/no-image-new.jpg') }}">
                        <!-- <img src="{{ asset('uploads/userdata/no_image_found-01.jpg') }}"> -->
                        </div>
                        <div class="result_box_content col-lg-9">
                            <div class="result_box_content_title_section">
                                <div class="result_box_content_title">
                                    <div class="result_box_content_title_span row">
                                        <div class="col-10">
                                            <h1>
                                                <span class="icon_thumb">
                                                    <img src="{{ asset('customer-images/new_thumb_icon.svg') }}">
                                                </span>
                                                <a href="{{ url('/service-detail/'.$seller_info->id)}}">{{ $seller_info->company_name }}</a>  
                                            </h1>
                                        </div>
                                        <div class="icon_whislist col-2">
                                            <img class="float-right" src="{{ asset('customer-images/heart-component.svg') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="result_box_rating">
                                    <div class="result_box_rating_number">
                                        <p> {{ $seller_info->google_rating?? 'N/A' }} </p>
                                    </div>
                                    <div class="star_rating">
                                        <img src="{{ asset('customer-images/star rating.png') }}"></div>
                                    <div class="person_rated">
                                        <p> {{ $seller_info->google_rating?? 'N/A' }} Rating</p>
                                    </div>
                                    <!-- <div class="result_box_rating_number"><p>4.7</p><span class="star_rating"><img src="images/star rating.png"></span><span class="person_rated"><p>7 Rating</p></span></div> -->
                                </div>
                                <div class="result_box_address_section">
                                    <div class="result_box_address">
                                        <p>{{ $seller_info->full_address }}</p>
                                    </div>
                                </div>
                                <div class="result_box_activity_section">
                                    <div class="result_box_activity_until">
                                        <span class="open">Open</span>
                                        <span class="open_until">Until 9 pm</span>
                                    </div>
                                    <div class="result_dot"></div>
                                    <div class="when_in_business">
                                        <span> 1 Year in Business</span>
                                    </div>
                                </div>
                                <div class="category_button_section">
                                    <div class="category_button_part">{{ $category->name }}</div>
                                </div>
                                <div class="result_box_comment_section">
                                    <div class="review_icon"><img src="{{ asset('customer-images/reviewcomment_icon.svg') }}"></div>
                                    <div class="comment_text">
                                        <p><q>We have booked the Mandap (both floors) for thread ceremony. Excellent
                                                experience. Two no AC
                                                guest rooms are also spacious. Ample of car parking available. AC was
                                                comfort Ample of car
                                                parking available. AC was comfort Ample of car parking available. AC was
                                                comfort Ample of car
                                                parking available.</q></p>
                                    </div>
                                </div>
                                <div class="query_button_section">
                                    <div class="query_button_section_button">
                                        <div class="contact_button">
                                            <!-- <button type="button" class="btn btn-success"><i class="fa fa-phone"></i> -->
                                            {{-- {{ $seller_info->phone ?? 'XXXXXXXXXX' }} --}}
                                        <!-- </button> -->
                                        <a class="btn btn-success font_600" href="#" role="button" data-toggle="modal" data-target="#callbackModal"><i
                                                    class="fa fa-phone"></i> 
                                                    Call me back
                                                    {{-- {{ $seller_info->phone?? 'XXXXXXXXXX' }} --}}
                                            </a>
                                            <!-- callback modal start -->
                                            <!-- The Modal -->
                                            <div class="modal fade" id="callbackModal">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content bg-white">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Callback Form</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form action="{{ url('/save_callback_enuiry/'.$seller_info->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="form-row my-3">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control"
                                                                            id="name" placeholder="Enter Name*"
                                                                            name="name"
                                                                            value="{{ Auth::user()->name ?? '' }}">
                                                                    </div>
                                                                    <div class="col">
                                                                        <input type="tel" class="form-control"
                                                                            id="mobile"
                                                                            placeholder="Enter Mobile Number*"
                                                                            name="mobile"
                                                                            value="{{ Auth::user()->mobile ?? '' }}">
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer justify-content-start">
                                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                                            <h6>* marks are mandatory fields</h6>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal end -->
                                        </div>
                                        <div class="query_button">
                                            <button type="button" class="btn btn-outline-primary"> Get Best
                                                Deal</button>
                                        </div>
                                    </div>
                                    <div class="result_response">
                                        <div class="time_response">Responds in 3 Hours</div>
                                        <div class="enquire_response"><span><i class="fa fa-line-chart"></i></span> 67
                                            people recently
                                            enquired</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Load More button -->
                    @if ($loop->last)
                    <div id="load-more-container" style="text-align: center;margin-top: 22px;margin-bottom: 22px;">
                        <button id="load-more-button" type="button" class="btn btn-primary" data-url="{{ route('servicecategory.loadmore', ['id' => $category->id]) }}">Load More</button>
                    </div>

                        <!-- <button id="load-more-button" type="button" class="btn btn-primary" data-url="{{ route('servicecategory.loadmore', ['id' => $category->id]) }}">Load More</button> -->
                    @endif
                    @endforeach
                    @else
                        <div class="nodata_found">
                            <img src="{{ asset('customer-images/no-result-01.jpg') }}" alt="No Data" class="img-fluid">
                            <!-- <p>No data found</p> -->
                        </div>
                    @endif
                     {{-- {!! $seller_infos->render() !!} --}}
                </div>
                <div class="right_side col-lg-3">
                    <!-- <div class="right_side_box mt-4">
                        <p class="advance_deal font_14">Get the List of Top</p>
                        <p class="advance_deal font_18 color_0076d7">Banquet Halls</p>
                        <p class="advance_deal font_12">We'll send you contact details in seconds for free</p>
                        <form action="/action_page.php">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Name" id="usr" name="username">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                </div>
                                <input type="tel" class="form-control" placeholder="Mobile Number" id="tel" name="tel">
                            </div>
                            <button type="submit" class="btn btn-primary width_100_bold">Get Best Deal</button>
                        </form>
                    </div> -->
                    @if (!empty($seller_infos))
                    <div class="right_side_box mt-4">
                        <p class="advance_deal font_bold font_15">Category</p>
                        <ul class="related_search">
                            <li class="mt-1 first-child-highlight"><a href="#" class="color777 ">{{$parent_category->name}}</a></li>
                            @foreach($subcategories as $sub_cat_name)
                            <li class="mt-1"><a href="#" class="color777">{{ $sub_cat_name->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!-- <div class="right_side_box mt-4">
                        <p class="advance_deal font_bold font_15">Most searched localities in Bhubaneshwar</p>
                        <ul class="related_search">
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                            <li class="mt-1"><a href="#" class="color777">Banquet Halls in Bhubaneshwar</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    @include('customer.customer_footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var page = 2; // Start with page 2 (assuming you've already loaded page 1)
    
    $('#load-more-button').click(function() {
        $('#loader').show();
        var url = $(this).data('url');
        // alert(url);
        $.ajax({
            url: url,
            type: 'GET',
            data: { page: page },
            success: function(response) {
                console.log(response);
                var sellerInfos = response.seller_infos.data;
                var category = response.category;
                console.log(sellerInfos);
                sellerInfos.forEach(function(sellerInfo) {
                    var ratingHTML = '';
                    var googleRating = parseFloat(sellerInfo.google_rating);

                    for (var i = 0; i < 5; i++) {
                    if (Math.floor(googleRating) - i >= 1) {
                        // Full Star
                        ratingHTML += '<i class="fa fa-star text-warning"></i>';
                    } else if (googleRating - i > 0) {
                        // Half Star
                        ratingHTML += '<i class="fa fa-star-half-full text-warning"></i>';
                    } else {
                        // Empty Star
                        ratingHTML += '<i class="far fa-star text-warning"></i>';
                    }
                    }

    // Append the new data to your existing content dynamically
    var html = `
    <div id="loader" class="loader"></div>
  <div class="left_side_box mt-4 row ml-0">
    <div class="result_box_image col-lg-3">
      <img src="{{ asset('uploads/userdata/no-image-new.jpg') }}">
    </div>
    <div class="result_box_content col-lg-9">
      <div class="result_box_content_title_section">
        <div class="result_box_content_title">
          <div class="result_box_content_title_span row">
            <div class="col-11">
              <h1>
                <span class="icon_thumb">
                  <img src="{{ asset('customer-images/new_thumb_icon.svg') }}">
                </span>
                <a href="{{ url('/service-detail') }}/${sellerInfo.id}">${sellerInfo.company_name}</a>
              </h1>
            </div>
            <div class="icon_whislist col-1">
              <img class="float-right" src="{{ asset('customer-images/heart-component.svg') }}">
            </div>
          </div>
        </div>
        <div class="result_box_rating">
          <div class="result_box_rating_number">
            <p>${sellerInfo.google_rating ? sellerInfo.google_rating : 'N/A'}</p>
          </div>
          <div class="star_rating">
          ${sellerInfo.google_rating ? ratingHTML : 'N/A'}
          </div>
          <div class="person_rated">
            <p>${sellerInfo.google_rating ? sellerInfo.google_rating : 'N/A'} Rating</p>
          </div>
        </div>
        <div class="result_box_address_section">
          <div class="result_box_address">
            <p>${sellerInfo.full_address}</p>
          </div>
        </div>
        <div class="result_box_activity_section">
          <div class="result_box_activity_until">
            <span class="open">Open</span>
            <span class="open_until">Until 9 pm</span>
          </div>
          <div class="result_dot"></div>
          <div class="when_in_business">
            <span>1 Year in Business</span>
          </div>
        </div>
        <div class="category_button_section">
          <div class="category_button_part">${category.name}</div>
        </div>
        <div class="result_box_comment_section">
          <div class="review_icon">
            <img src="{{ asset('customer-images/reviewcomment_icon.svg') }}">
          </div>
          <div class="comment_text">
            <p><q>We have booked the Mandap (both floors) for thread ceremony. Excellent experience. Two no AC guest rooms are also spacious. Ample of car parking available. AC was comfort Ample of car parking available. AC was comfort Ample of car parking available. AC was comfort Ample of car parking available.</q></p>
          </div>
        </div>
        <div class="query_button_section">
          <div class="query_button_section_button">
            <div class="contact_button">
            <a class="btn btn-success font_600" href="#" role="button" data-toggle="modal" data-target="#callbackModal"><i
                                                    class="fa fa-phone"></i> 
                                                    Call me back
                                                    {{-- {{ $seller_info->phone?? 'XXXXXXXXXX' }} --}}
                                            </a>
              
            </div>
            <div class="query_button">
              <button type="button" class="btn btn-outline-primary">Get Best Deal</button>
            </div>
          </div>
          <div class="result_response">
            <div class="time_response">Responds in 3 Hours</div>
            <div class="enquire_response">
              <span><i class="fa fa-line-chart"></i></span> 67 people recently inquired
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="callbackModal">
   <div class="modal-dialog modal-dialog-centered modal-lg">
     <div class="modal-content bg-white">
       <div class="modal-header">
         <h4 class="modal-title">Callback Form</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>
       <div class="modal-body">
         <form action="{{ url('/save_callback_enuiry') }}/${sellerInfo.id}" method="post"> @csrf <div class="form-row my-3">
             <div class="col">
               <input type="text" class="form-control" id="name" placeholder="Enter Name*" name="name" value="{{ Auth::user()->name ?? '' }}">
             </div>
             <div class="col">
               <input type="tel" class="form-control" id="mobile" placeholder="Enter Mobile Number*" name="mobile" value="{{ Auth::user()->mobile ?? '' }}">
             </div>
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
         </form>
       </div>
       <div class="modal-footer justify-content-start">
         <h6>* marks are mandatory fields</h6>
       </div>
     </div>
   </div>
 </div>
  `;

    
    $('.left_side.col-lg-9').append(html);
});

page++;
$('#loader').hide();
if (page < response.seller_infos.last_page) {
    // Show the "Load More" button
    var loadMoreButton = $('#load-more-container').detach(); // Detach the button from its current position
    $('.left_side.col-lg-9').append(loadMoreButton); // Append the button after the dynamically added content
} else {
    // Hide the "Load More" button
    $('#load-more-button').hide();
}        
                 // Increment the page number for the next request
            }
        });
    });
});
</script>


</body>

</html>