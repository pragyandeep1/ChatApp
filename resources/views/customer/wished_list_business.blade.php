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
    /* favourites start */
    .card {
        display: grid;
        grid-template-columns: 1fr auto;
        /* One column for the card content, one for the delete button */
        column-gap: 20px;
        /* Adjust the gap between the columns as needed */
        align-items: center;
        /* border: 1px solid #ccc; */
        border-radius: 5px;
        overflow: hidden;
        padding: 10px;
    }

    .card-content {
        display: flex;
        align-items: center;
    }

    .card-img-top {
        width: 20%;
        /* Set the image width to 50% for a middle size */
        display: block;
        /* Center the image horizontally */
        margin-right: 10px;
        /* Add some spacing between the image and text */
    }

    .card-title {
        font-weight: bold;
        margin: 0;
        /* Remove default margin for the card title */
    }

    .card-text {
        margin: 0;
    }

    /* Styling for delete button */
    .delete-button {
        text-align: center;
    }

    .delete-button button {
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
    }

    /* Make the delete button clickable */
    .delete-button button:hover {
        background-color: darkred;
    }



    /* favourites end */


    /* password match start */
    #passwordIcon {
        position: absolute;
        top: 71%;
        right: 15px;
        transform: translateY(-50%);
    }

    #passwordIcon.fa-times::before {
        content: "\f00d";
        color: red;
    }

    #passwordIcon.fa-check::before {
        content: "\f00c";
        color: green;
    }

    .star-mark {
        color: red;
    }

    /* password match end */
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
    </style>
</head>

<body>
    @include('customer.customer_navbar')
    <!-- <div class="container rounded bg-white mt-5 mb-5">
    
</div> -->
    <!-- Code start  -->
    <div class="container-custom">
        <div class="container">
            <div class="result_section_area row">
                @include('customer.customer-sidebar')
                <div class="right_side col-lg-9">
                    <div class="right_side_box mt-2 ml-0">
                        <!-- <div class="title_section">
                <img src="{{ asset('customer-images/customer-profile-images/Untitled-3.png') }}" alt="" style="width: 100%;">
                <h1>About us</h1>
              </div> -->
                        <div class="profile_body_section">
                            <div class="row">
                                <!-- <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
               
                <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                <span class="text-black-50">{{ Auth::user()->email }}</span>
                <span> </span>
            </div>
        </div> -->
                                <div class="col-md-12 border-right">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">My Favourites</h4>
                                        </div>

                                    </div>
                                </div>
                                @if($count > 0)
                                        @foreach ($wished as $likedService)
                                           
                                                    <div class="card">
                                                    <div class="card-body">
                                                        <div class="card-content">
                                                        <!-- https://codingyaar.com/wp-content/uploads/bootstrap-4-card-image-left-demo-image.jpg -->
                                                        @php 
                                                        $image_seller = '';
                                                        if($likedService->sellerInfo->image)
                                                         $image_seller = $likedService->sellerInfo->image;
                                                        else
                                                        $image_seller = 'no-image-new.jpg';
                                                        
                                                        @endphp
                                                            <img src="{{ asset('uploads/userdata/'.$image_seller) }}"
                                                                class="card-img-top" />
                                                            <div class="text-content">
                                                                <h5 class="card-title">{{ optional($likedService->sellerInfo)->company_name }}</h5>
                                                                <p class="card-text">
                                                                {{ optional($likedService->sellerInfo)->full_address }}
                                                                </p>
                                                                <a href="{{ url('/service-detail/'.$likedService->service_id)}}" class="btn btn-primary">View</a>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="delete-button" >
                                                    <form action="{{ url('wishlist-delete/'.$likedService->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger show_confirm fa fa-solid fa-trash fa-2x"></button>
                                                    <!-- <i class="fa fa-solid fa-trash fa-3x" aria-hidden="true"></i> -->
                                                    </form>
                                                    </div>
                                                    </div>
                                    
                                    

                                            @endforeach
                                            @else
                                            <p>No favourites</p>
                                            @endif
                                       
                                    {{ $wished->links() }}
                                
                                <!-- <div class="card">
                                    <div class="card-body">
                                        <div class="card-content">
                                            <img src="https://codingyaar.com/wp-content/uploads/bootstrap-4-card-image-left-demo-image.jpg"
                                                class="card-img-top" />
                                            <div class="text-content">
                                                <h5 class="card-title">Card Title</h5>
                                                <p class="card-text">
                                                    Some quick example text to build on the card title and make up the
                                                    bulk of the card's content.
                                                </p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="delete-button" >
                                    <i class="fa fa-solid fa-trash fa-3x" aria-hidden="true"></i>
                                    </div>
                                </div> -->



                                <!-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Code end -->
    @include('customer.customer_footer')
    @include('customer.search_bar_all_page')
    
    <script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>
</body>

</html>