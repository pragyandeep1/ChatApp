<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <!-- <script type="text/javascript" src="https://use.fontawesome.com/b9bdbd120a.js"></script> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->

    <title>Hello, world!</title>
    <style>
      .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
      }

      @media (min-width: 1025px) {
      .h-custom-2 {
        height: 80%;
      }
      }
      
      form {
        justify-content: center;
        align-items: center;
        margin: auto;
      }

      .logo-div {
        text-align: left;
      }

      .pwd_input{
        border-radius: 0 0.25rem 0.25rem 0;
        padding: 0.75rem 0.75rem;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
            <section class="vh-100">
  <div class="container-fluid">
    <div class="row">

      

      <div class="col-sm-6 text-black">

        <!-- <div class="px-5 ms-xl-4 logo-div">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">Logo</span>
        </div> -->

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">


          <form style="width: 42rem;" action="" enctype="multipart/form-data">
              
            <div class="fw-normal mb-3 pb-3 logo-div">
              <i class="fas fa-crow fa-2x " style="color: #709085;"></i>
              <!-- <span class="h1 fw-bold mb-0">Logo</span> -->
            </div>

            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

            
            
            <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="company_name">Company Name</label>
                      <input type="text" id="company_name" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="name_of_seller">Name of Seller</label>

                      <input type="text" id="name_of_seller" class="form-control" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="phone_no">Phone No.</label>
                      <input type="tel" id="phone_no" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="email">Email</label>

                      <input type="email" id="email" class="form-control" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="year_of_establishment">Year of Establishment</label>
                      <input type="month" id="year_of_establishment" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="gst">GST</label>

                      <input type="text" id="gst" class="form-control" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    <label class="form-label" for="my_logo">Add Logo</label>
                      <input type="file" id="my_logo" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <label class="form-label" for="pan_number">Pan Number</label>

                      <input type="text" id="pan_number" class="form-control" />
                    </div>
                  </div>
                </div>

                <div class="pt-1 mb-4">
              <button class="btn btn-primary btn-block" type="submit">Submit</button>
            </div>
          </form>

        </div>

      </div>

      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="beautiful-young-family-with-child-compress.png"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: center;">
      </div>

     
    </div>
  </div>
</section>

  </body>
</html>