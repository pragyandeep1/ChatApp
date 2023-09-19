
@include('layouts.admin_layout.head-main')

<head>

    <title> | Dason - Admin & Dashboard Template</title>

    @include('layouts.admin_layout.head')

    <!-- select2 css -->
    <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/pages/ecommerce-shop.init.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/o9ixq8pk7ojbpm7wqbyrzwomj7uv41yuckgycjn5b7rczyfe/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

 

    @include('layouts.admin_layout.head-style')

    <style>
        
        .search {
            display: flex;
        }



</style>
</head>
<body data-topbar="dark">
<!-- Begin page -->
<div id="layout-wrapper">

@include('layouts.admin_layout.menu')

   
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?php
                $maintitle = "Ecommerce";
                $title = "Add New Consultation";
                ?>
                @include('layouts.admin_layout.breadcrumb')
                <!-- end page title -->

                <form action="{{ url('save-consultation') }}" id="userform" name="userform" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                               
                                <div class="mt-4 border p-4">

                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div>
                                                    <div class="d-flex">
                                                        <img src="{{ asset('uploads/userdata/'.$appointment_data->hospitaldata->logo)}}" class="avatar-sm rounded-circle" alt="img">
                                                        <!-- <img src="{{ asset('uploads/medicine-logo-png.png') }}" class="avatar-sm rounded-circle" alt="img"> -->
                                                        <div class="flex-1 ms-4">
                                                            <h5 class="mb-2 font-size-15 text-primary">
                                                                {{ $appointment_data->doctorname->name }}
                                                            </h5>
                                                            <h5 class="text-muted font-size-15">
                                                                 {{ $appointment_data->hospitaldata->institute_name }}

                                                            </h5>
                                                            <p class="text-muted">
                                                                Address:-{{ $appointment_data->hospitaldata->address }}
                                                                <br/>
                                                                Mobile:-{{ $appointment_data->doctorname->mobile }}
                                                            </p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6 order-md-2">
                                                <div>
                                                <h5 class="mb-2 font-size-15 text-primary">{{ $appointment_data->patientdata->name }}</h5>
                                                <h5 class="mb-2 font-size-12 text-primary">Mobile:-{{ $appointment_data->patientdata->mobile}}</h5>
                                                    <p class="text-muted">
                                                        Gender:{{ $appointment_data->patientdata->gender}}|Age-{{ $years }}<br/>
                                                        PatientId-{{ $appointment_data->patient_id}}<br/>
                                                        Date of Birth-{{ $appointment_data->patientdata->dob}}<br/>
                                                        Address-{{ $appointment_data->patientdata->full_addrs}}
                                                    </p>
                                                    <p class="text-muted">
                                                        
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!-- end -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Patient History
                                    <input type="button" class="btn btn-primary" name="patient_history" id="patient_history" value="Show"/>
                                    <input type="button" class="btn btn-primary" name="patient_hide_btn" id="patient_hide_btn" value="Hide" style="display: none;">
                            </h4>
                                <p class="card-title-desc">
                                    <input type="hidden" name="patient_id" value="{{ $appointment_data->patient_id}}">
                                </p>
                            </div>
                            <div class="card-body">
                               
                                    @foreach($consultation_data as $consultation_data_single)
                                    <div class="mt-2 pt-2 patient_history_detail"  style="display:none;">
                                        <div class="comment-section border-bottom pb-4">
                                            <div class="d-flex">
                                                <div class="flex-1 ms-4">
                                                    <div class="post-meta align-middle">
                                                        <span><i class="mdi mdi-calendar me-2"></i>
                                                            @php
                                                                $dateString = $consultation_data_single->created_at;
                                                                $date = new DateTime($dateString);
                                                                $formattedDate = $date->format('F j, Y');
                                                                echo $formattedDate;

                                                            @endphp
                                                    </span> <br/>
                                                    </div>
                                                    <h5 class="font-size-15"></h5>
                                                    <p class="text-muted w-75 mb-0">
                                                        {!! $consultation_data_single->case_details !!}
                                                       
                                                    </p> <br/>
                                                    <p class="text-muted w-75 mb-0">
                                                        
                                                        Medicine names- {{ $consultation_data_single->medicine_name }}
                                                        <br/>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>            
                                    @endforeach
                                    
                             
                                <!-- <div class="row" id="form-data" >
                                    <div class="col-12">
                                        <div class="row">
                                            
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                            <!-- end of row -->
                           
                            <!-- end of row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Case Details</h4>
                                            <p class="card-title-desc">Fill all information below</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                        <textarea id="case_details" name="case_details"></textarea>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                            
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Prescribe Medicine</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-md-6">
                                               
                                                <select name="medicine_name[]" id="medicine-name" class="form-control select2" multiple>
                                                @foreach($medicines as $medicinename)
                                                        
                                                            <option value="{{ $medicinename->medicine_name }}">{{$medicinename->medicine_name}}</option>
                                                     
                                                    @endforeach
                                                </select>
                                                </div>
                                                <div class="col-md-6"></div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                <div id="medicine-search-results" style="display: none;"></div>
                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                      
                                        <div class="card-body">
                                            <div class="row" id="form-data" >
                                                <div class="col-12">
                                                   
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <div class="d-flex flex-wrap gap-2">
                                                                    <label for="no_of_days">No of days</label>
                                                                    <input id="no_of_days" name="no_of_days" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-3">
                                                                <div class="d-flex flex-wrap gap-2">
                                                                    <label for="email">Special Instruction</label>
                                                                    <input id="special_instruction" name="special_instruction" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                        </div>
                                                        <div class="col-sm-4">
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <div class="mb-3">
                                                                <div class="d-flex flex-wrap gap-2">
                                                                    <button type="submit" id="create" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                                                                    <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of row -->
                </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Page-content -->

        @include('layouts.admin_layout.footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include('layouts.admin_layout.right-sidebar') 
@include('layouts.admin_layout.vendor-scripts')

<!-- select 2 plugin -->
<script src="{{ asset('libs/select2/js/select2.min.js')}}"></script>

<!-- dropzone plugin -->
<script src="{{ asset('libs/dropzone/min/dropzone.min.js')}}"></script>

<!-- init js --> -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <!-- Include Select2 CSS and JS files -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> -->

    <script>
$(document).ready(function() {
  
    $('#case_details').summernote({
  height: 150,   //set editable area's height
  codemirror: { // codemirror options
    theme: 'monokai'
  }
});

});

    </script>
   

    <!-- Initialize Select2 on the medicine name input field -->
    <script>
        $(document).ready(function() {
            $('#medicine-name').select2({
                tags: true,
                tokenSeparators: [',', 13],
                // tokenSeparators: [',', ' '],
                createTag: function(params) {
                    // Don't allow the user to create a new tag if it already exists
                    var exists = false;
                    $('option', this).each(function() {
                        if ($(this).val().toUpperCase() === params.term.toUpperCase()) {
                            exists = true;
                        }
                    });
                    if (exists) {
                        return null;
                    }
                    return {
                        id: params.term,
                        text: params.term,
                        newTag: true
                    }
                }
            }).on('select2:select', function(e) {
                var medicineName = e.params.data.text;
                checkMedicineExists(medicineName);
            }).on('select2:unselect', function(e) {
                // Clear any messages when the user unselects the medicine name
                $('#medicine-message').html('');
            });
        });
    </script>

<!-- <script type="text/javascript">
     $('#medicine_name').on('input', function() {
        var query = $(this).val();
        if (query.length > 1) {
            $.ajax({
                url: "{{ url('get-medicine-name') }}",
                method: "GET",
                data: {query:query},
                success:function(data) {
                    $('#medicine-search-results').html('');
                    $('#medicine-search-results').show();
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            $('#medicine-search-results').append('<div class="btn btn-info mx-2 med-name">'+value.medicine_name+'</div>');
                            $('.med-name').click(function() {
                                $('#medicine_name').val(value.medicine_name);
                                $('#medicine-search-results').hide();
                            });
                        });
                    } else {
                        $('#medicine-search-results').html('<div>No results found</div>');
                    }
                }
            });
        } else {
            $('#medicine-search-results').html('');
        }
    });
   
</script> -->
<script>
       

        function checkMedicineExists(medicineName) {
                $.ajax({
                    url: "{{ url('check-medicine-exists') }}",
                    method: 'POST',
                    data: {
                    _token: '{{ csrf_token() }}',
                    medicine_name: medicineName
                },
                success: function(response) {
                    var message = '';
                    if (response.exists) {
                        message = 'Medicine name already exists: ' + response.medicine_name;
                    } else {
                        message = 'New medicine added: ' + response.medicine_name;
                    }
                    // Display the message to the user
                    $('#medicine-message').html(message);
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
<script>
    $('#patient_history').click(function(){
        $('.patient_history_detail').show();
        $('#patient_history').hide();
        $('#patient_hide_btn').show();
        });
    $('#patient_hide_btn').click(function(){
        $('.patient_history_detail').hide();
        $('#patient_history').show();
        $('#patient_hide_btn').hide();
        });
</script>
</body>

</html>