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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->






    <script src="https://code.jquery.com/jquery-2.1.1.js"></script>
    <script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
    <script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/customer-style.css') }}">
    <style>
      .hide{
        display: none;
      }
    </style>
</head>

<body>
    @include('customer.customer_navbar')

    <div class="container-custom">
        <div class="container">
            <div class="result_section_area row">
                <div class="left_side @if (auth()->check()) col-lg-3 @else hide @endif">
                    <div class="left_side_box mt-2">
                        <div class="avatar_name row mx-0">
                            <img class="customor_pic"
                                src="{{ asset('customer-images/customer-profile-images/man.png') }}">
                            <div class="salute_section">
                                <div class="salute_avatar"> Hello,</div>
                                <div class="customer_name">
                                    @if (auth()->check())
                                    @if (auth()->user()->name)
                                    {{ auth()->user()->name }}
                                    @else
                                    {{ auth()->user()->email }}
                                    @endif


                                    @endif







                                    {{-- Auth::user()->name ? Auth::user()->name:Auth::user()->email --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left_side_box_section mt-2">
                        <!-- <div class="left_side_box_list row mx-0">
                  <div class="left_side_box_list_item">
                      <div class="my_order_list row mx-0">
                        <img class="my_order_icon" src="{{ asset('customer-images/customer-profile-images/order-01.png') }}">
                          <a class="my_orders" href="#">
                            MY ORDERS
                            <span class="right_fa_icon">
                              <i class="fa fa-angle-right"></i>
                            </span>
                          </a>
                      </div>
                  </div>
              </div> -->
                        <div class="horizontal_line"></div>
                        <!-- <div class="left_side_box_list row mx-0">
                    <div class="left_side_box_list_item">
                        <div class="left_side_box_title row mx-0">
                          <img class="my_order_icon" src="{{ asset('customer-images/customer-profile-images/user-01.png') }}">
                                <div class="left_side_box_list_heading">ACCOUNT SETTING</div>
                        </div>
                    <div>
                        <a href="#">
                            <div class="left_side_anchor_list">
                                Profile Information
                          </div>
                        </a>
                        <a href="#">
                            <div class="left_side_anchor_list">
                                Manage Addresses
                          </div>
                        </a>
                        <a href="#">
                            <div class="left_side_anchor_list">
                                PAN Card Information
                          </div>
                        </a></div>
                        </div>
            </div> -->
                        <div class="horizontal_line"></div>
                        <!-- <div class="left_side_box_list row mx-0">
                    <div class="left_side_box_list_item">
                        <div class="left_side_box_title row mx-0">
                          <img class="my_order_icon" src="{{ asset('customer-images/customer-profile-images/wallet-01.png') }}">
                                <div class="left_side_box_list_heading">PAYMENTS</div>
                        </div>
                        <div>
                          <a href="#">
                              <div class="left_side_anchor_list">Gift Cards</div>
                          </a>
                          <a href="#">
                              <div class="left_side_anchor_list">Saved UPI</div>
                          </a>
                          <a href="#">
                              <div class="left_side_anchor_list">Saved Cards</div>
                          </a>
                        </div>
                    </div>
            </div> -->
                        <div class="horizontal_line"></div>
                        <!-- <div class="left_side_box_list row mx-0">
                    <div class="left_side_box_list_item">
                        <div class="left_side_box_title row mx-0">
                          <img class="my_order_icon" src="{{ asset('customer-images/customer-profile-images/My Stuff-01.png') }}">
                                <div class="left_side_box_list_heading">MY STUFF</div>
                        </div>
                        <div>
                          <a href="#">
                              <div class="left_side_anchor_list">My Coupons</div>
                          </a>
                          <a href="#">
                              <div class="left_side_anchor_list">My Reviews &amp; Ratings</div>
                          </a>
                          <a href="#">
                              <div class="left_side_anchor_list">All Notifications</div>
                          </a><a href="#">
                              <div class="left_side_anchor_list">My Wishlist</div>
                          </a>
                        </div>
                    </div>
            </div> -->
                        <div class="horizontal_line"></div>
                        <div class="left_side_box_list row mx-0">
                            <div class="left_side_box_list_item">
                                <div class="my_order_list row mx-0">
                                    <img class="my_order_icon"
                                        src="{{ asset('customer-images/customer-profile-images/Logout-01.png') }}">
                                    <a class="my_orders" href="{{ url('logout') }}">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left_side_box_section mt-2 mb-4">
                        <div class="left_side_box_list mx-0">
                            <div class="left_side_box_list_item">
                                <div class="frequently_visited_section">Frequently Visited</div>
                                <div class="useful_links">
                                    <ul>
                                        <!-- <li><a href="#">Track Order</a></li> -->
                                        <li><a href="#">Help center</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right_side @if (auth()->check()) col-lg-9 @else col-lg-12 @endif">
                    <div class="right_side_box mt-2 ml-0">
                        <div class="title_section">
                            <img src="{{ asset('customer-images/customer-profile-images/Untitled-3.png') }}" alt=""
                                style="width: 100%;">
                            <h1>About us</h1>
                        </div>
                        <div class="profile_body_section">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged. It was popularised in the 1960s with the release of
                                Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('customer.customer_footer')
    @include('customer.search_bar_all_page')

</body>

</html>