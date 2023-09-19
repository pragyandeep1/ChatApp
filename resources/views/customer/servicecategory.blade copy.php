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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->

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
    right: 179px;
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
    <div class="breadcrumb_section">
        <div class="container-fluid">
            <ul class="breadcrumb_items">
                <li class="breadcrumb_items_title"><a href="#">{{ $parent_category->name }}</a></li>
                <li class="breadcrumb_items_title"><a href="#">{{ $category->name }}</a></li>
                <!-- <li class="breadcrumb_items_title"><a href="#">Bhubaneshwar</a></li>
                <li class="breadcrumb_items_title"><a href="#">Banquet Halls in Bhubaneshwar</a></li>
                <li class="breadcrumb_items_title"><a href="#">Banquet Halls in Ratha Road-Old Bhubaneshwar</a></li>
                <li class="breadcrumb_items_title"><a href="#">48+ Listings</a></li> -->
            </ul>
        </div>
    </div>

    <div class="category_heading container-fluid">
        <h1>{{ $category->name }} Hospitals List</h1>
    </div>

    <div class="container-fluid product_and_service_filter_section">
        <div class="product_and_service_filters">
            <div class="product_and_service_filter_box">
                <div class="filter_box_dropdown">
                    <button class="btn dropdown-toggle grey_button" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Relevance</a>
                        <a class="dropdown-item" href="#">Rating</a>
                        <a class="dropdown-item" href="#">Popular</a>
                        <a class="dropdown-item" href="#">Friends rating</a>
                        <a class="dropdown-item" href="#">Distance</a>

                    </div>
                </div>
                <div class="filter_box_button">
                    <div class="grey_filter_box">
                        <div class="filter_icon"><img src="{{ asset('customer-images/filter_toprated_3x.webp') }}">
                        </div>
                        <div class="filter_title">Top Rated</div>
                    </div>
                </div>
                <div class="filter_box_button">
                    <div class="grey_filter_box">
                        <div class="filter_icon"><img src="{{ asset('customer-images/filter_jdverified_3x.png') }}">
                        </div>
                        <div class="filter_title">Top Rated</div>
                    </div>
                </div>
                <div class="filter_box_button">
                    <div class="grey_filter_box">
                        <div class="filter_icon"><img src="{{ asset('customer-images/filter_jdtrust_3x.webp') }}"></div>
                        <div class="filter_title">Top Rated</div>
                    </div>
                </div>
                <div class="filter_box_button">
                    <div class="grey_filter_box">
                        <div class="filter_icon"><img src="{{ asset('customer-images/filter_responsive_3x.webp') }}">
                        </div>
                        <div class="filter_title">Top Rated</div>
                    </div>
                </div>
                <div class="filter_box_dropdown">
                    <button class="btn dropdown-toggle grey_button" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Type
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Air Conditioned</a>
                        <a class="dropdown-item" href="#">Non-Air Conditioned</a>
                    </div>
                </div>
                <!-- <div class="filter_box_dropdown">
                    <button class="btn dropdown-toggle grey_button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Seating Capacity
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Upto 50 Persons</a>
                      <a class="dropdown-item" href="#">51 to 100 Persons</a>
                      <a class="dropdown-item" href="#">101 to 200 Persons</a>
                      <a class="dropdown-item" href="#">201 to 300 Persons</a>
                      <a class="dropdown-item" href="#">301 to 400 Persons</a>
                      <a class="dropdown-item" href="#">401 to 500 Persons</a>
                      <a class="dropdown-item" href="#">500 and above</a>

                    </div>
                </div> -->
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

    <div class="result_section">
        <div class="container-fluid">
            <div class="result_section_area">
                <div class="left_side_box_section">
                    @foreach($seller_infos as $seller_info)
                    <div class="left_side_box mt-3">
                        <div class="result_box_image">
                            <img src="{{ asset('uploads/userdata/No_Logo_Available.png') }}">
                        </div>
                        <div class="result_box_content">
                            <div class="result_box_content_title_section">
                                <div class="result_box_content_title">
                                    <div class="result_box_content_title_span">
                                        <h1 class="d-flex align-items-center">
                                            <span class="icon_thumb"><img
                                                    src="{{ asset('customer-images/new_thumb_icon.svg') }}"></span>
                                            <!-- <span class="flex-grow-1">
                                                    <span class="d-block">
                                                      {{ $seller_info->company_name }}
                                                    </span>
                                                    </span> -->
                                            <div class="flex-grow-1">
                                                <div class="d-flex align-items-center">
                                                    <div class="mr-5">
                                                    <a href="{{url('/service-detail/'.$seller_info->id)}}">{{ $seller_info->company_name }}</a>    
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="icon_whislist">
                                                <img src="{{ asset('customer-images/heart-component.svg') }}">
                                            </span>
                                        </h1>
                                    </div>
                                </div>
                                <div class="result_box_rating">
                                    <div class="result_box_rating_number">
                                        <p>4.7</p>
                                    </div>
                                    <div class="star_rating"><img src="{{ asset('customer-images/star rating.png') }}">
                                    </div>
                                    <div class="person_rated">
                                        <p>{{ $seller_info->google_rating }} Rating</p>
                                    </div>

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
                                    <!-- <div class="category_button_part">AC Banquet hall</div> -->
                                </div>
                                <div class="result_box_comment_section">
                                    <div class="review_icon">
                                        <img
                                        src="{{ asset('customer-images/reviewcomment_icon.svg') }}"></div>
                                    <div class="comment_text"><q>We have booked the Mandap (both floors) for thread
                                            ceremony. Excellent experience. Two no AC guest rooms are also spacious.
                                            Ample of car parking available. AC was comfort...</q></div>
                                </div>
                                <div class="query_button_section">
                                    <div class="query_button_section_button">
                                        <div class="contact_button">
                                            <button type="button" class="btn btn-success"><i class="fa fa-phone"></i>
                                                {{ $seller_info->phone ?? 'XXXXXXXXXX' }}
                                            </button>
                                        </div>
                                        <div class="query_button">
                                            <button type="button" class="btn btn-outline-primary"> Get Best
                                                Deal</button>
                                        </div>
                                    </div>
                                    <div class="result_response">
                                        <div class="time_response">Responds in 3 Hours</div>
                                        <div class="enquire_response"><span><i class="fa fa-line-chart"></i></span> 67
                                            people recently enquired</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {!! $seller_infos->render() !!}
                </div>
                <div class="right_side_box_section">
                    <!-- <div class="right_side_box mt-3">
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
                    
                    <div class="right_side_box mt-3">
                        <p class="advance_deal font_bold font_15">Category</p>
                        <ul class="related_search">
                            <li class="mt-1 first-child-highlight"><a href="#" class="color777 ">{{$parent_category->name}}</a></li>
                            @foreach($subcategories as $sub_cat_name)
                            <li class="mt-1"><a href="#" class="color777">{{ $sub_cat_name->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('customer.customer_footer')
    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
</body>

</html>