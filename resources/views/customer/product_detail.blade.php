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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/product-single.css') }}">

</head>
<body>
    @include('customer.product_navbar')
    
      <!-- filter -->

    <div class="filter_section">
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
                                        <!-- <li><a class="dropdown-item" href="#">Vehicle Parts &amp; Accessories</a> </li>
                                        <li><a class="dropdown-item" href="#">level 1</a></li> -->
                                        <!-- <li class="dropdown-divider"></li> -->
                                        @foreach($category_list as $category)
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" tabindex="-1" href="#">
                                               {{ $category->name}}
                                            </a>
                                            <ul class="dropdown-menu fweeq p-3">
                                                <!-- <li> -->
                                                <!-- <div class="row"> -->
                                                  @php 
                                                    $json = $category->subcategory;
                                                    $array = json_decode($json, true);
                                                    $names = [];
                                                    foreach ($array as $item) {
                                                      $names[] = $item['name'];
                                                    }
                                                  @endphp  
                                                  @foreach($names as $category_name)
                                                      <!-- <div class="col-6"> -->
                                                          <!-- <h2>{{ $category_name }}</h2> -->
                                                          <!-- subcategory of subcategory -->
                                                          <ul class="dropdown_sub_item">
                                                              <li><a href="#">{{ $category_name }}</a></li>
                                                              <!-- <li><a href="#">item 1</a></li>
                                                              <li><a href="#">item 1</a></li> -->
                                                          </ul>
                                                      <!-- </div> -->
                                                    @endforeach
                                                    <!-- <div class="col-6">
                                                        <h2>industry2</h2>
                                                        <ul class="dropdown_sub_item">
                                                            <li><a href="#">item 2</a></li>
                                                            <li><a href="#">item 2</a></li>
                                                            <li><a href="#">item 2</a></li>
                                                        </ul>
                                                    </div> -->
                                                <!-- </div> -->
                                            <!-- </li>   -->
                                            </ul>
                                        </li>
                                        @endforeach
                                        <!-- <li class="dropdown-submenu">
                                            <a class="dropdown-item" tabindex="-1" href="#">
                                                Industrial Machinery
                                            </a>
                                            <ul class="dropdown-menu fweeq p-3">
                                                <li>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h2>Vehicle Parts & Accessories</h2>
                                                        <ul class="dropdown_sub_item">
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <h2>Vehicle Parts & Accessories</h2>
                                                        <ul class="dropdown_sub_item">
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                            <li><a href="#">Air Conditioning Systems</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>  
                                            </ul>
                                        </li> -->
                                        <!-- <li class="dropdown-submenu">
                                            <a class="dropdown-item" tabindex="-1" href="#">
                                                Industrial Machinery
                                            </a>
                                            <ul class="dropdown-menu fweeq p-3">
                                                <li>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h2>industry</h2>
                                                        <ul class="dropdown_sub_item">
                                                            <li><a href="#">item 1</a></li>
                                                            <li><a href="#">item 1</a></li>
                                                            <li><a href="#">item 1</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-6">
                                                        <h2>industry2</h2>
                                                        <ul class="dropdown_sub_item">
                                                            <li><a href="#">item 2</a></li>
                                                            <li><a href="#">item 2</a></li>
                                                            <li><a href="#">item 2</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>  
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </li>
    
                            <!-- <li class="main_list_item main_list_item_pad_left"><a href="#">Ready to ship</a></li>
                            <li class="main_list_item main_list_item_pad_left"><a href="#">Personal Protective Equipment</a></li>
                            <li class="main_list_item main_list_item_pad_left"><a href="#">Trade show</a></li>
                            <li class="main_list_item"><div class="other_links_level_button">
                                <div class="btn-group">
                                    <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle custom_button"
                                    href="">
                                        Dropdown22
                                    </a>
                                    <ul class="dropdown-menu main_list_button" role="menu" aria-labelledby="dropdownMenu">
                                        <li><a class="dropdown-item" href="#">level 1</a></li>
                                        <li><a class="dropdown-item" href="#">level 1</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item" tabindex="-1" href="#">
                                                level 1
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" tabindex="-1" href="#">level 2</a></li>
                                                <li class="dropdown-submenu">
                                                    <a class="dropdown-item" href="#">
                                                        level 2
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">3rd level</a></li>
                                                        <li><a class="dropdown-item" href="#">3rd level</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="dropdown-item" href="#">level 2</a></li>
                                                <li><a class="dropdown-item" href="#">level 2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div></li> -->
                        </ul>
                    </div>
                </div>
                    <!-- <div class="col-lg-2">
                        <div class="final_link_sec">
                            <ul class="final_link_sec_list">
                                <li class="final_link_sec_list_item"><a href="#"><span class="font_icon"><i class="fa fa-mobile-phone"></i></span> Get the App</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="container-custom">
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_items">
                        <li class="breadcrumb_items_title"><a href="#">{{ $product_detail->category->name}}</a></li>
                       
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
        
                            <!-- Primary carousel image -->

                            <div class="show zoom_area" href="{{ asset('uploads/product/'.$product_detail->image) }}" >
                                <img src="{{ asset('uploads/product/'.$product_detail->image) }}" id="show-img">
                            </div>
                        
                            <!-- Secondary carousel image thumbnail gallery -->
                        
                            <div class="small-img">
                            <img src="images/next-icon.png" class="icon-left" alt="" id="prev-img">
                                <div class="small-container">
                                <div id="small-img-roll">
                                <img src="{{ asset('uploads/product/'.$product_detail->image) }}" class="show-small-img" alt="">
                                <img src="{{ asset('uploads/product/'.$product_detail->image) }}" class="show-small-img" alt="">
                                <img src="{{ asset('uploads/product/'.$product_detail->image) }}" class="show-small-img" alt="">
                                <img src="{{ asset('uploads/product/'.$product_detail->image) }}" class="show-small-img" alt="">
                                <img src="{{ asset('uploads/product/'.$product_detail->image) }}" class="show-small-img" alt="">
                                </div>
                                </div>
                            <img src="{{ asset('customer-images/next-icon.png') }}" class="icon-right" alt="" id="next-img">
                            </div>
                            <!-- product slider end -->
                            <!-- AddToAny BEGIN -->
                            Share <i class="fa fa-share-square-o"></i>
                            <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <!-- <a class="a2a_dd" href="https://www.addtoany.com/share"></a> -->
                                
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <!-- <a class="a2a_button_email"></a> -->
                                <a class="a2a_button_whatsapp"></a>
                            </div>
                            <script>
                                var a2a_config = a2a_config || {};
                                a2a_config.onclick = 1;
                                </script>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->
                          </div>
                          <div class="col-lg-7 Product_details">
                            <div class="product_service_title_section">
                                <!-- <div class="lead-time">
                                    <div class="pre-icon" data-spm-anchor-id="a2700.wholesale.0.i54.42ca5d1bnbh8Bq">
                                        Ready to Ship
                                    </div>
                                    <div class="icon-ins"><i class="fa fa-check-circle" aria-hidden="true"></i>
                                        In Stock
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        Fast Dispatch
                                    </div>
                                </div> -->
                                <div class="product_service_title_left">
                                    <h1>
                                        <span class="product_service_title">
                                            {{ $product_detail->product_title }}
                                        </span>
                                    </h1>
                                </div>
                                <div class="product_service_title_right">
                                  <div class="category_button_section">
                                      <div class="category_button_part"><a href="#">{{ $product_detail->category->name}}</a></div>
                                      <!-- <div class="category_button_part"><a href="#">AC Banquet hall</a></div> -->
                                      <div class="pr-3 d-inline"><a href="#">
                                        <!-- 14 Buyers -->

                                      </a></div>
                                  </div>
                                </div>
                                <div class="countdown_sale_section">
                                    <div class="discount_percentage">
                                       <!-- 49% OFF -->
                                       @php 
                                        $unit = str_replace('per', '/', $product_detail->unit);
                                        @endphp
                                        <span class="rs_symbol">₹</span> {{ $product_detail->price }} {{ $unit }}
                                      </div>
                                    <!-- <div class="countdown_sale_section_item">Discount ends in </div>
                                    <div class="countdown_icon_time d-flex"><i class="fa fa-clock-o clock_position" aria-hidden="true"></i><p id="countdown_sale"></p></div> -->
                                      <!-- <div class="rating_points">4.7</div>
                                      <div class="star_rating"><img src="images/star rating.png"></div>
                                      <div class="person_rated">7 Rating</div> -->
                                      <!-- <div class="claimed">
                                      <span class="tick_icon"><img src="images/claimed_icon.svg"></span><span class="claimed_text">Claimed</span>
                                      </div> -->
                                  </div>
                                <!-- <hr> -->
                              </div>
                              <!-- <div class="bulk_order_type">
                                <div class="price_list d-flex">
                                    <div class="price_item">
                                        <div class="quantity">1-10pcs</div>
                                        <div class="promotional_price"><span class="rs_symbol">₹</span>258/pcs</div>
                                        <div class="actual_price">₹594</div>
                                    </div>
                                    <div class="price_item">
                                        <div class="quantity">1-10pcs</div>
                                        <div class="promotional_price"><span class="rs_symbol">₹</span>256/pcs</div>
                                        <div class="actual_price">₹592</div>
                                    </div>
                                    <div class="price_item">
                                        <div class="quantity">1-10pcs</div>
                                        <div class="promotional_price"><span class="rs_symbol">₹</span>253/pcs</div>
                                        <div class="actual_price">₹586</div>
                                    </div>
                                    <div class="price_item">
                                        <div class="quantity">1-10pcs</div>
                                        <div class="promotional_price"><span class="rs_symbol">₹</span>249/pcs</div>
                                        <div class="actual_price">₹580</div>
                                    </div>
                                </div>
                              </div> -->
                              <hr>
                              
                              <div class="buying_section">
                                <!-- <div class="lead_time_section">
                                    <div class="lead_title">Lead Time:</div>
                                    <div class="lead_table">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Quantity (acres)</td>
                                                    <td>1 - 10</td>
                                                    <td>11 - 100</td>
                                                    <td>101 - 1000</td>
                                                    <td> &gt; 1000 </td>
                                                </tr>
                                                <tr>
                                                    <td>Lead time (days)</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>12</td>
                                                    <td>To be negotiated</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->

                                <div class="product_highlights">
                                    <div class="highlights_title"><h2>Highlights</h2></div>
                                    <div class="highlights_detail">
                                    {!! $product_detail->product_description !!}
                                      <!-- <ul>
                                        <li>Lorem Ipsum is simply dummy</li>
                                        <li>text of the printing and typesetting industry</li>
                                        <li>Lorem Ipsum has been the industry's standard </li>
                                        <li>ummy text ever since the 1500s</li>
                                        <li>when an unknown printer took a galley</li>
                                      </ul> -->
                                    </div>
                                  </div>
                                  <!-- <hr> -->
                                  <div class="quick_information_section row">
                                    <!-- <div class="year_established col">
                                      <h2>Quick Information</h2>
                                      <table>
                                          <tr>
                                              <td>Year of Establishment</td>
                                          </tr>
                                          <tr>
                                              <th>2022</th>
                                          </tr>
                                      </table>
                                    </div> -->
                                    <!-- <div class="timing_available col">
                                      <h2>Timings</h2>
                                    <table>
                                        <tr>
                                            <th>Mon - Sun</th>
                                        </tr>
                                        <tr>
                                            <td>8:00 am - 9:00 pm</td>
                                        </tr>
                                    </table>
                                    </div> -->
                                  </div>
                                  <!-- <hr>
                                  <div class="product_services">
                                    <div class="product_services_title"><h2>Services</h2></div>
                                    <div class="product_services_points">
                                      <ul class="service_Point_list">
                                        <li class="service_Point_list_item">
                                          <span class="service_icon"><img src="images/shield.png"><a href="#"> 5 Years Warranty</a></span>
                                        </li>
                                        <li class="service_Point_list_item">
                                          <span class="service_icon"><img src="images/rupee.png"> <a href="#"> Cash on Delivery Available</a></span>
                                        </li>
                                      </ul>
                                    </div>
                                  </div> -->
                                  <hr>
                                <div class="variation_section">
                                <!-- <div class="color_title">Color:</div> -->
                                <div class="item_color_quantity_section">
                                    <!-- <div class="item_color">
                                      <img src="images/earphone black.webp">
                                    </div> -->
                                    <div class="qty-container">
                                        <!-- <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button> -->
                                        <label for="">Required Quantity</label>
                                        <input type="text" name="qty" value="0" class="input-qty ml-4"/>
                                        <!-- <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button> -->
                                    </div>
                                </div>
                                </div>
                                
                                <div class="query_button_section_button">
                                    <div class="query_button_section_left_side">
                                      
                                      <div class="best_deal_button">
                                        <a class="btn btn-danger font_600 highlighted_btn" href="#" role="button"
                                                data-toggle="modal" data-target="#sellerModal">Contact Seller</a>
                                                <!-- modal start -->
                                            <!-- The Modal -->
                                            <div class="modal fade" id="sellerModal">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content bg-white">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Contact Seller</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form action="{{ url('/save_seller_contact/'.$product_detail->id) }}"
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
                                    </div>
                                </div>
                            </div>
                              
                              
                          </div>
                        </div> 
                      </div>
                      <div class="left_side_box mt-4 ml-0 mb-4">
                          <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                              <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home"><h2>Specification</h2></a>
                              </li>
                              <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1"><h2>From The Manufacturer</h2></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2"><h2>What is in the box?</h2></a>
                              </li> -->
                            </ul>
        
                            <!-- Tab panes -->
                            <div class="tab-content">
                              <div id="home" class="container tab-pane active"><br>
                                {{ $product_detail->specification }}
                              </div>
                              <!-- <div id="menu1" class="container tab-pane fade"><br>
                                <h3>Menu 1</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                              </div>
                              <div id="menu2" class="container tab-pane fade"><br>
                                <h3>Menu 2</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                              </div> -->
                            </div>
                      </div>
        
        
                  </div>
                  <div class="right_side col-lg-3">
                      <div class="right_side_box mt-4">
                          <p class="advance_deal font_14">Get the List of Top</p>
                          <p class="advance_deal font_18 color_0076d7">{{ $product_detail->category->name }}</p>
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
                              <button type="submit" class="btn btn-danger width_100_bold">Get Best Deal</button>
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

        
      @include('customer.product_footer')

      <script>
        $(".btn-group, .dropdown").hover(
                            function () {
                                $('>.dropdown-menu', this).stop(true, true).fadeIn("fast");
                                $(this).addClass('open');
                            },
                            function () {
                                $('>.dropdown-menu', this).stop(true, true).fadeOut("fast");
                                $(this).removeClass('open');
                            });
    </script>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"
        crossorigin="anonymous"></script>
     <script src="{{ asset('js/scripts/zoom-image.js') }}"></script>
     <script src="{{ asset('js/scripts/main.js') }}"></script>

     <!-- countdown -->
     <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
          // Output the result in an element with id="countdown_sale"
        //   document.getElementById("countdown_sale").innerHTML = days + "d " + hours + "h "
        //   + minutes + "m " + seconds + "s ";
            
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            // document.getElementById("countdown_sale").innerHTML = "EXPIRED";
          }
        }, 1000);
        </script>

        <!-- ------------ quantity_selection ---------- -->
        <script>
            var buttonPlus  = $(".qty-btn-plus");
            var buttonMinus = $(".qty-btn-minus");

            var incrementPlus = buttonPlus.click(function() {
            var $n = $(this)
            .parent(".qty-container")
            .find(".input-qty");
            $n.val(Number($n.val())+1 );
            });

            var incrementMinus = buttonMinus.click(function() {
            var $n = $(this)
            .parent(".qty-container")
            .find(".input-qty");
            var amount = Number($n.val());
            if (amount > 0) {
                $n.val(amount-1);
            }
            });
        </script>

        <!-- AddToAny BEGIN -->
        <script>
            var a2a_config = a2a_config || {};
            a2a_config.onclick = 1;
            </script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->
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
</body>
</html>