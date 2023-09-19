<!DOCTYPE html>
<html lang="en">
<head>
@section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    

    <link rel="stylesheet" href="{{ asset('css/all_product_view_style.css') }}">

</head>
<body>
@include('customer.customer_navbar')
<!-- -----------------------content------------------------ -->

<div class="service_category_section bg_grey">
  <div class="container-fluid">
      <div class="our_cat_section_heading">
          <div class="center_title">
            <h2 class="heading_styling">Product <span class="highlight_title">Cat</span>egory</h2>
            <p>We are the bridge that connects buyers and sellers in one place.</p>
          </div>
          <!-- <div class="right_side">
            <button class="button_view_all">View All</button>
          </div> -->
        </div>
  </div>
  <div class="container-fluid">
      <div class="our_cat_section_section">
      @foreach($products as $product)
        <a href="{{ url('/product/'.$product->id) }}" class="our_cat_section_box">
          <div class="our_cat_section_link">
            <h5>{{ $product->name }}</h5>
            <h6>09 Ads</h6>
            <img src="{{ asset('uploads/category/'.$product->thumbnail) }}" alt="icons">
          </div>
        </a>
        @endforeach
          
      </div>
  </div>
</div>

  
@include('customer.customer_footer')

</body>
</html>