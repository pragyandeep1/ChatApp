@php
$user_id = Auth::user()->id;
$user = \App\Models\User::where('id',$user_id)->where('user_type','seller')->first();
@endphp
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" data-key="t-menu"></li>

            <li>
                <a href="{{ url('/dashboard') }}">
                    <i data-feather="home"></i>
                    <!-- <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span> -->
                    <span data-key="t-dashboard"></span>
                </a>
            </li>

            <li class="menu-title" data-key="t-apps"> </li>
            
            @canany('Seller Access')
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="users"></i>
                    <span data-key="t-ecommerce">Seller Registration</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/add-seller') }}" key="t-products">Add </a></li>
                    <li><a href="{{ url('/list-seller') }}" data-key="t-product-detail"> List Sellers</a></li>
                    
                </ul>
            </li>
            @endcanany
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="users"></i>
                    <span data-key="t-ecommerce">User Profile</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/profile_list') }}" key="t-products">Update Profile</a></li>
                    
                </ul>
            </li>
            @canany('Master Management')
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="list"></i>
                    <span data-key="t-ecommerce"> Master </span>
                </a>
                
                <ul class="sub-menu" aria-expanded="false">
                    @canany('Category Access')
                        <li><a href="{{ url('/list-category') }}" data-key="t-product-detail"> Add Category</a></li>
                    @endcanany
                    @canany('City Access')
                        <li><a href="{{ url('/list-city') }}" data-key="t-product-detail"> Add City</a></li>
                    @endcanany
                    @canany('Role access')
                    <li><a href="{{ route('roles.index') }}" data-key="t-product-detail"> Manage Role</a></li>
                    @endcanany
                    @canany('Permission access')
                    <li><a href="{{ route('permissions.index') }}" data-key="t-product-detail"> Manage Permission</a></li>
                    @endcanany
                    @canany('User access')
                    <li><a href="{{ route('users.index') }}" data-key="t-product-detail"> Manage Users</a></li>
                    @endcanany
                    
                    
                   
                   
                    
                </ul>
               
            </li>
            @endcanany

            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="shopping-cart"></i>
                    <span data-key="t-ecommerce">Service</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    @canany('Service access')
                    <li><a href="{{ url('/add-product-service') }}" key="t-products">Add </a></li>
                    <li><a href="{{ url('/list-service') }}" data-key="t-product-detail"> List Services</a></li>
                    @endcanany
                   
                    @php 
                     $user_id = Auth::user()->id;
                    @endphp
                     @can('Edit Service')
                    <li><a href="{{ url('seller-service-edit/'.$user_id) }}" key="t-products">Edit Service </a></li>
                    @endcan                   
                    
                    
                </ul>
            </li>

            @canany('Callback Request')
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="mail"></i>
                    <span data-key="t-ecommerce">Callback Request</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/callback-list') }}" key="t-products">Call back list of product</a></li>
                    <li><a href="{{ url('/enquiry-list') }}" key="t-products">Enquiry list of service</a></li>
                    <!-- <li><a href="{{ url('/seller-enquiry-list') }}" key="t-products">Seller Enquiry list of product</a></li> -->
                    <li><a href="{{ url('/claim-list') }}" key="t-products">Claim Request List</a></li>
                    <li><a href="{{ url('/ratings') }}" key="t-products">Rating List</a></li>
                    
                    
                </ul>
            </li>
            @endcanany
            @canany('User access')
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="settings"></i>
                    <span data-key="t-ecommerce">Manage Settings</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/list-trending_services') }}" key="t-products">Trending Services</a></li>
                    <li><a href="{{ url('/admanagement') }}" key="t-products">Ad management</a></li>
                    
                    
                </ul>
            </li>
            @endcanany
            @canany('Promotion access')
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="settings"></i>
                    <span data-key="t-ecommerce">Manage Promotion</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <!-- <li><a href="{{ url('/list-promotions') }}" key="t-products">Promotion List</a></li> -->
                    <li><a href="{{ url('/list-promotion-package') }}" key="t-products">Promotion List</a></li>
                    
                    
                </ul>
            </li>
            @endcanany
            <!-- <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="heart"></i>
                    <span data-key="t-ecommerce">Wishlisted Service</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/wished-list-business') }}" key="t-products">Wishlisted Service</a></li>
                    
                    
                </ul>
            </li> -->
            @canany('Manage Email Setting')
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="mail"></i>
                    <span data-key="t-ecommerce">Email Send Settings</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ url('/email-send-settings') }}" key="t-products">Email Send Settings</a></li>
                    
                    
                </ul>
            </li>
            @endcanany
<!-- chatbot start -->
@if($user)
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="message-square"></i>
                    <span data-key="t-ecommerce">ChatBox List</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('chatbox') }}" key="t-products">ChatBox </a></li>

                </ul>
            </li>
            @endif
<!-- chatbot end -->
        </ul>
        
        <!-- <div class="card sidebar-alert shadow-none text-center mx-4 mb-0 mt-5">
            <div class="card-body">
                <img src="{{ asset('images/admin_login_images/giftbox.png')}}" alt="">
                <div class="mt-4">
                    <h5 class="alertcard-title font-size-16"> </h5>
                    <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.
                    </p>
                    <a href="#!" class="btn btn-primary mt-2"> </a>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Sidebar -->
</div>
</div>