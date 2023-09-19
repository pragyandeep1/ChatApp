<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
    /* Add your custom styles here */
  </style>
</head>

<body>
@include('customer.customer_navbar')
  <div class="container">
    <h1 class="mt-5 mb-4">Contact Us</h1>
    <div class="row">
      <div class="col-md-6">
        <form>
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Enter your message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="col-md-6">
        <h4>Company Information</h4>
        <p>Welcome to Odisha Business, your one-stop solution where you are assisted with day-to-day exclusive planning, purchasing, and other activities. We are proud to say we own the stronghold in business information pan India.
We have an extensive database and user-friendly interface, we aim to simplify your search process and connect you with the information you need. Whether you're seeking restaurants, hotels, doctors, order food, grocery, events, local business, or cities, our web directory provides comprehensive listings with essential details like contact information, addresses, ratings, and reviews.</p>
        <p>
          Address: Plot no - 349, Jagannath Vihar, Barmunda, Bhubaneswar, Khordha, Odisha - 751006 <br>
          Phone: +91 93484 56544 <br>
          Email:  info@businessodisha.com
        </p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  @include('customer.customer_footer')
  @include('customer.search_bar_all_page')
</body>

</html>
