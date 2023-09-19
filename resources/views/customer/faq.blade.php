<!DOCTYPE html>
<html>
<head>
@section('title') {{'BusinessOdisha'}} @endsection
    @include('customer.customer-meta-info')
  <title>FAQ Page</title>
  <!-- Link Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
  .text-black {
    color: black;
    transition: color 0.3s ease;
  }

  .text-black:hover {
    color: #FFCD00;
  }
</style>
</head>
<body>
@include('customer.customer_navbar')
  
  <main class="container-fluid">
    <h1 class="mt-4 mb-3">FAQ's</h1>
    
    <ul class="nav nav-tabs mb-4" id="faqTabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="seller-tab" data-toggle="tab" href="#seller" role="tab" aria-controls="seller" aria-selected="true">Seller</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="buyer-tab" data-toggle="tab" href="#buyer" role="tab" aria-controls="buyer" aria-selected="false">Customer</a>
      </li>
    </ul>
    
    <div class="tab-content" id="faqTabContent">
      <div class="tab-pane fade show active" id="seller" role="tabpanel" aria-labelledby="seller-tab">
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="mb-0">Seller Questions</h5>
          </div>
          <div class="card-body">
            <div class="accordion" id="seller-questions">
              <div class="card">
                <div class="card-header" id="seller-q1">
                  <h6 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#seller-a1" aria-expanded="true" aria-controls="seller-a1">
                    How can I list my business on the BusinessOdisha?
                    </button>
                  </h6>
                </div>
                <div id="seller-a1" class="collapse show" aria-labelledby="seller-q1" data-parent="#seller-questions">
                  <div class="card-body">
                  To list your business on our web directory, click on the "Add Listing" button and fill out the required information, including your business name, contact details, address, website URL, and a brief description of your products or services. Once submitted, our team will review your submission, and upon approval, your business will be listed on the directory.
                  </div>
                </div>
                <div class="card-header" id="seller-q2">
                  <h6 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#seller-a2" aria-expanded="true" aria-controls="seller-a2">
                    Can I edit or update my business listing information?
                    </button>
                  </h6>
                </div>
                <div id="seller-a2" class="collapse " aria-labelledby="seller-q2" data-parent="#seller-questions">
                  <div class="card-body">
                  Yes, you can edit and update your business listing information at any time. Simply log into your seller account, navigate to the "My Listings" section, and select the listing you wish to modify. From there, you can make changes to your business details, add or remove images, update contact information, and more.
                  </div>
                </div>
                <div class="card-header" id="seller-q3">
                  <h6 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#seller-a3" aria-expanded="true" aria-controls="seller-a3">
                    How can I enhance my business listing with additional features?
                    </button>
                  </h6>
                </div>
                <div id="seller-a3" class="collapse " aria-labelledby="seller-q3" data-parent="#seller-questions">
                  <div class="card-body">
                  We offer various options to enhance your business listing. These may include featured placements, highlighted listings, priority search ranking, and additional promotional opportunities. Please contact our support team or refer to the advertising packages section for more information on these enhancements and their associated costs.
                  </div>
                </div>
              </div>
              
              <!-- Add more questions and answers for sellers -->
              
            </div>
          </div>
        </div>
      </div>
      
      <div class="tab-pane fade" id="buyer" role="tabpanel" aria-labelledby="buyer-tab">
        <div class="card mb-4">
          <div class="card-header">
            <h5 class="mb-0">Customer Questions</h5>
          </div>
          <div class="card-body">
            <div class="accordion" id="buyer-questions">
              <div class="card">
                <div class="card-header" id="buyer-q1">
                  <h6 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#buyer-a1" aria-expanded="true" aria-controls="buyer-a1">
                    How can I find businesses in a specific category or location?
                    </button>
                  </h6>
                </div>
                <div id="buyer-a1" class="collapse show" aria-labelledby="buyer-q1" data-parent="#buyer-questions">
                  <div class="card-body">
                  To find businesses in a specific category or location, use the search bar or navigate through the directory's category menu. You can enter keywords related to the products or services you're looking for or browse the categories to explore different industries. Additionally, you can refine your search results by applying location filters to find businesses near you.
                  </div>
                </div>
                <div class="card-header" id="buyer-q2">
                  <h6 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#buyer-a2" aria-expanded="true" aria-controls="buyer-a2">
                    Can I leave reviews and ratings for businesses on the web directory?
                    </button>
                  </h6>
                </div>
                <div id="buyer-a2" class="collapse " aria-labelledby="buyer-q2" data-parent="#buyer-questions">
                  <div class="card-body">
                  Yes, we encourage users to share their experiences by leaving reviews and ratings for businesses listed on our web directory. You can provide feedback, rate the quality of products or services, and share your thoughts to help other users make informed decisions.
                  </div>
                </div>
                <div class="card-header" id="buyer-q3">
                  <h6 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#buyer-a3" aria-expanded="true" aria-controls="buyer-a3">
                    How can I contact a business listed on the web directory?
                    </button>
                  </h6>
                </div>
                <div id="buyer-a3" class="collapse " aria-labelledby="buyer-q3" data-parent="#buyer-questions">
                  <div class="card-body">
                  Each business listing includes contact information such as phone numbers, email addresses, and website links. You can use this information to directly contact the business. Some listings may also have a contact form or messaging feature within the web directory platform for convenient communication.
                  </div>
                </div>
                <div class="card-header" id="buyer-q4">
                  <h6 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#buyer-a4" aria-expanded="true" aria-controls="buyer-a4">
                    Can I save businesses to my favorites or create a personalized list?
                    </button>
                  </h6>
                </div>
                <div id="buyer-a4" class="collapse " aria-labelledby="buyer-q4" data-parent="#buyer-questions">
                  <div class="card-body">
                  Yes, our web directory allows you to save businesses to your favorites or create personalized lists. By logging into your customer account, you can bookmark businesses that you find interesting or useful. This feature enables you to easily access and refer back to those businesses at any time.
                  </div>
                </div>
              </div>
              
              <!-- Add more questions and answers for buyers -->
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @include('customer.customer_footer')

  
  <!-- Link Bootstrap JS and jQuery -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  @include('customer.search_bar_all_page')
</body>
</html>
