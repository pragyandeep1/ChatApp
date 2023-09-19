<div class="left_side col-lg-3">
    <div class="left_side_box mt-2">
        <div class="avatar_name row mx-0">
            @if(empty(Auth::user()->profile_image))
            <img class="customor_pic" src="{{ asset('customer-images/customer-profile-images/man.png') }}">
            @else
            <img class="customor_pic" src="{{ asset('uploads/userdata/profile_image/'.Auth::user()->profile_image) }}">
            @endif
            <div class="salute_section">
                <div class="salute_avatar"> Hello,</div>
                <div class="customer_name">{{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</div>
            </div>
        </div>
    </div>
    <div class="left_side_box_section mt-2">

        <div class="horizontal_line"></div>
        <div class="left_side_box_list row mx-0">
            <div class="left_side_box_list_item">
                <div class="left_side_box_title row mx-0">
                    <img class="my_order_icon" src="{{ asset('customer-images/customer-profile-images/user-01.png') }}">
                    <div class="left_side_box_list_heading">ACCOUNT SETTING</div>
                </div>
                <div>
                    <a href="{{ url('/customer-profile-view') }}">
                        <div class="left_side_anchor_list">
                            Profile Information
                        </div>
                    </a>
                    <a href="{{ url('/customer-profile-password') }}">
                            <div class="left_side_anchor_list">
                                Change Password
                            </div>
                    </a>
                    <a href="{{ url('/wished-list-business') }}">
                        <div class="left_side_anchor_list">
                            My Favourites
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="horizontal_line"></div>

        <div class="horizontal_line"></div>

        <div class="horizontal_line"></div>
        <!-- <div class="left_side_box_list row mx-0">
                <div class="left_side_box_list_item">
                    <div class="my_order_list row mx-0">
                      <img class="my_order_icon" src="{{ asset('customer-images/customer-profile-images/Logout-01.png') }}">
                        <a class="my_orders" href="{{ url('logout') }}">Logout</a>
                    </div>
                </div>
            </div> -->
    </div>
    <div class="left_side_box_section mt-2 mb-4">
        <div class="left_side_box_list mx-0">
            <div class="left_side_box_list_item">
                <div class="frequently_visited_section">Frequently Visited</div>
                <div class="useful_links">
                    <ul>

                        <li><a href="#">Help center</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>