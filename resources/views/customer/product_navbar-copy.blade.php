<nav class="navbar navbar-expand-lg navbar-light bg-yellow">
    <div class="container">
        <a class="navbar-brand" href="#"><img
                src="{{ asset('customer-images/product_files/images/Logo_white.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="input-group search_input">
            <input type="text" class="form-control py-4" placeholder="What are you looking for..">
            <div class="input-group-append">
                <button class="btn btn-dark search_icon" type="button"><span
                        class="material-symbols-outlined">search</span></button>
            </div>
        </div>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Advertise with us </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/free-listing')}}"> Free Listing </a>
                </li>
                @if(Auth::check())
                <li class="nav-item active">
                {{ Auth::user()->name ?Auth::user()->name:Auth::user()->email }}
                <i class="fa fa-user" aria-hidden="true"></i>
                <!-- <a  href="{{url('/logout')}}" class="nav-link"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a> -->
                </li>
                <li class="nav-item active">
                    <a href="{{url('/logout')}}" class="nav-link">
                        <i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </li>
                @else
                <li class="nav-item active">
                    <a class="nav-link" href="#">Login / Signup </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>