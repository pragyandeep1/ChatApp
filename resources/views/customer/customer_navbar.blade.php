<?php $disp_path = $path; ?>  
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

 @if(isset($path) && $path === 'homepage' || $path === '')
<link href="{{ asset('css/navbar-user.css') }}" rel="stylesheet">
@else
<link href="{{ asset('css/header.css') }}" rel="stylesheet">

<style>
  /* Autocomplete start  */
  #autocomplete-suggestions {
      position: absolute;
    z-index: 9755;
    background-color: #fff;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    max-height: 200px;
    overflow-y: auto;
    top: 65px;
    left: 362px;
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
@endif

@if(isset($path) && $path === 'homepage' || $path === '')
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 1px #d4d4d4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('customer-images/Logo_white.svg') }}">
        </a>       
        @if(Auth::check())
                <div>
                    <div class="formobile">
                        <div class="user_dropdown">
                            <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
                            <div class="user_dropdown-content">
                              @if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'seller')                              
                            <a href="{{ url('/profile_list') }}">My profile</a>
                            @endif
                            @if(Auth::user()->user_type == 'customer')
                            <a href="{{ url('/customer_profile') }}">My profile</a>
                            @endif
                            <a href="{{url('/logout')}}">Logout</a>
                            </div>
                        </div>
                    </div>
                    <span>
                        <button class="navbar-toggler d-flex d-lg-none ml-auto collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      </span>
                </div>
                <div class="fordesktop">
                    <div class="user_dropdown">
                        <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i>Welcome {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
                        <div class="user_dropdown-content">
                        @if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'seller')                              
                            <a href="{{ url('/profile_list') }}">My profile</a>
                            @endif
                            @if(Auth::user()->user_type == 'customer')
                            <a href="{{ url('/customer_profile') }}">My profile</a>
                            @endif
                            <a href="{{url('/logout')}}">Logout</a>
                        </div>
                    </div>
                </div>
                @endif
       <button class="navbar-toggler d-flex d-lg-none ml-auto collapsed" type="button" id="menuicon" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto" id="mobilemenu">
          <li class="nav-item active">
            <a class="nav-link js-scroll-trigger text-uppercase font-weight-bold" href="{{ url('/advertise-with-us')}}" id="navredirect">Advertise with us </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link js-scroll-trigger text-uppercase font-weight-bold" href="{{ url('/business-listing')}}" id="navredirect"> Business Listing </a>
          </li>

          @if(!Auth::check())
          <li class="nav-item active mx-2">
            <a class="nav-link js-scroll-trigger" href="#">Get App 
              <img src="{{ asset('customer-images/android.svg') }}" id="app">
              <img src="{{ asset('customer-images/apple.svg') }}" id="app">
            </a>
          </li>
          <li class="nav-item active">
            <input type="button" name="signup" class="nav-link js-scroll-trigger text-light bg-blue font-weight-bold" id="navbtn" value="Sign In/Up" onclick="window.location.href='{{ url('/userlogin')}}'">
          </li>
          @endif
        </ul>
      </div>


    </div>

</nav>
@else
<nav class="navbar navbar-expand-lg navbar-light bg-blue ">
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/header-images/Logo_white_cropped.png') }}"></a>    
    
    <div class="input-group">
      <span class="input-group-prepend">
        <div class="input-group-text" style="background: #ffcc04"><i class="material-icons">room</i></div>
      </span>
                  
      <button type="submit" id="dropdown-button" class="btn btn-default dropdown-toggle border-left-0 border eee" data-toggle="dropdown">
        Select Location
      </button>
      <div class="dropdown-menu">
        @foreach ($cities as $city)
            <a class="dropdown-item city-dropdown-item" href="#" data-city="{{ $city->city }}">{{ $city->city }}</a>
        @endforeach
      </div>
    </div>
  
  <form action="{{ url('/search') }}" method="get" id="search_res">
    @csrf
  <input type="hidden" name="city" value="" id="city">
  <div class="input-group search_input">
    <input type="text" class="form-control py-4 ml-2" id="search_name" name="search_name" placeholder="What are you looking for..">
      <div class="input-group-append">
        <button class="btn btn-dark search_icon" type="submit" id="search_btn"><span class="material-symbols-outlined">search</span></button>
      </div>
  </div>
  <div id="autocomplete-suggestions"></div>
  <!-- this will add whether search comes from auto suggestion or by typing -->
  <input type="hidden" id="input_type" name="input_type" value="">
  </form>
  
    <!-- user login -->
    @if(Auth::check())
    <div class="eeeeeee">
      <div class="formobile">
        <div class="user_dropdown">
          <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
          <div class="user_dropdown-content">
          @if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'seller')                              
                            <a href="{{ url('/profile_list') }}">My profile</a>
                            @endif
                            @if(Auth::user()->user_type == 'customer')
                            <a href="{{ url('/customer_profile') }}">My profile</a>
                            @endif
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
    <div class="collapse navbar-collapse justify-content-end not-active" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/advertise-with-us')}}">Advertise with us </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/business-listing')}}"> Free Listing </a>
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
        @if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'seller')                              
                            <a href="{{ url('/profile_list') }}">My profile</a>
                            @endif
                            @if(Auth::user()->user_type == 'customer')
                            <a href="{{ url('/customer_profile') }}">My profile</a>
                            @endif
          <a href="{{url('/logout')}}">Logout</a>
        </div>
      </div>
    </div>
    @endif
    </div>
  </nav>
  
  @endif

  <script type="text/javascript">
  function mobileMenu() {
    if (document.getElementById('mobilemenu').style.display == 'block') {
      document.getElementById('mobilemenu').style.display = 'none';
    } else {
      document.getElementById('mobilemenu').style.display = 'block';
    }
  }

  document.getElementById('menuicon').addEventListener('click', mobileMenu);

  function resetMenu() {
    if (window.innerWidth >= 900) {
      document.getElementById('mobilemenu').style.display = 'flex';
    } else if (window.innerWidth < 900) {
      document.getElementById('mobilemenu').style.display = 'none';
    }
  }

  window.addEventListener('resize', resetMenu);
  
  // Initial check when the page loads
  resetMenu();
</script>