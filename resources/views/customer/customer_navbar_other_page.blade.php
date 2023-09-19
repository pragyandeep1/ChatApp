<nav class="navbar navbar-expand-lg navbar-light bg-yellow">
    <div class="container">
    <a class="navbar-brand" href="#"><img src="{{ asset('customer-images/header-images/Logo_white_cropped.png"></a>
        @if(Auth::check())
    <div class="eeeeeee">
      <div class="formobile">
        <div class="user_dropdown">
          <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i>
          {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
          <div class="user_dropdown-content">
          <a href="{{url('/logout')}}" ><i
        ></i> Logout</a>
          <a href="#">My Profile</a>
          <!-- <a href="#">Link 3</a> -->
          </div>
        </div>
      </div>
      <span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button></span>
    </div>
    @endif
    <div class="input-group search_input">
      <input type="text" class="form-control py-4" placeholder="What are you looking for..">
        <div class="input-group-append">
          <button class="btn btn-dark search_icon" type="button"><span class="material-symbols-outlined">search</span></button>
        </div>
    </div>
    @if(Auth::check())
    <div class="fordesktop">
      <div class="user_dropdown">
        <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i> 
        {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}
      </button>
        <div class="user_dropdown-content" style="left:0;">
        <a href="{{ url('/logout') }}" >Logout</a>
        <a href="#">My Profile</a>
        <a href="#">Link 3</a>
        </div>
      </div>
    </div>
    @endif
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Advertise with us </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#"> Free Listing </a>
        </li>
        @if(!Auth::check())
        <li class="nav-item active">
          <a class="nav-link" href="#">Login / Signup </a>
        </li>
        @endif
      </ul>
    </div>
    </div>
  </nav>