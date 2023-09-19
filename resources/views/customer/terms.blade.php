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
  <div class="container-fluid">
    <h1 class="mt-5 mb-4">Terms of Service</h1>
    <p>Please read these terms and conditions carefully before using our services.</p>

    <h4>1. Acceptance of Terms</h4>
    <p>By accessing and using the services provided by BusinessOdisha, you agree to be bound by these terms and conditions.
      If you do not agree with any of these terms, you are prohibited from using or accessing our services.</p>

    <h4>2. Description of Services</h4>
    <p>BusinessOdisha is a web directory company that provides a platform for businesses in Odisha to list their
      information and reach a wider audience. Our services include but are not limited to:</p>
    <ul>
      <li>Listing businesses in relevant categories</li>
      <li>Providing contact information and details about listed businesses</li>
      <li>Offering search functionality for users to find businesses</li>
      <li>Displaying advertisements related to businesses</li>
    </ul>

    <h4>3. Use of Services</h4>
    <p>Users of BusinessOdisha agree to use our services solely for lawful purposes and in compliance with all applicable
      laws and regulations. You shall not:</p>
    <ul>
      <li>Submit false or misleading information</li>
      <li>Engage in any activity that could harm the reputation or integrity of BusinessOdisha</li>
      <li>Attempt to gain unauthorized access to our systems or interfere with the services</li>
      <li>Use our services to send spam or unsolicited commercial messages</li>
    </ul>

    <h4>4. Intellectual Property</h4>
    <p>The content and materials available on BusinessOdisha, including but not limited to text, graphics, logos, and
      images, are the property of BusinessOdisha and are protected by applicable copyright and intellectual property
      laws.</p>

    <h4>5. Limitation of Liability</h4>
    <p>BusinessOdisha shall not be liable for any direct, indirect, incidental, consequential, or punitive damages
      arising out of the use or inability to use our services, even if we have been advised of the possibility of such
      damages.</p>

    <h4>6. Governing Law</h4>
    <p>These terms and conditions shall be governed by and construed in accordance with the laws of the State of Odisha,
      India.</p>

    <p>For any further information or inquiries regarding our Terms of Service, please contact us at:</p>
    <p>
      BusinessOdisha<br>
      Address: Plot no - 349, Jagannath Vihar, Barmunda, Bhubaneswar, Khordha, Odisha - 751006<br>
      Phone: +91 93484 56544 <br>
      Email: info@businessodisha.com
    </p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  @include('customer.customer_footer')
  @include('customer.search_bar_all_page')
</body>

</html>
