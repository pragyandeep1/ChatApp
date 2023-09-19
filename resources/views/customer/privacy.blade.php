<!DOCTYPE html>
<html lang="en">
<head>
@section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
    .container {
      margin-left: 20px; /* Adjust the value as per your preference */
      word-wrap: break-word;
      margin-right: auto;
      max-width: 100% !important;
        width: 98%;
    }
    body, html {
      overflow-x: hidden;
    }
  </style>
</head>
<body>
  
@include('customer.customer_navbar')

  <div class="container mt-4">
    <h1 class="mb-4">Privacy Policy</h1>

    <p>Thank you for using our web directory. This Privacy Policy explains how we collect, use, disclose, and safeguard your personal information when you access or use our platform. Please read this Privacy Policy carefully. By accessing or using our web directory, you consent to the practices described in this Privacy Policy.</p>

    <h5 class="mt-4">Information We Collect</h5>
    <p>We may collect certain personal information from you when you voluntarily provide it to us. This may include:</p>
    <ul>
      <li>Contact information (such as name, email address, phone number)</li>
      <li>Business information (such as business name, address, website URL)</li>
      <li>User-generated content (such as reviews, ratings, comments)</li>
      <li>Log data and usage information (such as IP address, browser type, referring/exit pages, date/time stamps)</li>
    </ul>

    <h5 class="mt-4">How We Use Your Information</h5>
    <p>We may use the information we collect from you for various purposes, including:</p>
    <ul>
      <li>To provide and improve our web directory services</li>
      <li>To personalize your experience and customize the content we deliver</li>
      <li>To communicate with you regarding your listings, inquiries, or support requests</li>
      <li>To analyze usage patterns and improve the functionality and performance of our platform</li>
      <li>To prevent, detect, and investigate fraudulent or unauthorized activities</li>
    </ul>

    <h5 class="mt-4">Information Sharing and Disclosure</h5>
    <p>We may share your personal information with third parties only in the following circumstances:</p>
    <ul>
      <li>With your consent or at your direction</li>
      <li>With service providers and business partners who assist us in operating our platform and delivering services to you</li>
      <li>In response to legal process or governmental requests, or to protect our rights, privacy, safety, or property</li>
      <li>In connection with a merger, acquisition, or sale of our business or assets</li>
    </ul>

    <h5 class="mt-4">Data Security</h5>
    <p>We implement appropriate security measures to protect your personal information from unauthorized access, disclosure, alteration, or destruction. However, please note that no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>

    <h5 class="mt-4">Your Choices and Rights</h5>
    <p>You may have certain rights and choices regarding the personal information we collect from you. You can:</p>
    <ul>
      <li>Update or correct your personal information by accessing your account settings</li>
      <li>Opt-out of receiving promotional emails or newsletters by following the instructions provided in the email</li>
      <li>Request the deletion of your personal information, subject to applicable legal requirements and our data retention policies</li>
    </ul>

    <h5 class="mt-4">Changes to This Privacy Policy</h5>
    <p>We reserve the right to modify or update this Privacy Policy at any time. Any changes will be effective immediately upon posting the revised Privacy Policy on our web directory. We encourage you to review this Privacy Policy periodically for any updates.</p>

    <h5 class="mt-4">Contact Us</h5>
    <p>If you have any questions or concerns about our Privacy Policy or our data practices, please contact us at [email address] or through the contact information provided on our web directory.</p>

  </div>
  @include('customer.customer_footer')
<!-- 
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  @include('customer.search_bar_all_page')
</body>
</html>
