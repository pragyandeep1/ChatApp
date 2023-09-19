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
                $title = "Category List";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <div class="row">
                    <div class="col-6 col-md-6">
                    
                        <div class="card">
                            <div class="card-body">                            
                            <form action="{{ url('/category-create') }}" id="userform" name="userform" method="post" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                              
                                    <div class="row" id="form-data" >
                                        <div class="col-12">
                                           
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="speciality">Type
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                           <select name="type" class="form-select">
                                                            <option value="0">Select options</option>
                                                            <option value="product">Product</option>
                                                            <option value="service">Service</option>
                                                           </select>
                                                        </div>
                                                        
                                                       
                                                       
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="speciality">Name of Category
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input id="name" name="name" type="text" class="form-control" required >
                                                            <span id="error_speciality"></span>
                                                        </div>
                                                        
                                                       
                                                       
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                            <label for="slug">Category Slug</label>
                                                            <input id="slug" name="slug" type="text" class="form-control" required >
                                                            <span id="error_speciality"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                        <label>Select parent category</label>
                                                        <select type="text" name="parent_id" class="form-control form-select">
                                                            <option value="">None</option>
                                                            @if($categories)
                                                                @foreach($categories as $category)
                                                                    <?php $dash=''; ?>
                                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @if(count($category->subcategory))
                                                                        @include('layouts.admin_layout.subcategoryList-option',['subcategories' => $category->subcategory])
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <div class="mb-3">
                                                            <label for="thumbnail">Upload thumbnail</label>
                                                            <input id="thumbnail" name="thumbnail" type="file" class="form-control">
                                                        </div>
                                                        
                                    
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <button type="submit" id="create" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                </div>
                                            </form>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->




            </div>
                    <div class="col-6 col-md-6">
                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-8">
                                        <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                                
                                                <!-- <input type="text" class="form-control" placeholder="Search..."> -->
                                                <!-- <i class="bx bx-search-alt search-icon"></i> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="text-sm-end">
                                        <!-- <select name="filterDropdown" id="filterDropdown"  class="form-select">
                                                <option value="0">select type</option>
                                                <option value="product">product</option>
                                                <option value="service">services</option>
                                                </select> -->
                                        <!-- <a href="{{ url('/add-speciality') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i>Add </a> -->
                                            
                                        </div>
                                    </div><!-- end col-->
                                </div>

                                <div class="table-responsive">
                                    
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                               
                                                <th class="align-middle">ID</th>
                                                
                                                <th class="align-middle">Category Name</th>
                                                <th class="align-middle">Type</th>
                                                <th class="align-middle">Parent Category</th>
                                                <th class="align-middle">Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="resultDiv">
                                            @if(isset($categories))
                                            <?php $_SESSION['i'] = 0; ?>
                                            @foreach($categories as $category)
                                                <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                                                <tr>
                                                    <?php $dash=''; ?>
                                                    <td>{{$_SESSION['i']}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{$category->type}}</td>
                                                    <td>
                                                        @if(isset($category->parent_id))
                                                            {{$category->subcategory->name}}
                                                        @else
                                                            None
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex gap-3">
                                                            <a href="{{ Route('editCategory', $category->id)}}">
                                                                <button class="btn  btn-info">Edit</button>
                                                            </a>
                                                            <form action="{{ url('category-delete/'.$category->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                @if(count($category->subcategory))
                                                    @include('layouts.admin_layout.sub-category-list',['subcategories' => $category->subcategory])
                                                @endif

                                            @endforeach
                                            <?php unset($_SESSION['i']); ?>
                                                @endif
                                        </tbody>
                                    </table>
                                    {{ $categories->links() }}
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