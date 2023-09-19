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
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <script src='https://asvd.github.io/dragscroll/dragscroll.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js'></script>

    <!-- <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'> -->
    <!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700'> -->

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('customer-images/product_files/style.css') }}">
    <style>
    .sml-name {
        display: block;
        white-space: nowrap;
        /* width: 15em; */
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .unit-product {
        font-size: 15px;
    }

    #prd-name {
        color: black;
    }

    #prd-name:hover {
        text-decoration: none;
        color: #FFCD00;
    }
    </style>
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
                                    <a id="dLabel" role="button" data-toggle="dropdown"
                                        class="btn btn-primary dropdown-toggle custom_button" href="">
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
                                                <ul class="dropdown_sub_item">
                                                    <li>{{ $category_name }}</li>

                                                </ul>
                                                <!-- </div> -->
                                                @endforeach
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
                        <li class="main_list_item main_list_item_pad_left"><a href="#">Trade show</a></li> -->
                            <li class="main_list_item">
                                <div class="other_links_level_button">
                                    <div class="btn-group">
                                        <a id="dLabel" role="button" data-toggle="dropdown"
                                            class="btn btn-primary dropdown-toggle custom_button" href="">
                                            Sort By
                                        </a>
                                        <ul class="dropdown-menu main_list_button" role="menu"
                                            aria-labelledby="dropdownMenu">
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="sortData('asc')">Ascending</a></li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="sortData('desc')">Descending</a></li>
                                            <!-- <li class="dropdown-divider"></li> -->
                                            <!-- <li class="dropdown-submenu">
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
                                    </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </li>
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
    </div>
    <div class="container-custom">
        <div class="container mydiv">
            <div class="category_title">
                <h1>{{ $products->name }}</h1>
            </div>
            <div class="loading-overlay text-center" style="display: none;">
                <div class="overlay-content"><img src="{{ asset('images/loading-yellow.gif') }}" height="84px"
                        width="89px" alt="">

                </div>
            </div>
            <div class="row m-0">

                @if ($product_list->isNotEmpty())
                @foreach($product_list as $product)
                <div class="col-lg-2 col-md-2 col-sm-6 py-3 px-1">
                    <a href="{{ url('/product_detail/'.$product->id)}}">

                        <!-- start -->
                        <!-- end -->
                        <div class="product_box">
                            @if ($product->created_at >= now()->subDays(2))
                            <div class="product_badge">
                                Just Launched
                            </div>
                            @endif
                            <div class="product_thumbnail">
                                <img class="product_thumbnail_image"
                                    src="{{ asset('uploads/product/'.$product->image) }}">
                            </div>
                            <div class="product_title_div">
                                <span class="product_title">
                                    <a href="{{ url('/product_detail/'.$product->id)}}" id="prd-name"
                                        class="sml-name">{{ $product->product_title }}</a>

                                </span>
                            </div>
                            <div class="minimum_price_section">
                                @php
                                $unit = str_replace('per', '/', $product->unit);
                                @endphp
                                <span class="minimum_price">
                                    <span class="rs_symbol">₹</span>
                                    <span>{{ $product->price }} </span>
                                    <span class="unit-product">{{ $unit }}</span>

                                </span>
                                <div class="discount_section">
                                    <!-- <span class="actual_price">₹{{ $product->price }}</span> -->
                                    <!-- <span class="discount_percent">50%</span> -->
                                </div>
                                <div class="product_left">
                                    <!-- <span>5 pieces left</span> -->
                                </div>
                                <div class="lead_time">
                                    <!-- <span> 7 days lead time</span> -->
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @else
                <div class="nodata_found" style="background-color: white;">
                    <img src="{{ asset('customer-images/1920 x 400-01.png') }}" alt="No Data" class="img-fluid">
                    <!-- <img src="{{ asset('customer-images/no-result-01.jpg') }}" alt="No Data" class="img-fluid"> -->

                </div>
                @endif
            </div>
        </div>
    </div>

    @include('customer.product_footer')

    <script>
    $(".btn-group, .dropdown").hover(
        function() {
            $('>.dropdown-menu', this).stop(true, true).fadeIn("fast");
            $(this).addClass('open');
        },
        function() {
            $('>.dropdown-menu', this).stop(true, true).fadeOut("fast");
            $(this).removeClass('open');
        });
    </script>

    <script>
    function sortData(order) {
        var currentUrl = window.location.href;
        var number = currentUrl.split('/').pop();
        $.ajax({
            url: "{{ route('sort_product', '') }}/" + order,
            type: "GET",
            data: {
                cat_id: number
            },
            beforeSend: function(){
                $('.loading-overlay').show();
            },
            success: function(response) {
                $('.loading-overlay').hide();
                console.log(response);
                var product_list = response.product_list;
                // var product_list = response.seller_infos;
                var category = response.category;
                console.log(product_list);
                $('.row.m-0').empty();
                product_list.forEach(function(product) {
                    var imageUrl = "{{ asset('uploads/product/') }}" + '/' + product.image;
                    var unit = product.unit.replace('per', '/');
    // Append the new data to your existing content dynamically
    var html = `
    <div class="col-lg-2 col-md-2 col-sm-6 py-3 px-1">
        <a href="/product_detail/${product.id}">
            <div class="product_box">
                ${product.created_at >= new Date(Date.now() - (2 * 24 * 60 * 60 * 1000)) ? '<div class="product_badge">Just Launched</div>' : ''}
                <div class="product_thumbnail">
                    <img class="product_thumbnail_image" src="${imageUrl}">
                </div>
                <div class="product_title_div">
                    <span class="product_title">
                        <a href="/product_detail/${product.id}" id="prd-name" class="sml-name">${product.product_title}</a>
                    </span>
                </div>
                <div class="minimum_price_section">
                    <span class="minimum_price">
                        <span class="rs_symbol">₹</span>
                        <span>${product.price}</span>
                        <span class="unit-product">${unit}</span>
                    </span>
                    
                </div>
            </div>
        </a>
    </div>
    `;

    
    $('.row.m-0').append(html);
});
                
                
            },
            error: function(xhr, status, error) {
                // Handle the error
            }
        });
    }
    </script>
</body>

</html>