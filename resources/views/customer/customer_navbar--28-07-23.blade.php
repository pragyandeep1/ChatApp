<!-- Changes in the else part of search bar -->
@php  

$disp_path = $path;
 @endphp   
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

 @if(isset($path) && $path === 'homepage' || $path === '')
<link href="{{ asset('css/navbar-user.css') }}" rel="stylesheet">
@else
<link href="{{ asset('css/header.css') }}" rel="stylesheet">
@endif

@if(isset($path) && $path === 'homepage' || $path === '')
<nav class="navbar navbar-expand-lg navbar-light bg-yellow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/homepage') }}"><img
                src="{{ asset('customer-images/Logo_white.png') }}"></a>
                <!-- <form action="/action_page.php"> -->
                    <div class="input-group w-25">
                    <span class="input-group-prepend">
                        <div class="input-group-text border-right-0 drydr"><i class="material-icons">room</i></div>
                    </span>
                                
                    <button type="button" id="dropdown-button" class="btn btn-default dropdown-toggle border-left-0 border eee" data-toggle="dropdown">
                        Select Location
                    </button>
                    <div class="dropdown-menu">
                    @foreach ($cities as $city)
                        <a class="dropdown-item city-dropdown-item" href="#" data-city="{{ $city->city }}">{{ $city->city }}</a>
                    @endforeach
                    </div>
                    <!-- <span class="input-group-append">
                    <a href="#" id="location-button" class="btn btn-outline border-left-0 border www" role="button"><i class="material-icons">my_location</i></a>
                    </span> -->
                    </div>
                <!-- </form> -->
       
        @if(Auth::check())
                <div class="eeeeeee">
                    <div class="formobile">
                        <div class="user_dropdown">
                            <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
                            <div class="user_dropdown-content">
                            <a href="{{ url('/customer_profile') }}">My profile</a>
                            <a href="{{url('/logout')}}">Logout</a>
                            </div>
                        </div>
                    </div>
                    <span>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button></span>
                </div>
                <div class="fordesktop">
                    <div class="user_dropdown">
                        <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i>Welcome {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
                        <div class="user_dropdown-content" style="left:0;">
                            <a href="{{ url('/customer_profile') }}">My profile</a>
                            <a href="{{url('/logout')}}">Logout</a>
                        </div>
                    </div>
                </div>
              
                @endif
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/advertise-with-us')}}">Advertise with us </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/free-listing')}}"> Free Listing </a>
                </li>
                
                @if(!Auth::check())
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/customer-register')}}">Signup </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/userlogin')}}">Login </a>
                </li>
               @endif
            </ul>
        </div>


    </div>

</nav>
@else
<nav class="navbar navbar-expand-lg navbar-light bg-yellow ">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/homepage') }}"><img src="{{ asset('images/header-images/Logo_white_cropped.png') }}"></a>
    
    
    <div class="input-group w-auto">
      <span class="input-group-prepend">
        <div class="input-group-text border-right-0 drydr" ><i class="material-icons">room</i></div>
      </span>
                  
      <button type="submit" id="dropdown-button" class="btn btn-default dropdown-toggle border-left-0 border eee" data-toggle="dropdown">
        Select Location
      </button>
      <!-- <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Bhubaneshwar</a>
        <a class="dropdown-item" href="#">Cuttack</a>
       
      </div> -->
      <span class="input-group-append">
      <a href="#" class="btn btn-outline border-left-0 border www" id="location-button" role="button"><i class="material-icons">my_location</i></a>
    </span>
    </div>
  
  <form action="{{ url('/search') }}" method="post" id="search_res">
    @csrf
  <input type="hidden" name="city" value="" id="city">
  <div class="input-group search_input">
    <input type="text" class="form-control py-4 ml-2" id="search_name" name="search_name" placeholder="What are you looking for..">
      <div class="input-group-append">
        <button class="btn btn-dark search_icon" type="submit" id="search_btn"><span class="material-symbols-outlined">search</span></button>
      </div>
  </div>
  </form>
    <!-- <div class="input-group search_input">
      <input type="text" class="form-control py-4" placeholder="What are you looking for..">
        <div class="input-group-append">
          <button class="btn btn-dark search_icon" type="button"><span class="material-symbols-outlined">search</span></button>
        </div>
    </div> -->
    <!-- user login -->
    @if(Auth::check())
    <div class="eeeeeee">
      <div class="formobile">
        <div class="user_dropdown">
          <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
          <div class="user_dropdown-content">
          <a href="{{ url('/customer_profile') }}">My profile</a>
          <a href="{{url('/logout')}}">Logout</a>
          </div>
        </div>
      </div>
      <span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button></span>
    </div>
    
    @endif
    <!-- user login end-->
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/advertise-with-us')}}">Advertise with us </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/free-listing')}}"> Free Listing </a>
        </li>
        @if(!Auth::check())
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/userlogin')}}">Login </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/customer-register')}}">Signup </a>
        </li>
        @endif
      </ul>
    </div>
    @if(Auth::check())
    <div class="fordesktop">
      <div class="user_dropdown">
        <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
        <div class="user_dropdown-content" style="left:0;">
        <a href="{{ url('/customer_profile') }}">My profile</a>
          <a href="{{url('/logout')}}">Logout</a>
        </div>
      </div>
    </div>
    @endif
    </div>
  </nav>
  @endif