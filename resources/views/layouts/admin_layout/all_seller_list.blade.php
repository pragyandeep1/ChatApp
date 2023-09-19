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
                $title = "Seller List";
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
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Search..." id="search">
                                                <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                       
                                        <a href="{{ url('/add-seller') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>Add </a>
                                            
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check" id="services-table">
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <th class="align-middle">ID</th>
                                                <th class="align-middle">Logo</th>
                                                <th class="align-middle">Seller Name</th>
                                                <th class="align-middle">Phone</th>
                                                <th class="align-middle">Email</th>
                                                
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($count > 0)
                                        @foreach ($clinicdata as $data)
                                            <tr>
                                                
                                                <td>{{ $data->id}}</td>
                                                <td>
                                                @if($data->image) 
                                                    <img src="{{ asset('uploads/userdata/'.$data->image) }}" width="70px" height="70px" alt="Image">
                                                    @else
                                                    <img src="{{ asset('uploads/userdata/No_Logo_Available.png') }}" width="70px" height="70px" alt="Image">
                                                    @endif
                                                    </td>
                                                <td>
                                                    @if($data->seller_name)
                                                    {{ $data->seller_name}}
                                                    @else
                                                    {{ $data->company_name}}
                                                    @endif
                                                </td>
                                               
                                                <td>
                                                    @if($data->phone)
                                                    {{ $data->phone}}
                                                    @else
                                                   XXXXXXXXXX 
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($data->email)
                                                    {{ $data->email}}
                                                    @else
                                                    N/A
                                                    @endif
                                                
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex gap-3">

                                                        <a href="{{ url('seller-edit/'.$data->id) }}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        
                                                        <!-- <a href="{{ url('clinic-delete/'.$data->id) }}" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a> -->
                                                        <form action="{{ url('seller-delete/'.$data->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                                    </form>
                                                    
                                     <a href="{{ url('/impersonate/user/'.$data->email)}}" class="btn btn-success">Login</a>
                                     <!-- <a href="{{ url('/impersonate/user/'.$data->user_id)}}" class="btn btn-success">Login</a> -->
                                    


                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach
                                            @else                                            
                                            <tr>
                                               <td colspan="6" style="
                                                text-align: center;">No record found</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                    {{ $clinicdata->links() }}
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
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>
<script>
  $(document).ready(function() {
    $('.search-icon').click(function(e) {
      e.preventDefault(); // Prevent form submission

      var searchQuery = $('#search').val();
    //   alert(searchQuery);

      // Perform AJAX search request
      $.ajax({
        url: "{{ url('search-seller-list') }}", // Replace with your search endpoint URL
        method: 'POST',
        data: {
          search: searchQuery,
          _token: '{{csrf_token()}}'
        },
        success: function(response) {
          // Clear the table body
  $('#services-table tbody').empty();

// Handle the search results
if (response.count > 0) {
  $.each(response.seller_info.data, function(index, data) {
    var newRow = `<tr>
                    <td>${data.id}</td>
                    <td>
                      ${data.image ? `<img src="{{ asset('uploads/userdata/${data.image}') }}" width="70px" height="70px" alt="Image">` : `<img src="{{ asset('uploads/userdata/No_Logo_Available.png') }}" width="70px" height="70px" alt="Image">`}
                    </td>
                    <td>
                      ${data.seller_name ? data.seller_name : data.company_name}
                    </td>
                    <td>
                      ${data.phone ? data.phone : 'XXXXXXXXXX'}
                    </td>
                    <td>
                      ${data.email ? data.email : 'N/A'}
                    </td>
                    <td>
                      <div class="d-flex gap-3">
                        <a href="{{ url('seller-edit/') }}/${data.id}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                        <form action="{{ url('seller-delete/') }}/${data.id}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                        </form>
                        <a href="{{ url('/impersonate/user/') }}/${data.email}" class="btn btn-success">Login</a>
                      </div>
                    </td>
                  </tr>`;

    $('#services-table tbody').append(newRow);
  });
} else {
  var noRecordRow = `<tr>
                        <td colspan="6" style="text-align: center;">No record found</td>
                      </tr>`;

  $('#services-table tbody').append(noRecordRow);
}
         
        },
        error: function(xhr, status, error) {
          // Handle error
          console.log(error);
        }
      });
    });
  });
</script>
</body>

</html>