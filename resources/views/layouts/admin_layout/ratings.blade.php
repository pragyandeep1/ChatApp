@include('layouts.admin_layout.head-main')

<head>

@section('title') {{'BusinessOdisha'}} @endsection

    @include('layouts.admin_layout.head')

    @include('layouts.admin_layout.head-style')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    
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
                $title = "Rating List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <div id="status-show" class="alert alert-success"></div>
                                <div class="row mb-2">
                                    <!-- <div class="col-sm-4">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Search...">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                       
                                        <a href="{{ url('/add-seller') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>Add </a>
                                            
                                        </div>
                                    </div> -->
                                    <!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <th class="align-middle">ID</th>
                                                <th class="align-middle">Seller Name</th>
                                                <th class="align-middle">User Email</th>
                                                <th class="align-middle">Rating</th>
                                                <th class="align-middle">Review</th>
                                                
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        @foreach ($ratings as $data)
                                            <tr>
                                                
                                                <td>{{ $data['id']}}</td>
                                                <td>{{ $data['sellerinfo']['company_name'] ?? $data['sellerinfo']['seller_name'] }}</td>
                                                <td>{{ $data['user']['email']}}</td>
                                                <td>{{ $data['rating'] }}</td>
                                                <td>{{ $data['review'] }}</td>
                                                <td>
                                                    <div class="d-flex gap-3">
                                                        <!-- <form action="{{ url('seller_enquiry_delete/'.$data['id']) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                                    </form> -->
                                                    <input  data-id="{{ $data['id'] }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Approved" data-off="Reject" {{ ($data['status']==1) ? 'checked' : '' }} >
                                                    <!-- @if($data['status'] == 1)
                                                    <a href="javascript:void(0)" class="upDateratingstatus" id="rating-{{ $data['id'] }}" rating_id="{{ $data['id'] }}">
                                                      <i class="fas fa-toggle-on fa-2x" status="active" aria-hidden="true" ></i>
                                                    </a>
                                                    @else
                                                    <a href="javascript:void(0)" class="upDateratingstatus" id="rating-{{ $data['id'] }}" rating_id="{{ $data['id'] }}">
                                                      <i class="fas fa-toggle-off fa-2x" status="Inactive" aria-hidden="true" ></i>
                                                    </a>
                                                    @endif -->
                                    
                                    


                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach
                                                                                      
                                            <!-- <tr>
                                               <td colspan="6" style="
                                                text-align: center;">No record found</td>
                                            </tr> -->
                                           
                                        </tbody>
                                    </table>
                                   
                                </div>
                               
                            </div>
                        </div>
                    </div>
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
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- <script>
  $(function() {
    // Event delegation for the change event on the '.toggle-class' elements
  $(document).on('click', '.upDateratingstatus', function() {
    var status = $(this).children('i').attr('status'); 
    var rating_id = $(this).attr('rating_id'); 
    // alert(rating_id);
    
    $.ajax({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        type:'post',
        url:'{{ url("upDateratingstatus") }}',
        data:{status:status,rating_id:rating_id},
        success:function(resp){
            if (resp['status'] == 0) {
                $('#status-show').html('<span class="alert alert-danger">Deactivated successfully.</span>');
                $('#rating-'+rating_id).html('<i class="fas fa-toggle-off fa-2x" status="active" aria-hidden="true" ></i>')
            }else if(resp['status'] == 1){
                $('#status-show').html('<span class="alert alert-success">Activated successfully.</span>');
                $('#rating-'+rating_id).html('<i class="fas fa-toggle-on fa-2x" status="active" aria-hidden="true" ></i>')
            }
        }
     
    });
  });
     });
</script> -->
<script>
  $(function() {
    
  $(document).on('change', '.toggle-class', function() {
    var status = $(this).prop('checked') ? 1 : 0; 
    var service_id = $(this).data('id'); 
    // alert(service_id);
    
    $.ajax({
      type: "GET",
      dataType: "json",
      url: '{{ url("upDateratingstatus") }}',
      data: {'status': status, 'id': service_id},
      success: function(data) {
        setTimeout(function() {
          $('#status-show').hide();
        }, 1000);
        if (data.success) {
          $('#status-show').show();
          $('#status-show').html(data.success);
        }
      }
    });
  });
});
</script>

</body>

</html>