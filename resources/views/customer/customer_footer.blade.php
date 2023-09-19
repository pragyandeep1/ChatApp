<!-- chatbot code start -->
@php
$user = Auth::user();
$current_uri_id = request()->segment(2);
$seller_data = \App\Models\Sellerinfo::where('id', $current_uri_id)->first();

$chat_conservation = [];

if ($user && $seller_data) {
    $user_id = $user->id;

    $chat_conservation = \App\Models\ChatMessage::where('seller_id', $seller_data->id)
        ->where('user_id', $user_id)
        ->get();
}
@endphp
<!-- chatbot code end -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('css/footer.css') }}">
      
<!-- <div class="container">
          <div class="footer_top_section">
          <div id="barr" class="text-light text-uppercase pt-2">Back to Top
                    <img src="{{ asset('customer-images/ion_chevron-back-outline.svg') }}">
                </div>
            </div>
</div> -->

<div class="footer_section">

              
        <div class="container" style="margin-top: 300px">
       
        @include('customer._popular_searches', ['popularSearches' => $popularSearches])
        </div>
        <div class="footer_top_section"><a href="#top-body" style="text-decoration:none">
        <div id="batotop" class="text-light text-uppercase pt-2" style="background-color:#5448cb;display:block;width: 100%;height: 50px;text-align:center;bottom:20px;">
        Back to Top
        <img src="{{ asset('customer-images/ion_chevron-back-outline.svg') }}">
        </div>  </a>     
        </div>

        <div class="footer_center_section py-5">
            <div class="container">
                <div class="row footer_center_part_1">
                    <div class="col-sm-2">
                        <div class="about_box" style="text-align: center;">
                            <img src="{{ asset('customer-images/Logo_white.svg') }}" style="
                            width: 135px !important; height: 40px !important; flex-shrink: 0;">
                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="popular_city">
                            <h4>Popular City</h4>
                            <div class="c_text">
                                Bhubaneswar
                            </div>
                            <div class="c_text">
                                Puri
                            </div>
                            <div class="c_text">
                                Cuttack 
                            </div>
                            <div class="c_text">
                                Berhampur
                            </div>
                            <div class="c_text">
                                Angul
                            </div>
                            <div class="c_text">
                                Rourkela 
                            </div>
                            <div class="c_text">
                                Jaipur
                            </div>
                            <div class="c_text">
                                Keonjhar 
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="get_know">
                            <h4>Get To Know Us</h4>
                            <ul class="a_text"> 
                               <li>
                                    <a href="{{ url('/contact_us') }}">Contact Us</a>
                                </li>
                               <li>
                                    <a href="{{ url('/about_us') }}">About Us</a>
                                </li> 
                               <li>
                                    <a href="#">Career</a>
                                </li> 
                               <li>
                                    <a href="{{ url('/faq') }}">Commercial Ads</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="customer_profile">
                            <h4>Customer Profile</h4>
                            <ul class="a_text">
                               <li>
                                    <a href="{{ url('/seller-register') }}">Seller Login</a>
                                </li> 
                               <li>
                                    <a href="{{ url('/customer-register') }}">Customer Login</a>
                                </li>
                            </ul>

                            <h4>Connect With Us</h4>
                            <div class="b_text">
                                  <a href="#" target="_blank">
                                     <img src="{{asset('customer-images/instagram.svg')}}">
                                  </a>
                                  <a href="#" target="_blank">
                                     <img src="{{asset('customer-images/twitter.svg')}}"> 
                                  </a>
                                  <a href="#" target="_blank">
                                     <img src="{{asset('customer-images/facebook.svg')}}"> 
                                  </a>
                                  <a href="#" target="_blank">
                                     <img src="{{asset('customer-images/linkedin.svg')}}">
                                  </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="mail_us">
                            <h4>Mail To Us</h4>
                            <div class="d-flex mb-1">
                                <div class="d_icon">
                                    <img src="{{asset('customer-images/call.svg')}}">
                                </div>
                                <div class="d_text">
                                    +91 93484 56544 
                                </div>
                            </div>
                            <div class="d-flex mb-1">
                                <div class="d_icon">
                                    <img src="{{asset('customer-images/message.svg')}}">
                                </div>
                                <div class="d_text">
                                    info@businessodisha.com
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="mail_us" style="position: absolute; right: 0; bottom: 0; cursor: pointer;" onclik="window.location.href='{{ url('/userlogin')}}'">
                            <img src="{{asset('customer-images/chat.svg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom_section">
            <div class="footer_bottom_part-2">
                <div class="footer-bottom">
                    <div class="container" style="background: #CDC9FB;">
                    <div class="copyright" style="padding-left: 15%; padding-right: 15%">
                      <div class="row">
                      <div class="col-md-6">
                      <div class="copyright-text">
                      <p class="mb-0">All Copyrights Reserved © 2023 - Business Odisha.</p>
                      </div>
                      </div>
                      <div class="col-md-6">
                      
                      <div class="copyright-menu">
                      <ul class="policy-menu">
                       <li>
                      <a href="{{ url('/privacy') }}">Terms of Use </a>
                      </li> 
                      <li>
                      <a href="{{ url('/privacy') }}">Privacy </a>
                      </li>
                      <li>
                      <a href="{{ url('/faq') }}">FAQ </a>
                      </li>
                      <li>
                      <a href="{{ url('/terms') }}">Site Map</a>
                      </li>
                      <li>
                      <a href="{{ url('/terms') }}">Disclaimers</a>
                      </li>
                      </ul>
                      </div>
                      
                      </div>
                      </div>
                      </div>
                      </div>
                  </div>
            </div>

        </div>

    </div>

    

    <!-- chatbot code start -->
    @php 
    $current_uri = request()->segment(1);
    
    @endphp
    @if($current_uri == 'service-detail')
   
    @if(Auth::check())
    <a href="#" id="chat_ikn"><img src="https://bizodisha.online/public/images/live-chat_128.png" /></a>
    <div id="chat-popup">
    <a class="chat_close" href="#">X</a>
    <div id="chat_header">Chat with Seller</div>
    <div id="chat_body">
    
        <div id="message_content">
            @foreach($chat_conservation as $i=>$data)
                @if($data->position =='right')
                <div class="message-container left">
                    <small>{{ $data->seller_name }}</small>
                    <div class="msg_block">{{ $data->message }}</div>
                    <h5 style="text-align: right; font-size: 8px; margin: auto;">{{ date('h:i
    a',strtotime($data->created_at)) }}</h5>
                </div>
                @endif

                @if($data->position =='left')
                <div class="message-container right">
                    <small>{{ Auth::user()->name }}</small>
                    <div class="msg_block">{{ $data->message }}</div>
                    <h5 style="text-align: right; font-size: 8px; margin: auto;">{{ date('h:i
    a',strtotime($data->created_at)) }}</h5>
                </div>
                @endif
            @endforeach
        </div>


        <div class="chat-form-container">
            <form id="myForm" method="post">
                @csrf
                <input type="hidden" name="seller_id" value="{{$seller_data->id}}" id="seller_id">
                <input type="hidden" name="user_id" value="{{$user_id}}" id="user_id">
                <input type="hidden" name="seller_mobile" value="{{$seller_data->phone}}">
                <input type="hidden" name="seller_name" value="{{$seller_data->company_name}}">
                    
                <div class="form-row">
                    <div class="form-group col-md-12 d-flex">
                        <input type="text" class="form-control mr-1 @error('message') is-invalid @enderror" name="message" id="message"
                            value="{{ old('message') }}" placeholder="Enter Your Message" autocomplete="off">
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <button type="submit" class="chat_btn">Send</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
               

    </div>
    @endif
    @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
    $(document).ready(function () {

        function fetchAndDisplayMessage() {
        var user_id = $('#user_id').val();
        var seller_id = $('#seller_id').val();
        var _token = $('input[name="_token"]').val();

        $.ajax({
            method: "POST",
            data: { user_id: user_id, seller_id: seller_id, _token: _token },
            // dataType : "json",
            url: "{{ url('user_page_refresh') }}",
            success: function (response) {
                if (response) {
                    console.log(response);
                    $('#message_content').html(response); // Display the fetched message
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    // Fetch and display the message after a certain interval
    setInterval(fetchAndDisplayMessage, 2000);

        $('#chat_ikn').on('click', function(){
            $('#chat-popup').addClass('active');
            $('#chat-popup .chat_close').addClass('active');
        })

        $('#chat-popup .chat_close').on('click', function(){
            $('#chat-popup .chat_close').removeClass('active');
            $('#chat-popup').removeClass('active');
        })
        $('#myForm').submit(function (event) {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/store_chatbot_message',
                data: $('#myForm').serialize(),
                success: function (response) {
                    // alert(response.message);
                    // Reload the page after successful submission
                    // location.reload();
                    $("#message").val('');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
       
    });
</script>
    <!-- chatbot code end -->
<script>
        // Store the current scroll position
        window.addEventListener('beforeunload', function () {
            localStorage.setItem('scrollPosition', window.scrollY);
        });

        // Check if a scroll position was stored and scroll to it
        window.addEventListener('DOMContentLoaded', function () {
            const scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, scrollPosition);
                localStorage.removeItem('scrollPosition'); // Optional: Clear the stored position
            }
        });
</script>

