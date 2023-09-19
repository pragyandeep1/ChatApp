@include('layouts.admin_layout.head-main')

<head>

    @section('title') {{'BusinessOdisha'}} @endsection
    @include('layouts.admin_layout.head')
    @include('layouts.admin_layout.head-style')

</head>
<style>
.font-size-25 {
    font-size: 25px;
}

.message-container {
    clear: both;
    margin-bottom: 10px;
}

.left {
    float: left;
    background-color: lightblue;
    padding: 6px;
    border-radius: 5px;
}

.right {
    float: right;
    background-color: #b190ee73;
    padding: 6px;
    border-radius: 5px;
}
</style>

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
        $title = "User Messages";
        ?>
                    @include('layouts.admin_layout.breadcrumb')
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-8">
                            @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <!-- <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search..." id="search">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                            </div> -->
                                        <div class="col-sm-8">
                                            <div class="text-sm-end">

                                                <!-- <a href="{{ url('/add-seller') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>Add </a> -->

                                            </div>
                                        </div><!-- end col-->
                                    </div>
                                    <div id="message_content">
                                        @foreach($user_messages as $i=>$data)
                                        @if($data->position =='left')
                                        <div class="message-container left">
                                        <h5 style="text-align: left; font-size: 8px; margin: auto;">{{ $data->name }}</h5>
                                            {{ $data->message }}
                                            <h5 style="text-align: right; font-size: 8px; margin: auto;">{{ date('h:i a',strtotime($data->created_at)) }}</h5>
                                        </div>
                                        @endif

                                        @if($data->position =='right')
                                        <div class="message-container right">
                                            {{ $data->message }}
                                            <h5 style="text-align: right; font-size: 8px; margin: auto;">{{ date('h:i a',strtotime($data->created_at)) }}</h5>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <!-- <form id="myForm" method="post">
                                        @csrf
                                        <input type="hidden" name="seller_id" value="{{$data->seller_id}}">
                                        <input type="hidden" name="user_id" value="{{$data->user_id}}">

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <input type="text"
                                                    class="form-control @error('message') is-invalid @enderror"
                                                    name="message" id="message" value="{{ old('message') }}"
                                                    placeholder="Enter Your Message">
                                                @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <button type="submit" class="chat_btn">Send</button>
                                            </div>
                                        </div>
                                    </form> -->

                                </div>
                            </div>
                        </div>



                        <div class="col-4">
                            @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                            @endif
                            <div class="card">
                                <div class="card-body">
                                    
                                    <!-- @foreach($user_messages as $i=>$data)
                                    @if($data->position =='left')
                                    <div class="message-container left">
                                        {{ $data->message }}
                                    </div>
                                    @endif

                                    @if($data->position =='right')
                                    <div class="message-container right">
                                        {{ $data->message }}
                                    </div>
                                    @endif
                                    @endforeach -->
                                    <form id="myForm" method="post">
                                        @csrf
                                        <input type="hidden" name="seller_name" id="seller_name" value="{{$data->seller_name}}">
                                        
                                        <input type="hidden" name="seller_id" id="seller_id" value="{{$data->seller_id}}">
                                        <input type="hidden" name="user_id" id="user_id" value="{{$data->user_id}}">

                                        <div class="form-row">
                                            <div class="form-group ">
                                                <input type="text"
                                                    class="form-control @error('message') is-invalid @enderror"
                                                    name="message" id="message" value="{{ old('message') }}"
                                                    placeholder="Enter Your Message">
                                                @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4">
                                                <button type="submit" class="chat_btn">Send</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div
                        
                    </div>
                    <!-- end row -->




                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.admin_layout.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    @include('layouts.admin_layout.right-sidebar')
    @include('layouts.admin_layout.vendor-scripts')
    <script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if (!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
    </script>

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
            url: "{{ url('admin_page_refresh') }}",
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
                url: '/admin_replay_message',
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
    <script>
    // $(document).ready(function() {
    //     $('#myForm').submit(function(event) {
    //         event.preventDefault();

    //         $.ajax({
    //             type: 'POST',
    //             url: '/admin_replay_message',
    //             data: $('#myForm').serialize(),
    //             success: function(response) {
    //                 // alert(response.message);
    //                 // Reload the page after successful submission
    //                 location.reload();
    //             },
    //             error: function(error) {
    //                 console.log(error);
    //             }
    //         });
    //     });

    //     // Fetch the message using AJAX and display it after 3 seconds
    //     setTimeout(function() {
    //     var user_id = $('#user_id').val();
    //     var seller_id = $('#seller_id').val();
    //     var _token = $('input[name="_token"]').val();
    //     // alert(_token);
    //         $.ajax({
    //             method: "POST",
    //             data: { user_id: user_id, seller_id: seller_id, _token: _token },
    //             url: "{{ url('admin_page_refresh') }}",
    //             // url: '/get_message', // Replace with your route to fetch the message
    //             success: function (response) {
    //                 if (response.message) {
    //                     console.log("Fetched message:", response.message);
    //                 }
    //             },
    //             error: function (error) {
    //                 console.log(error);
    //             }
    //         });
    //     }, 3000);

    // });
    </script>

</body>

</html>