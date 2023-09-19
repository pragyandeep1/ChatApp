<!DOCTYPE html>
<html lang="en">

<head>
@section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>

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

    <!-- product slider cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css'>

    <!-- sweet alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="{{ asset('css/service-single-style.css') }}">

    <!-- replace this start -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- replace this end -->

    <style>
        .liked {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
}
    .faq-container {
        margin-top: 20px;
    }

    .faq-item {
        margin-bottom: 10px;
    }

    .question {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .answer {
        margin-left: 20px;
    }
    </style>
</head>

<body>
    @include('customer.customer_navbar')
    <div class="container-custom">
        <div class="breadcrumb_section">
            <div class="container">
                <ul class="breadcrumb_items">
                    <li class="breadcrumb_items_title"><a href="#">Bhubaneshwar</a></li>
                    <li class="breadcrumb_items_title"><a href="#">{{ $seller_data->company_name }}</a></li>
                    <!-- <li class="breadcrumb_items_title"><a href="#">Banquet Halls in Ratha Road-Old Bhubaneshwar</a></li>
                    <li class="breadcrumb_items_title"><a href="#">48+ Listings</a></li> -->
                </ul>
            </div>
        </div>
    </div>
    <div class="container-custom">
        <div class="container">
            <div class="result_section_area row">
                <div class="left_side col-lg-9">
                    <div class="left_side_box mt-4 ml-0">
                        <div class="row">
                            <div class="col-lg-5 product_gallery">

                                <!-- product slider -->
                                <!-- partial:index.partial.html -->
                                <div id="wrap" class="">
                                    <div class="row">
                                        <div class="col-12">

                                            <!-- Carousel -->

                                            @php
                                            $images = json_decode($service_info->image);
                                            @endphp
                                            <div id="carousel" class="carousel slide gallery" data-ride="carousel">
                                                <div class="carousel-inner">
                                                @if(is_array($images) && count($images) > 0)
                                                    @foreach($images as $key => $slider)
                                                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}"
                                                        data-slide-number="{{ $key }}" data-toggle="lightbox"
                                                        data-gallery="gallery"
                                                        data-remote="{{ asset('uploads/service/' . $slider) }}">
                                                        <img src="{{ asset('uploads/service/' . $slider) }}"
                                                            class="d-block w-100" alt="...">
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel" role="button"
                                                    data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel" role="button"
                                                    data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                                <a class="carousel-fullscreen" href="#carousel" role="button">
                                                    <span class="carousel-fullscreen-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Fullscreen</span>
                                                </a>
                                                <a class="carousel-pause pause" href="#carousel" role="button">
                                                    <span class="carousel-pause-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Pause</span>
                                                </a>
                                            </div>

                                            <!-- Carousel Navigatiom -->
                                            <div id="carousel-thumbs" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                if(is_array($images) && count($images) > 0)
                                                    @foreach($images as $key => $image)

                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}"
                                                        data-slide-number="{{ $key }}">
                                                        <div class="row mx-0">
                                                            @foreach($images as $key => $image)
                                                            <div id="carousel-selector-{{ $key }}"
                                                                class="thumb col-3 px-1 py-2 {{ $key == 0 ? 'selected' : '' }}"
                                                                data-target="#carousel" data-slide-to="{{ $key }}">
                                                                <img src="{{ asset('uploads/service/' . $image) }}"
                                                                    class="img-fluid" alt="...">
                                                            </div>
                                                            @endforeach


                                                        </div>
                                                    </div>



                                                    @endforeach
                                                    @endif
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel-thumbs" role="button"
                                                    data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel-thumbs" role="button"
                                                    data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- product slider end -->

                            </div>
                            <div class="col-lg-7 Product_details">
                                <div class="product_service_title_section">
                                    <div class="product_service_title_left">
                                        <h1>
                                            <span class="thumb_icon">
                                                <img src="{{ asset('customer-images/new_thumb_icon.svg') }}">
                                            </span>
                                            <span class="product_service_title">
                                                {{ $seller_data->company_name}}
                                            </span>
                                        </h1>
                                    </div>
                                    <div class="product_service_title_right">
                                        <div class="category_button_section">
                                            <div class="category_button_part"><a href="#">Banquet hall</a></div>
                                            <div class="category_button_part"><a href="#">AC Banquet hall</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="rating_section">
                                    <div class="rating_points">{{ $seller_data->google_rating}}</div>
                                    <div class="star_rating">
                                        {{--Start Rating--}}
                                        @for ($i = 0; $i < 5; $i++) @if (floor($seller_data->google_rating) - $i >= 1)
                                            {{--Full Start--}}
                                            <i class="fas fa-star text-warning"> </i>
                                            @elseif ($seller_data->google_rating - $i > 0)
                                            {{--Half Start--}}
                                            <i class="fas fa-star-half-alt text-warning"> </i>
                                            @else
                                            {{--Empty Start--}}
                                            <i class="far fa-star text-warning"> </i>
                                            @endif
                                            @endfor
                                            {{--End Rating--}}
                                            <!-- <img src="{{ asset('customer-images/star rating.png') }}"> -->
                                    </div>
                                    <div class="person_rated">{{ $seller_data->google_rating}} Rating</div>
                                    <div class="claimed">
                                        <span class="tick_icon"><img
                                                src="{{ asset('customer-images/claimed_icon.svg') }}"></span><span
                                            class="claimed_text">
                                            @if($service_info->claim_status == 1)
                                            Claimed
                                            @else
                                            Not Claimed
                                            @endif</span>
                                    </div>
                                </div>
                                <div class="address_section">
                                    <div class="address">{{ $seller_data->full_address}}
                                        <span class="address_tooltip">{{ $seller_data->full_address}}</span>
                                    </div>
                                    <div class="address">{{ $seller_data->full_address}}
                                        <span class="address_tooltip">{{ $seller_data->full_address}}</span>
                                    </div>
                                    <!-- <div class="result_dot"></div> -->
                                    <!-- <div class="result_box_activity_until">
                                        <span class="open">Open</span>
                                        <span class="open_until">Until 6 pm</span>
                                    </div>
                                    <div class="result_dot"></div>
                                    <div class="selling_from">1 Year in Business</div> -->
                                </div>
                                <!-- <div class="response_section">
                                    <div class="response_time">
                                        <span class="respond_text">Responds in</span>
                                        <span class="response_in_hours">3 Hours</span>
                                    </div>
                                    <div class="result_dot"></div>
                                    <div class="enquire_response"><span><i class="fa fa-line-chart"></i></span> 67
                                        people recently enquired</div>
                                </div> -->
                                <div class="query_button_section_button">
                                    <div class="query_button_section_left_side">
                                        <div class="query_button">
                                            <a class="btn btn-success font_600" href="#" role="button" data-toggle="modal" data-target="#callbackModal"><i
                                                    class="fa fa-phone"></i> 
                                                    Call me back
                                                    {{-- {{ $seller_data->phone?? 'XXXXXXXXXX' }} --}}
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
                                                            <form action="{{ url('/save_callback_enuiry/'.$seller_data->id) }}"
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
                                        <!-- <div class="query_button">
                                <a class="btn btn-outline-primary font_600" href="#" role="button"><i class="fa fa-whatsapp"></i> Chat</a>
                            </div>
                            <div class="query_button">
                                <a class="btn btn-outline-primary font_600" href="#" role="button"><i class="fa fa-star"></i> Top to Rate</a>
                            </div>
                            <div class="query_button">
                                <a class="btn btn-outline-primary font_600" href="#" role="button"><i class="fa fa-photo"></i> Add Photo</a>
                            </div>
                            <div class="query_button">
                                <a class="btn btn-outline-primary font_600" href="#" role="button"><i class="fa fa-share"></i> Share</a>
                            </div> -->

                                        <div class="best_deal_button">
                                            <a class="btn btn-primary font_600 highlighted_btn" href="#" role="button"
                                                data-toggle="modal" data-target="#myModal">Enquire</a>
                                            <!-- modal start -->
                                            <!-- The Modal -->
                                            <div class="modal fade" id="myModal">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content bg-white">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Enquiry Form</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form action="{{ url('/save_service_enuiry') }}"
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
                                                                        <input type="email" class="form-control"
                                                                            id="email" placeholder="Enter Email*"
                                                                            name="email"
                                                                            value="{{ Auth::user()->email ?? '' }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row my-3">
                                                                    <div class="col">
                                                                        <input type="tel" class="form-control"
                                                                            id="mobile"
                                                                            placeholder="Enter Mobile Number*"
                                                                            name="mobile"
                                                                            value="{{ Auth::user()->mobile ?? '' }}">
                                                                    </div>
                                                                    <div class="col">
                                                                        <input type="tel" class="form-control"
                                                                            id="business_no"
                                                                            placeholder="Enter Business Number (Optional)"
                                                                            name="business_no">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row my-3">
                                                                    <div class="col">
                                                                        <input type="text" class="form-control"
                                                                            id="gst_no"
                                                                            placeholder="Enter GST Number (Optional)"
                                                                            name="gst_no">
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
                                        <a class="btn btn-outline-primary font_600 like-button" href="#" role="button" data-service-id="{{ $seller_data->id }}" data-user-id="{{ Auth::user()->id ?? 0 }}">
                                            <i class="fa fa-heart-o"></i>
                                        </a>
                                            <!-- <a class="btn btn-outline-primary font_600" href="#" role="button"><i
                                                    class="fa fa-heart-o"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="product_highlights">
                                    <div class="highlights_title">
                                        <h2>Highlights</h2>
                                    </div>
                                    <div class="highlights_detail">
                                        @if($service_info)
                                        {!! $service_info->service_highlight !!}
                                        @endif
                                        <!-- <ul>
                                            <li>Lorem Ipsum is simply dummy</li>
                                            <li>text of the printing and typesetting industry</li>
                                            <li>Lorem Ipsum has been the industry's standard </li>
                                            <li>ummy text ever since the 1500s</li>
                                            <li>when an unknown printer took a galley</li>
                                        </ul> -->
                                    </div>
                                </div>
                                <hr>
                                <div class="quick_information_section row">
                                    <div class="year_established col">
                                        <h2>Quick Information</h2>
                                        <table>
                                            <tr>
                                                <td>Year of Establishment</td>
                                            </tr>
                                            <tr>
                                                <th>2022</th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="timing_available col">
                                        <h2>Timings</h2>
                                        <table>
                                            <tr>
                                                <th>
                                                    @php
                                                    $daysString = $seller_data->business_hr;
                                                    $daysArray = explode(',', $daysString);
                                                    $formattedDays = array_map(function($day) {
                                                    return strtoupper(substr(trim($day), 0, 3));
                                                    }, $daysArray);
                                                    $formattedDaysString = implode(', ', $formattedDays);


                                                    @endphp
                                                    {{ $formattedDaysString }}
                                                </th>
                                                <!-- <th>Mon - Sun</th> -->
                                            </tr>
                                            <tr>
                                                <td>{{ $seller_data->opening_time}} - {{ $seller_data->closing_time }}
                                                </td>
                                                <!-- <td>8:00 am - 9:00 pm</td> -->
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="product_services">
                                    <div class="product_services_title">
                                        <h2>Services</h2>
                                    </div>
                                    <div class="product_services_points">
                                        <ul class="service_Point_list">
                                            <!-- <li class="service_Point_list_item">
                                                <span class="service_icon"><img
                                                        src="{{ asset('customer-images/shield.png') }}"><a href="#"> 5
                                                        Years Warranty</a></span>
                                            </li> -->
                                            <li class="service_Point_list_item">
                                                <span class="service_icon"><img
                                                        src="{{ asset('customer-images/rupee.png') }}"> <a href="#">
                                                        Payment Mode- {{ $service_info->payment_mode?? '' }}</a></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="left_side_box mt-4 ml-0 mb-4">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">
                                    <h2>Specification</h2>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#menu1">
                                    <h2>Q&A</h2>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">
                                    <h2>What is in the box?</h2>
                                </a>
                            </li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- <div id="home" class="container tab-pane active"><br>
                                <h3>HOME</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.</p>
                            </div> -->
                            <div id="menu1" class="container tab-pane active"><br>
                                @php
                                    if($service_info->question)
                                    {
                                    $qa_arr = explode(',',$service_info->question);
                                    $ans_arr = explode(',',$service_info->answer);
                                    }
                                @endphp
                                <div id="main">
                                    <div class="accordion" id="faq">
                                    @if (isset($qa_arr) && count($qa_arr) > 0)
                                @foreach ($qa_arr as $index => $qa)
                                <div class="card">
                                            <div class="card-header" id="faqhead{{ $index}}">
                                                <a href="#" class="btn btn-header-link" data-toggle="collapse"
                                                    data-target="#faq{{ $index}}" aria-expanded="true"
                                                    aria-controls="faq{{ $index}}">{{ $qa }}</a>
                                            </div>

                                            <div id="faq{{ $index}}" class="collapse @if($index == 0) show @endif" aria-labelledby="faqhead{{ $index}}"
                                                data-parent="#faq{{ $index}}">
                                                <div class="card-body">
                                                {{ $ans_arr[$index] }}
                                                </div>
                                            </div>
                                        </div>
                                
                                @endforeach
                                @else
                                <p>No questions available.</p>
                                @endif
                                        
                                        
                                    </div>
                                </div>
                                
                                

                            </div>
                            <!-- <div id="menu2" class="container tab-pane fade"><br>
                                <h3>Menu 2</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam.</p>
                            </div> -->
                        </div>
                    </div>


                </div>
                <div class="right_side col-lg-3">
                    <div class="right_side_box mt-4">
                        <p class="advance_deal font_14">Get the List of Top</p>
                        <p class="advance_deal font_18 color_0076d7">{{ $category->name}}</p>
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
                    </div>
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

    <!-- product slider js-->
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js'></script>
    <script src='https://kit.fontawesome.com/ad153db3f4.js'>
    </script>
    <script src="{{ asset('js/gallery_script.js') }}"></script>
    <script>
    $('#myModal').modal("show");
    </script>
    <!-- sweet alert code start  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            // text: '{{ session('success') }}',
        });
    </script>
@endif
<!-- sweet alert code end  -->
<script>
    $(document).ready(function() {
        $('.like-button').click(function(event) {
            event.preventDefault();
            
            // Retrieve the service ID and user ID from the button's data attributes
            const serviceId = $(this).data('service-id');
            const userId = $(this).data('user-id');
            
            // Store the reference to the button
            const button = $(this);
            
            // Send an AJAX POST request to the like route
            $.ajax({
                url: "{{ route('services.like') }}",
                type: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: JSON.stringify({
                    service_id: serviceId,
                    user_id: userId
                }),
                dataType: 'json',
                success: function(data) {
                    // Handle the response, e.g., display a success message
                    console.log(data.message);
                    
                    // Update the button's CSS class based on the response
                    if (data.status == 0) {
                        if (button.hasClass('liked')) {
                        button.removeClass('liked');
                        } else {
                            button.addClass('liked');
                        }
                    }else{
                        if (button.hasClass('liked')) {
                        button.removeClass('liked');
                        } else {
                            button.addClass('liked');
                        }
                    }
                    
                },
                error: function(error) {
                    // Handle any errors that occur during the request
                    console.error(error);
                }
            });
        });
    });
</script>
</body>

</html>