@php
$user_id = Auth::user()->id;
$user_type = Auth::user()->user_type;
$user = \App\Models\User::where('id',$user_id)->where('user_type','seller')->first();
$admin = \App\Models\User::where('id',$user_id)->where('user_type','admin')->first();

$seller = Auth::user()->name;
$seller_email = Auth::user()->email;
$mobile = Auth::user()->mobile;
$seller_info =
\App\Models\Sellerinfo::where('email',$seller_email)->orWhere('company_name',$seller)->orWhere('phone',$mobile)->first();
$today = date('Y-m-d');

if($admin){
$call_back_count = \App\Models\Callback_enquiry::where('history_status',0)->count();
$service_enquiry_count = \App\Models\Service_enquiry::where('history_status',0)->count();
$liked_service = \App\Models\Likedservice::where('history_status',0)->count();
$chat_messages_count = \App\Models\ChatMessage::where('history_status',0)->whereDate('created_at', $today)->distinct('seller_name')->count();
$best_deal_count = \App\Models\ProspectLead::where('history_status',0)->count();
}
else{
$seller_call_back_count = \App\Models\Callback_enquiry::where('seller_id',$seller_info->id)->where('history_status',0)->count();
$seller_service_enquiry_count = \App\Models\Service_enquiry::where('seller_id',$seller_info->id)->where('history_status',0)->count();
$seller_liked_service = \App\Models\Likedservice::where('service_id',$seller_info->id)->where('history_status',0)->count();
$seller_chat_messages_count = \App\Models\ChatMessage::whereDate('created_at',$today)->where('seller_id',$seller_info->id)->distinct('seller_name')->where('history_status',0)->count();
$seller_best_deal_count = \App\Models\ProspectLead::where('seller_id',$seller_info->id)->where('history_status',0)->count();
}





@endphp
@include('layouts.admin_layout.head-main')

<head>

    @section('title') {{'BusinessOdisha'}} @endsection

    @include('layouts.admin_layout.head')

    @include('layouts.admin_layout.head-style')

</head>


<!-- Begin page -->
<body data-topbar="dark">
<div id="layout-wrapper">

@include('layouts.admin_layout.menu')

    
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?php
                $maintitle = "Ecommerce";
                $title = "Dashboard";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                    
                        <div class="card">
                        @if (Auth::check() && !Auth::user()->is_admin )
                            <div class="card-body">                            
                          
                                    
                                    <div class="row" >
                                        <div class="col-12">
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                A fresh verification link has been sent to your email address.
                                            </div>
                                        @endif
                                        
                                            <div class="text-sm-center">
                                                Before proceeding, please check your email for a verification link. If you did not receive the email,
                                                    <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="d-inline btn btn-link p-0">
                                                            click here to request another
                                                        </button>.
                                                    </form>
                                            </div>
                                           
                                        </div>
                                    </div> 
                               
                                
                            </div>
                            @endif
                        </div>

                            <div class="body flex-grow-1 px-3">
                                <div class="container-lg">
                                    <div class="row">

                                        @if($admin)
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-info">
                                                <a href="{{url('call-me-back')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Call Me Back</p>
                                                                <h2 class="text-white">{{ $call_back_count }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-phone fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-info">
                                                <a href="{{url('seller-call-me-back')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Call Me Back</p>
                                                                <h2 class="text-white">{{$seller_call_back_count}}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-phone fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endif

                                        @if($admin)
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-warning">
                                                <a href="{{url('service-enquiry')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Seller Enquiry</p>
                                                                <h2 class="text-white">{{ $service_enquiry_count }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-user fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-warning">
                                                <a href="{{url('seller-service-enquiry')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Seller Enquiry</p>
                                                                <h2 class="text-white">
                                                                    {{ $seller_service_enquiry_count }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-user fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endif

                                        @if($admin)
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-danger">
                                                <a href="{{ url('liked-service')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Liked Services</p>
                                                                <h2 class="text-white">{{ $liked_service }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-heart fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-danger">
                                                <a href="{{ url('seller-liked-service')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Liked Services</p>
                                                                <h2 class="text-white">{{ $seller_liked_service }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-heart fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endif

                                        @if($admin)
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-secondary">
                                                <a href="{{ url('chat-enquiry')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Today Chat Enquiry</p>
                                                                <h2 class="text-white">{{ $chat_messages_count }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-comments  fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-secondary">
                                                <a href="{{ url('seller-chat-enquiry')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Today Chat Enquiry</p>
                                                                <h2 class="text-white">
                                                                    {{ $seller_chat_messages_count }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-comments fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endif

                                        @if($admin)
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-primary">
                                                <a href="{{ url('best-deal')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Best Deal</p>
                                                                <h2 class="text-white">{{ $best_deal_count }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-tags  fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card widget-box-two bg-primary">
                                                <a href="{{ url('seller-best-deal')}}">
                                                    <div class="card-body">
                                                        <div class="media">
                                                            <div class="media-body wigdet-two-content">
                                                                <p class="m-0 text-uppercase text-white"
                                                                    title="Statistics">Best Deal</p>
                                                                <h2 class="text-white">
                                                                    {{ $seller_best_deal_count }}<i
                                                                        class="mdi mdi-arrow-up text-white font-22"></i>
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                                <i class="fa fa-tags fa-2x"
                                                                    style="margin:18px 0 0 20px; color:white"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- end row -->




            </div>
                  
                    
                     <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('layouts.admin_layout.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('layouts.admin_layout.right-sidebar') 
@include('layouts.admin_layout.vendor-scripts')

</body>

</html>