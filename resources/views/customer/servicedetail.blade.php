
<!DOCTYPE html>
<html lang="en">

<head>
    @section('title') {{ $meta_title }} @endsection
    @section('description', $meta_desc)
    @section('keywords')
    @if(!empty($meta_tags))
    @php
    $tags = is_array($meta_tags) ? $meta_tags : explode(',', $meta_tags);
    @endphp

    @foreach($tags as $tag)
    {{ $tag }},
    @endforeach
    @endif
    @endsection
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <!-- replace this end -->

    <style>
        .claim-button-disable {
            pointer-events: none;
            opacity: 0.6;
            cursor: not-allowed;
            /* Add any additional styling as needed */
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
        .modal.show-modal {
            display: block;
        }
        /* Related search start  */
        .related_search {
            list-style: none;
            padding: 0;
        }

  .related_search li {
    display: flex;
    align-items: center;
    margin-top: 10px;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .related_search li img {
    width: 91px;
    height: 61px;
    border-radius: 5%;
    margin-right: 8px;
  }
  .service-card {
  display: flex;
  flex-direction: column;
  text-align: center;
  text-decoration: none;
  color: #777;
}

.content {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.content img {
  width: 100px; /* Adjust the width as needed */
  height: 100px; /* Adjust the height as needed */
  border-radius: 5%;
  margin-bottom: 10px;
}

.company-name {
  margin-bottom: 10px;
}


  .related_search li a {
    display: flex;
    /* align-items: center; */
    text-decoration: none;
    color: #271300;
    font-size: 14px;
    font-weight: bold;
    flex-grow: 1;
    /* text-decoration: none;
    color: #271300;
    font-size: 16px;
     */
  }
  .company-name {
    margin-left: 10px; /* Adjust the margin as needed */
    overflow: hidden;
    /* white-space: nowrap; */
    text-overflow: ellipsis;
    text-align: left;
  }
  .enquire-button{
    margin-top: 10px;
    padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 244px;
    /* padding: 8px 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer; */
  }
        /* Related search end */
        /* rating start */
                .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
        /* rating end */
        a.map-link-disabled{
            color: #000;
            text-decoration: none;
            cursor:none;
        }
        a.map-link {
            background: #eee;
            border: none;
            letter-spacing: .28px;
            text-decoration: none;
            align-items: center;
            padding: 15px;
            margin-top: 10px;
            cursor: pointer;
        
            border-radius: 4px;
        
            transition: all.8s;
            height: 35px;
            padding: 10px 10px;
            color: blue;
        }
        a.map-link:hover {
            background: #ffcd0057;
            /* background: #eee; */
        }
       /* Style the input element */
.input-wrapper {
    position: relative;
}

.input-wrapper input {
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style the red asterisk */
.input-wrapper::after {
    content: "*";
    color: red;
    position: absolute;
    top: 50%;
    left: 100px;
    transform: translateY(-50%);
}
.input-wrapper-mobile {
    position: relative;
}

.input-wrapper-mobile input {
    padding: 5px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style the red asterisk */
.input-wrapper-mobile::after {
    content: "*";
    color: red;
    position: absolute;
    top: 50%;
    left: 100px; /* Adjust the left position as needed */
    left: 172px; /* Adjust the left position as needed */
    transform: translateY(-50%);
}
    /* Claim modal popup start */

    .modal-claim {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black with opacity */
    }

    /* Modal Content */
    .modal-content-claim {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* 80% width */
    }

    /* Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* Claim modal popup end */
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

    /*\\\\\\\\\\\\\\\\claimed button\\\\\\\\\\\*/
    .claimed {
        background-color: greenyellow;
        padding: 2px 10px;
        border-radius: 35px;
    }

    span.tick_icon img {
        bottom: 2px;
    }

    .claimed_text {
        font-weight: 600;
    }

    .custom_claim_btn {
        align-items: center;
        display: flex;
        gap: 10px;
        padding: 2px 10px;
        border-radius: 35px;
    }

    .custom_claim_btn span {
        font-size: 18px;
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
                                                    @else
                                                    <div class="carousel-item active">
                                                        <img src="{{ asset('uploads/userdata/no-image-new.jpg') }}"
                                                            class="d-block w-100" alt="No Image">
                                                    </div>
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
                                                    @if(is_array($images) && count($images) > 0)
                                                    @foreach($images as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}"
                                                        data-slide-number="{{ $key }}">
                                                        <div class="row mx-0">
                                                            <div id="carousel-selector-{{ $key }}"
                                                                class="thumb col-3 px-1 py-2 {{ $key == 0 ? 'selected' : '' }}"
                                                                data-target="#carousel" data-slide-to="{{ $key }}">
                                                                <img src="{{ asset('uploads/service/' . $image) }}"
                                                                    class="img-fluid" alt="...">
                                                            </div>
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
                                        @if(Session::has('error_message'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('error_message') }}
                                            </div>
                                        @endif
                                        @if(Session::has('success_message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success_message') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="product_service_title_right">
                                        <div class="category_button_section">
                                            <div class="category_button_part"><a
                                                    href="#">{{ $seller_data->company_name }}</a></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="rating_section">
                                    <div class="rating_points">{{-- $seller_data->google_rating --}}</div>
                                    @if($avgStarRating >0)
                                    <div class="star_rating">
                                        <!-- @php
                                        $star =1;
                                        while($star <= $avgStarRating){
                                             echo '<span>&#9733;</span>';
                                            $star++; 
                                        }
                                        echo '('.$avgStarRating.')';
                                        @endphp -->
                                        @foreach(range(1,5) as $i)
                                            @if($avgStarRating >0)
                                                @if($avgStarRating >0.5)
                                                    <i class="fa fa-star"></i>
                                                @else
                                                    <i class="fa fa-star-half-o"></i>
                                                @endif
                                            @else
                                                <i class="fa  fa-star-o"></i>
                                            @endif
                                            <?php $avgStarRating--; ?>
                                        @endforeach
                                        <!-- {{--Start Rating old --}}
                                        @for ($i = 0; $i < 5; $i++) @if (floor($seller_data->google_rating) - $i >= 1)
                                            {{--Full Star--}}
                                            <i class="fas fa-star text-warning"> </i>
                                            @elseif ($seller_data->google_rating - $i > 0)
                                            {{--Half Star--}}
                                            <i class="fas fa-star-half-alt text-warning"> </i>
                                            @else
                                            {{--Empty Star--}}
                                            <i class="far fa-star text-warning"> </i>
                                            @endif
                                            @endfor
                                            {{--End Rating--}} -->
                                            <!-- <img src="{{ asset('customer-images/star rating.png') }}"> -->
                                    </div>
                                    
                                    <div class="person_rated">{{-- $seller_data->google_rating --}} Rating</div>
                                    @endif
                                    <!-- <div class="claimed">
                                        <span class="tick_icon"><img
                                                src="{{ asset('customer-images/claimed_icon.svg') }}"></span><span
                                            class="claimed_text">
                                            @if($service_info->claim_status == 1)
                                            Claimed
                                            @else
                                           not claimed
                                            @endif
                                        </span>
                                    </div> -->
                                    @if($service_info->claim_status == 1)
                                    <div class="claimed">
                                        <span class="tick_icon"><img
                                                src="{{ asset('customer-images/claimed_icon.svg') }}"></span><span
                                            class="claimed_text">
                                            Claimed
                                        </span>
                                    </div>
                                    @else
                                    <div class="not_claimed">
                                        <a class="btn btn-primary custom_claim_btn" href="#" role="button" id="claim-button" data-sellerid={{ $service_info->id }}>
                                            <span class="material-symbols-outlined">check_circle</span>
                                            Claim Now
                                        </a>
                                    </div>
                                    <!-- The modal -->
                                    <div id="myModal-claim" class="modal-claim">
                                        <!-- Modal content -->
                                        <div class="modal-content-claim">
                                            <span class="close">&times;</span>
                                            <!-- start -->
                                            <div class="modal-content bg-white">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Get your service claimed</h4>

                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form action="{{ url('/save_claim/'.$service_info->id) }}" method="post" id="claim-form">
                                                    <!-- <form action="{{ url('/save_claim/'.$seller_data->id) }}" method="post"> -->
                                                        @csrf
                                                        <input type="hidden" name="seller_id" value="{{ $seller_data->id}}">
                                                        <div class="form-row my-3">
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" id="name"
                                                                    placeholder="Enter Name" name="name"
                                                                    value="{{ $seller_data->company_name ?? $seller_data->seller_name  }}">
                                                                    <!-- <input type="hidden" name="service_id" value="{{ $service_info->id }}"> -->
                                                                    <!-- <input type="hidden" name="service_id" value="{{ $seller_data->id }}"> -->
                                                            </div>
                                                            <div class="col-md-6">
                                                            <div class="input-wrapper">
                                                                <input type="email" class="form-control" id="claim-email"
                                                                    placeholder="Enter Email" name="email"
                                                                    value="{{ $service_info->email ?? '' }}" required>
                                                                    
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row my-3">
                                                            <div class="col-md-6">
                                                                <div class="input-wrapper-mobile">
                                                                    <input type="tel" class="form-control" id="claim-mobile"
                                                                        placeholder="Enter Mobile Number" name="mobile" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10"
                                                                        value="{{ $service_info->mobile ?? '' }}" required>
                                                                </div>     
                                                            </div>
                                                        </div>
                                                       
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer justify-content-start">
                                                    <h6>* marks are mandatory fields</h6>
                                                </div>

                                            </div>
                                            <!-- end -->
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="address_section">
                                    <div class="address">{{ $seller_data->full_address}}
                                        <!-- <span class="address_tooltip">{{ $seller_data->full_address}}</span> -->
                                    </div>
                                    <!-- <div class="address">{{ $seller_data->full_address}}
                                        <span class="address_tooltip">{{ $seller_data->full_address}}</span>
                                    </div> -->
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
                                            <a class="btn btn-success font_600" href="#" role="button"
                                                data-toggle="modal" data-target="#callbackModal"><i
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
                                                            <form
                                                                action="{{ url('/save_callback_enuiry/'.$seller_data->id) }}"
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
                                                                <input type="hidden" name="seller_id" value="{{ $seller_data->id }}">
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
                                            <a class="btn btn-outline-primary font_600 like-button" href="#"
                                                role="button" data-service-id="{{ $seller_data->id }}"
                                                data-user-id="{{ Auth::user()->id ?? 0 }}">
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
                                        <h2>Social Information</h2>
                                    </div>
                                    <div class="highlights_detail">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                                                {{ $seller_data->website?? 'N/A' }}
                                            </div>
                                            <div class="col-md-4">
                                            <i class="fa fa-phone mr-2"></i>{{ $seller_data->phone ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-8"> 
                                            <i class="fa fa-envelope mr-2"></i> {{ $seller_data->email?? 'N/A' }}
                                               
                                                
                                            </div>
                                            <div class="col-md-4"> 
                                                @if(!empty($seller_data->Gmaps_URL))
                                                    <a href="{{ $seller_data->Gmaps_URL }}" target="_blank" class="map-link"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                    Get Direction</a>
                                                @else
                                                <!-- Code for google maps start -->
                                                    @php 
                                                    $apiKey = "AIzaSyC1RhaxHERmptd8axCftEWFi4t6NasiIcY";

                                                    // Replace with the company name
                                                    $companyName = $seller_data->company_name;

                                                    // Encode the company name for the API request
                                                    $encodedCompanyName = urlencode($companyName);

                                                    // Create the API request URL
                                                    $apiUrl = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=" . $encodedCompanyName . "&key=" . $apiKey;

                                                    // Make the API request
                                                    $response = file_get_contents($apiUrl);

                                                    // Decode the JSON response
                                                    $data = json_decode($response, true);

                                                    // Check if the response contains results
                                                    if (isset($data['results']) && !empty($data['results'])) {
                                                        // Get the first result (assumes the most relevant)
                                                        $result = $data['results'][0];

                                                        // Extract the location details
                                                        $lat = isset($result['geometry']['location']['lat']) ? $result['geometry']['location']['lat'] : null;
                                                        $lng = isset($result['geometry']['location']['lng']) ? $result['geometry']['location']['lng'] : null;

                                                        if ($lat && $lng) {
                                                            

                                                            // Generate the JavaScript code to open Google Maps with directions
                                                            echo "<button onclick='getDirections(\"$companyName\", $lat, $lng)' class='btn btn-info'>Get Directions</button>";

                                                            // JavaScript function to open Google Maps with directions
                                                            echo "<script>
                                                                function getDirections(destinationName, lat, lng) {
                                                                    if (navigator.geolocation) {
                                                                        navigator.geolocation.getCurrentPosition(function(position) {
                                                                            var userLat = position.coords.latitude;
                                                                            var userLng = position.coords.longitude;
                                                                            var mapsUrl = 'https://www.google.com/maps/dir/?api=1&origin=' + userLat + ',' + userLng + '&destination=' + lat + ',' + lng + '&travelmode=driving&dir_action=navigate&destination_place_id=' + encodeURIComponent(destinationName);
                                                                            window.open(mapsUrl, '_blank');
                                                                        });
                                                                    } else {
                                                                        alert('Geolocation is not supported by this browser.');
                                                                    }
                                                                }
                                                                </script>";
                                                        } else {
                                                            echo "Location data not available.";
                                                        }
                                                    } else {
                                                        echo "No results found.";
                                                    }
                                                    @endphp
                                                <!-- Code for google maps end -->
                                                @endif
                                                <!-- @if(!empty($seller_data->Gmaps_URL))
                                                <a href="{{ $seller_data->Gmaps_URL }}" target="_blank" class="map-link"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                Get Direction</a> -->
                                                <!-- @elseif(!empty($seller_data->latitude) || !empty($seller_data->longitude))
                                                <a href="https://www.google.com/maps/search/?api=1&query={{ $seller_data->latitude }},{{ $seller_data->longitude }}" target="_blank" class="map-link"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                Get Direction</a> -->
                                                <!-- @else -->
                                                
                                                <!-- <a href="#" class="map-link-disabled"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                Get Direction</a> -->
                                                <!-- @endif -->
                                            </div>
                                        </div>
                                        
                                        <!-- <br /> -->
                                       
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
                                                <th>{{ $seller_data->year_drp_down ?? 'N/A'}}</th>
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
                                                <td>
                                                    @if($seller_data->opening_time || $seller_data->closing_time)
                                                    {{ $seller_data->opening_time}} - {{ $seller_data->closing_time }}
                                                    @else
                                                    {{ 'N/A' }}
                                                    @endif
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
                                                        Payment Mode-
                                                        {{ $service_info->payment_mode?? 'N/A' }}</a></span>
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
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#menu2">
                                    <h2>Review</h2>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home">
                                    <h2>About Company</h2>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">
                                    <h2>FAQS</h2>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#social-media">
                                    <h2>Social Media</h2>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#services">
                                    <h2>Services</h2>
                                </a>
                            </li>
                           
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="menu2" class="container tab-pane active"><br>
                                    <h3>Review For {{ $service_info->seller_name }}</h3>
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            
                                            <form action="{{ url('/add-rating') }}" method="post" name="formRating" id="formRating" class="form-horizontal">
                                                @csrf
                                                <input type="hidden" name="seller_id" value="{{ $seller_data->id }}">
                                                <div class="rate">
                                                        <input type="radio" id="star1" name="rating" value="1" />
                                                        <label for="star1" title="text">1 star</label>
                                                        <input type="radio" id="star2" name="rating" value="2" />
                                                        <label for="star2" title="text">2 stars</label>
                                                        <input type="radio" id="star3" name="rating" value="3" />
                                                        <label for="star3" title="text">3 stars</label>
                                                        <input type="radio" id="star4" name="rating" value="4" />
                                                        <label for="star4" title="text">4 stars</label>
                                                        <input type="radio" id="star5" name="rating" value="5" />
                                                        <label for="star5" title="text">5 stars</label>
                                                        
                                                        
                                                        
                                                </div>
                                                <br/>
                                        <div class="form-group">
                                            
                                            <textarea name="review" id="review" class="form-control" style="width: 300px;height:50px;" required placeholder="Your Review Matters a lot *"></textarea>
                                        </div>
                                        <div class="control-group">&nbsp;</div>
                                        <div class="form-group">
                                            <input type="submit"  name="Submit" class="btn btn-secondary btn-large">
                                        </div>
                                            </form>
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3">
                                            <h3>Users review</h3>
                                            @if(count($ratings) > 0)
                                            @foreach($ratings as $rating)
                                            <div>
                                                <p>
                                                    {{-- $rating['rating'] --}}
                                                
                                                </p>
                                                @for($count = 1; $count <= $rating['rating']; $count++)
                                                    <span>&#9733;</span>
                                                @endfor
                                                <p>
                                                    {{ $rating['review'] }}
                                                
                                                </p>
                                                <p>
                                                By {{ $rating['user']['name']}}
                                                </p>
                                                <p>
                                            
                                            {{  date("d-m-Y H:i:s", strtotime($rating['created_at'])) }}
                                                </p>
                                            </div>
                                            @endforeach
                                            @else
                                            <p><b>Reviews not available for this seller. </b></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div id="home" class="container tab-pane ">
                                <br>
                            @if($seller_data->company_info)
                            {!! $seller_data->company_info !!}
                            @else
                            <p>Information not available</p>
                            @endif
                            
                               
                            </div>
                            <div id="menu1" class="container tab-pane"><br>
                                @php
                                if($service_info->question)
                                {
                                $qa_arr = explode(',',$service_info->question);
                                $ans_arr = explode(',',$service_info->answer);
                                }
                                @endphp
                                <div id="main">
                                    <div class="accordion" id="faq">
                                    @if ($service_info->faqs->isEmpty())
                                      
                                        <p>No FAQs for this service.</p>
                                        @else
                                        @foreach ($service_info->faqs as $index => $faq)
                                            <div class="card">
                                                <div class="card-header" id="faqhead{{ $index }}">
                                                    <!-- original start -->
                                                    <!-- <h2 class="mb-0"> -->
                                                        <!-- <button class="btn btn-header-link" type="button" data-toggle="collapse"
                                                            data-target="#faq{{ $index }}" aria-expanded="true"
                                                            aria-controls="faq{{ $index }}">
                                                            {{ $faq->question }}
                                                        </button> -->
                                                        <!-- </h2> -->
                                                        <!-- original end -->
                                                        <a href="#" class="btn btn-header-link" data-toggle="collapse"
                                                    data-target="#faq{{ $index}}" aria-expanded="true"
                                                    aria-controls="faq{{ $index}}">{{ $faq->question }}</a>
                                                    
                                                </div>

                                                <div id="faq{{ $index }}" class="collapse @if ($index === 0) show @endif"
                                                    aria-labelledby="faqhead{{ $index }}" data-parent="#faq">
                                                    <div class="card-body">
                                                        {{ $faq->answer }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                </div>
                                <!-- <div id="main">
                                    <div class="accordion" id="faq">
                                        @if (isset($qa_arr) && count($qa_arr) > 0)
                                        @foreach ($qa_arr as $index => $qa)
                                        <div class="card">
                                            <div class="card-header" id="faqhead{{ $index}}">
                                                <a href="#" class="btn btn-header-link" data-toggle="collapse"
                                                    data-target="#faq{{ $index}}" aria-expanded="true"
                                                    aria-controls="faq{{ $index}}">{{ $qa }}</a>
                                            </div>

                                            <div id="faq{{ $index}}" class="collapse @if($index == 0) show @endif"
                                                aria-labelledby="faqhead{{ $index}}" data-parent="#faq{{ $index}}">
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
                                </div> -->



                            </div>
                            <div id="social-media" class="container tab-pane"><br>
                            <div class="highlights_detail">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <i class="fa fa-globe mr-2" aria-hidden="true"></i>
                                                @if($seller_data->website)
                                                <a href="{{ $seller_data->website }}" target="_blank" class="map-link">
                                                    
                                                {{ $seller_data->website  }}</a>
                                                @else
                                                {{ $seller_data->website ?? 'N/A' }}
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                            <i class="fa fa-phone mr-2"></i>{{ $seller_data->phone ?? 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-8"> 
                                            <i class="fa fa-envelope mr-2"></i> {{ $seller_data->email?? 'N/A' }}
                                               
                                                
                                            </div>
                                            <div class="col-md-4"> 
                                                @if(!empty($seller_data->Gmaps_URL))
                                                <a href="{{ $seller_data->Gmaps_URL }}" target="_blank" class="map-link"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                Get Direction</a>
                                                @elseif(!empty($seller_data->latitude) || !empty($seller_data->longitude))
                                                <a href="https://www.google.com/maps/search/?api=1&query={{ $seller_data->latitude }},{{ $seller_data->longitude }}" target="_blank" class="map-link"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                Get Direction</a>
                                                @else
                                                <a href="#" class="map-link-disabled"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                                Get Direction</a>
                                                @endif
                                            </div>
                                        </div>
                                       
                                        
                                        <hr>
                                        <span style="font-size: medium;font-weight:bold;" class="w-auto">Online presence at</span>
                                        <div class="row">
                                            <div class="col-md-12">
                                            @if($seller_data->facebook)
                                                <a href="{{ $seller_data->facebook }}" target="_blank">
                                                    <i class="fa fa-facebook-square fa-2x"></i>
                                                </a>
                                            @else
                                                <span class="social_media_disable">
                                                    <i class="fa fa-facebook-square fa-2x"></i>
                                                </span>
                                            @endif
                                            @if($seller_data->twitter)
                                            <a href="{{ $seller_data->twitter }}" target="_blank">
                                                <i class="fa fa-twitter-square fa-2x"></i>

                                                </a>
                                            @else
                                                <span class="social_media_disable">
                                                    <i class="fa fa-twitter-square fa-2x"></i>
                                                </span>
                                            @endif
                                            @if($seller_data->linkedin)
                                            <a href="{{ $seller_data->linkedin }}" target="_blank">
                                                <i class="fa fa-linkedin-square fa-2x"></i>

                                                </a>
                                            @else
                                                <span class="social_media_disable">
                                                    <i class="fa fa-linkedin-square fa-2x"></i>
                                                </span>
                                            @endif
                                            @if($seller_data->instagram)
                                            <a href="{{ $seller_data->instagram }}" target="_blank">
                                                <i class="fa fa-instagram fa-2x"></i>

                                                </a>
                                            @else
                                                <span class="social_media_disable">
                                                    <i class="fa fa-instagram fa-2x"></i>
                                                </span>
                                            @endif
                                                
                                                
                                               
                                               
                                                
                                            </div>
                                        </div>

                                        
                                    </div>      
                            </div>
                            <div id="services" class="container tab-pane">
                            <br>
                            @if($service_info->extra_services)
                            {!! $service_info->extra_services !!}
                            @else
                            <p>Information not available</p>
                            @endif
                            </div>
                            
                        </div>
                    </div>


                </div>
                <div class="right_side col-lg-3">
                    <div class="right_side_box mt-4">
                        <p class="advance_deal font_14">Get the List of Top</p>
                        <p class="advance_deal font_18 color_0076d7">{{ $category->name}}</p>
                        <p class="advance_deal font_12">We'll send you contact details in seconds for free</p>
                        <form id="best_deal_form">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $seller_data->category_id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? ' ' }}">
                                <input type="hidden" name="best_deal_city" value="" id="best_deal_city">
                            <div class="input-group w-auto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Name" id="username" name="username" value="{{ Auth::user()->name ?? '' }}">
                            </div>
                            <div class="input-group w-auto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Email" id="useremail" name="useremail" value="{{ Auth::user()->email ?? '' }}">
                            </div>

                            <div class="input-group w-auto">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                </div>
                                <input type="tel" class="form-control" placeholder="Mobile Number" id="usermobile" name="usermobile" value="{{ Auth::user()->mobile ?? '' }}">
                            </div>
                            <button type="button" class="btn btn-primary width_100_bold" id="bestDealForm">Get Best Deal</button>
                        </form>
                    </div>
                    <div class="right_side_box mt-4 mb-4">
                        <p class="advance_deal font_bold font_15">Related Services</p>
                        @php 
                         
                         $related_searches = \App\Models\Sellerinfo::where('category_id',$category->id)->where('id', '!=', $service_id)->limit(5)->get();
                        
                        @endphp
                        @if($related_searches->isNotEmpty())
                            <ul class="related_search">
                                @foreach($related_searches as $search)
                                <li class="mt-1">
                                    <div class="service-card">
                                        <a href="{{ url('/service-detail/'.$search->id)}}" class="color777">
                                        <div class="content">
                                            @if($search->image)
                                            <img src="{{ asset('uploads/userdata/'.$search->image) }}" alt="Image">
                                            @else
                                            <img src="{{ asset('uploads/userdata/no-image-new.jpg') }}" alt="Image">
                                            @endif
                                            <span class="company-name"> {{ $search->company_name}} </span>
                                        </div>
                                           
                                        </a>
                                        <button class="enquire-button"  data-modal-id="modal-{{ $search->id }}">Enquire</button>
                                    </div>
                                    <div id="modal-{{ $search->id }}" class="modal">
                                        <!-- Modal content -->
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content bg-white">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Enquiry Form</h4>
                                                            <!-- <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button> -->
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form action="{{ url('/save_service_enuiry') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="hidden" name="seller_id" value="{{ $search->id }}">
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
                                        <span class="close-button close-button-{{ $search->id }}">&times;</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            
                            <!-- <ul class="related_search">
                            
                            <li class="mt-1">
                                <a href="#" class="color777">
                                    <img src="{{ asset('uploads/userdata/no-image-new.jpg') }}" alt="Image">
                                    Banquet Halls in Bhubaneshwar
                                </a>
                            </li>
                            <li class="mt-1">
                                <a href="#" class="color777">
                                    <img src="{{ asset('uploads/userdata/no-image-new.jpg') }}" alt="Image">
                                    Banquet Halls in Bhubaneshwar
                                </a>
                            </li>
                            <li class="mt-1">
                                <a href="#" class="color777">
                                    <img src="{{ asset('uploads/userdata/no-image-new.jpg') }}" alt="Image">
                                    Banquet Halls in Bhubaneshwar
                                </a>
                            </li>
                            
                            
                        </ul> -->
                        @else
                            <p>No related searches found.</p>
                        @endif
                        
                    </div>
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
    // $('#myModal').modal("show");
    </script>
    <!-- sweet alert code start  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>
    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('success') }}', // Remove the space after 'success'
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
                    } else {
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
    @include('customer.search_bar_all_page')
   
    <script>
    // Get the modal element
    var modal = document.getElementById("myModal-claim");

    // Get the button that opens the modal
    var btn = document.querySelector(".custom_claim_btn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    };

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
    </script>
<script>
    $(document).ready(function() {
        // Fade out the alert after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            $(".alert-danger").fadeOut("slow");
        }, 5000); // Adjust the time in milliseconds (e.g., 5000 = 5 seconds)
        setTimeout(function() {
            $(".alert-success").fadeOut("slow");
        }, 5000); // Adjust the time in milliseconds (e.g., 5000 = 5 seconds)
    });
</script>
<!-- JavaScript to handle modal functionality -->
<script>
    const enquireButtons = document.querySelectorAll('.enquire-button');
    const modals = document.querySelectorAll('.modal');
    const closeButtons = document.querySelectorAll('.close-button');

    enquireButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const modalId = button.getAttribute('data-modal-id');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('show-modal'); // Add the show-modal class
            }
        });
    });

    closeButtons.forEach((closeButton) => {
        closeButton.addEventListener('click', () => {
            const modalId = closeButton.getAttribute('data-modal-id');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('show-modal');
            }
        });
    });

    window.addEventListener('click', event => {
        modals.forEach((modal) => {
            if (event.target === modal) {
                modal.classList.remove('show-modal');
            }
        });
    });
</script>
<!-- best deal code start -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
       
    $(document).ready(function() {
        var sellerInfoId = "{{ $seller_data->id }}"; 
        $("#bestDealForm").click(function(e){
            e.preventDefault();
            
            url = "{{ url('save_bestdeal_ajax') }}" + "/" + sellerInfoId ;
            var _token = $("input[name='_token']").val();
            var name = $("input[name='username']").val();
            var email = $("input[name='useremail']").val();
            var mobile = $("input[name='usermobile']").val();
            var category_id = $("input[name='category_id']").val();
            var user_id = $("input[name='user_id']").val();
            var best_deal_city = $("input[name='best_deal_city']").val();
       
            $.ajax({
                url: url,
                type:'POST',
                data: {_token:_token, name:name, user_id:user_id,category_id:category_id, email:email, mobile:mobile,city:best_deal_city},
                success: function(data) {
                    // var responseData = JSON.parse(data);
                        // Display the "Data saved successfully" message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message,
                        });
                }
            });
       
        }); 
       
      
    });


</script>
<!-- best deal code end -->
<script>
// document.addEventListener("DOMContentLoaded", function() {
//     const claimButton = document.getElementById("claim-button");
//     const sellerId = claimButton.getAttribute("data-sellerid"); // Retrieve the data-sellerid attribute value

//     // Make an AJAX request to check the claim status using the sellerId
//     $.ajax({
//         url: '/check-claim-status/' + sellerId, // Use the retrieved sellerId in the URL
//         method: 'GET',
//         dataType: 'json',
//         success: function(response) {
//             const claimStatus = response.status;

//             // Check the claim status and disable the button if it's '0'
//             if (claimStatus === 0) {
//                 $("#claim-button").addClass("claim-button-disable");
//             }
//         },
//         error: function(error) {
//             console.error("Error checking claim status:", error);
//         }
//     });
// });
</script>
<script>
    $('#claim-form').on('submit', function (e) {
     $('#claim-button', $(this)).blur().addClass('disabled is-submited');
});

$(document).on('click', '.is-submited', function(e) {
    e.preventDefault();
});

</script>

</body>

</html>