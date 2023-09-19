<link href="{{ asset('css/navbar-user.css') }}" rel="stylesheet">
<nav class="navbar navbar-expand-lg navbar-light bg-yellow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/homepage') }}"><img
                src="{{ asset('customer-images/Logo_white.png') }}"></a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->
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
                        <button class="user_dropbtn"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}</button>
                        <div class="user_dropdown-content" style="left:0;">
                            <a href="{{ url('/customer_profile') }}">My profile</a>
                            <a href="{{url('/logout')}}">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- <li class="nav-item active">

                    <i class="fa fa-user" aria-hidden="true"></i>

                </li>
                <li class="nav-item active">
                    <a href="" class="nav-link">
                        <i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </li> -->
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
                    <a class="nav-link" href="{{ url('/customer-register')}}">Login / Signup </a>
                </li>
                @endif
            </ul>
        </div>


    </div>

</nav>