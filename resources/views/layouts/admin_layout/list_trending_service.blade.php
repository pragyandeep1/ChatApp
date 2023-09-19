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
                $title = "Trending Category List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                
                    <div class="col-12 col-md-12">
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-8">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-sm-end">
                                        
                                            
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <th class="align-middle">ID</th>
                                                
                                                <th class="align-middle">Category Name</th>
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="resultDiv">
                                        @if(isset($trendcategories))
                                            @foreach($trendcategories as $category)
                                                <?php $i = $loop->iteration; ?>
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>
                                                        
                                                            {{ $category->category_title }}
                                                       
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="{{ route('editTrendingCategory', $category->id) }}">
                                                                <button class="btn btn-info">Edit</button>
                                                            </a>
                                                            <form action="{{ url('category-delete/'.$category->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <!-- <button type="submit" class="btn btn-danger show_confirm">Delete</button> -->
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    
                                </div>
                                
                            </div>
                        </div>
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
<script type="text/javascript">
    $('.show_confirm').click(function(e) {
        if(!confirm('Are you sure you want to delete this?')) {
            e.preventDefault();
        }
    });
</script>
<script>
$(document).ready(function(){

 $('#speciality').on('keyup',function(){
    var error_speciality = '';
  var speciality = $('#speciality').val();
  var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ url('speciality_available_check') }}",
    method:"POST",
    data:{speciality:speciality, _token:_token},
    success:function(result)
    {
     if(result == 'unique')
     {
      $('#error_speciality').html('<label class="text-success">speciality Available</label>');
      $('#speciality').removeClass('has-error');
    
      $('#create').attr('disabled', false);
     }
     else
     {
      $('#error_speciality').html('<label class="text-danger">speciality not Available</label>');
      $('#speciality').addClass('has-error');
    
      $('#create').attr('disabled', 'disabled');
     }
    }
   });
  
 });
 
});
</script>
<script>
    var inputElement = document.getElementById("slug");

inputElement.addEventListener("keydown", function(event) {
  if (event.code === "Space") {
    event.preventDefault();
  }
});

</script>
<script>
    $('#filterDropdown').change(function() {
        var selectedValue = $(this).val();
        alert(selectedValue);
        $.ajax({
            type: 'get',
            url: '{{ url("filtercategory") }}',
            data: {'selectedValue': selectedValue},
            success: function(data) {
                // var resultHtml = '';
                
                // $.each(data, function(index, value) {
                //     resultHtml += '<div>' + value.name + '</div>';
                // });
                
                // $('#resultDiv').html(resultHtml);
                var categories = data;
                var tableBody = document.getElementById("resultDiv");
                // clear previous contents of the table body
                tableBody.innerHTML = "";

                // loop through the categories and add them to the table
                categories.forEach(function(category){
                    var tr = document.createElement("tr");
                    var td1 = document.createElement("td");
                    var td2 = document.createElement("td");
                    var td3 = document.createElement("td");
                    var td4 = document.createElement("td");
                    var td5 = document.createElement("td");

                    td1.textContent = category.id;
                    td2.textContent = category.name;
                    td3.textContent = category.type;
                    td4.textContent = category.subcategory ? category.subcategory.name : "None";
                    td5.innerHTML = '<div class="d-flex gap-3"><a href="' + category.editUrl + '"><button class="btn btn-info">Edit</button></a><form action="' + category.deleteUrl + '" method="POST">@csrf @method("DELETE")<button type="submit" class="btn btn-danger show_confirm">Delete</button></form></div>';

                    tr.appendChild(td1);
                    tr.appendChild(td2);
                    tr.appendChild(td3);
                    tr.appendChild(td4);
                    tr.appendChild(td5);

                    tableBody.appendChild(tr);
                });
                            }
                        });
    });
</script>

</body>

</html>