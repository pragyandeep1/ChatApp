<!DOCTYPE html>
<html lang="en">
<head>
    @section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
<!-- sweet alert -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.css">
    <!-- sweet alert -->
    <link rel="stylesheet" href="{{ asset('css/free-listing-style.css') }}">
</head>
<body>
@include('customer.customer_navbar')
      <div class="container-custom">
        <div class="container container bg_white width_limit">
            <div class="form_tagline">
              Enter your business details for <span class="free_highlight">FREE</span> in largest local search engine.
            </div>
            <form action="{{ url('/save_advertising') }}" method="post">
              @csrf
                <div class="form_head_title">Enter your detail below</div>
                <div class="form_head_title_aesthetic">* denotes mandatory fields</div>
                <div class="form-row">
                  <div class="col">
                    <input type="text" oninput="validateInput(this)" class="form-control" id="companyName" placeholder="Company Name*" name="companyName" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="City*" name="city" required oninput="validateInput(this)">
                  </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div class="input-group mt-3 mb-3">
                            <div class="input-group-prepend">
                             
                              
                                
                                <select class="form-control" id="nameprefix" name="nameprefix">
                                  <option value="Mr">Mr</option>
                                  <option value="Mrs">Mrs</option>
                                  <option value="Ms">Ms</option>
                                  <option value="Dr">Dr</option>
                                </select>
                              
                            </div>
                            <input type="text" class="form-control" placeholder="First name*" name="firstName" required oninput="validateInput(this)">
                          </div>
                    </div>
                    <div class="col mt-3 mb-3">
                      <input type="text" class="form-control" placeholder="Last Name*" name="lastName" required oninput="validateInput(this)">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col">
                      <input type="tel" class="form-control" id="mobileNumber" placeholder="Mobile Number*" name="mobileNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10" required>
                    </div>
                    <div class="col">
                      <input type="tel" class="form-control" placeholder="Landline Number" name="landlineNumber" onkeypress="return event.charCode >= 48 && event.charCode <= 57 && this.value.length < 10">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
        </div>
      </div>




      @include('customer.customer_footer')
    <!-- sweet alert code start  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.3/dist/sweetalert2.min.js"></script>
@if(session('success'))
    <script>
      // const host = window.location.host;
      // const pathname = window.location.pathname;
      // const search = window.location.search;
      // const hash = window.location.hash;
      var base_url = window.location.origin;
      // var currentUrl = "{{ url()->current(null, [], true) }}";
    //  var specificUrl = "{{ url('/') }}";
    // console.log("Current URL:", search);
        Swal.fire({
            icon: 'success',
            title: '{{ session('success') }}',
            // text: '{{ session('success') }}',
        }).then(function() {
    window.location = base_url;
});
    </script>
@endif
<!-- sweet alert code end  -->
<script>
  function validateInput(input) {
    // Remove any numeric characters from the input
    input.value = input.value.replace(/[0-9]/g, '');
}
</script>
@include('customer.search_bar_all_page')
</body>
</html>