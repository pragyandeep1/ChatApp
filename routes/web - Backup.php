<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthOtpController;
use App\Http\Controllers\FacebookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('home.index');
// });

Auth::routes();
Route::get('/login-register', ['as'=>'login','uses'=> 'App\Http\Controllers\UserController@loginRegister']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'loginUser']);
// Route::post('/register', [App\Http\Controllers\UserController::class, 'registerUser']);
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logoutUser']);
Route::get('/userlogin', [App\Http\Controllers\UserController::class, 'loginRegister']);



// email verification
Route::get('/confirm/{code}',[App\Http\Controllers\UserController::class, 'confirmAccount']);
Route::post('/confirm/{code}',[App\Http\Controllers\UserController::class, 'confirmAccount']);
// email verification

// For normal otp verification without sending to mobile start
Route::controller(AuthOtpController::class)->group(function(){
    Route::get('/otp/login', 'login')->name('otp.login');
    Route::post('/otp/generatebyphone', 'generatebyphone')->name('otp.generatebyphone');

    Route::post('/checkMobileRegistered', 'checkMobileRegistered')->name('otp.checkMobileRegistered');
    
    Route::post('/otp/generate', 'generate')->name('otp.generate');
    Route::get('/otp/verification/{user_id}', 'verification')->name('otp.verification');
    Route::post('/otp/login', 'loginWithOtp')->name('otp.getlogin');
});
// For normal otp verification without sending to mobile end
Route::group(['middleware'=>['auth','is_seller_admin']],function(){
    Route::group(['middleware' => ['verified']], function() {
        /**
         * Dashboard Routes
         */
        Route::get('/dashboard', function () {
            return view('home.index');
        });
    });
    // code bijay start for crm 
    // CRM START
    Route::get('/call-me-back',[App\Http\Controllers\CrmController::class, 'call_me_back'])->name('call_me_back');

    Route::get('/seller-call-me-back',[App\Http\Controllers\CrmController::class, 'seller_call_me_back'])->name('call_me_back');
    Route::delete('/seller-call-me-back-delete/{id}',[App\Http\Controllers\CrmController::class, 'seller_call_me_back_delete']);

    Route::get('/service-enquiry',[App\Http\Controllers\CrmController::class, 'service_enquiry'])->name('service_enquiry');
    Route::get('/seller-service-enquiry',[App\Http\Controllers\CrmController::class, 'seller_service_enquiry'])->name('seller_service_enquiry');

    Route::get('/liked-service',[App\Http\Controllers\CrmController::class, 'liked_service'])->name('liked_service');
    Route::get('/seller-liked-service',[App\Http\Controllers\CrmController::class, 'seller_liked_service'])->name('seller_liked_service');

    Route::get('/chat-enquiry',[App\Http\Controllers\CrmController::class, 'chat_enquiry'])->name('chat_enquiry');
    Route::get('/seller-chat-enquiry',[App\Http\Controllers\CrmController::class, 'seller_chat_enquiry'])->name('seller_chat_enquiry');

    Route::get('/best-deal',[App\Http\Controllers\CrmController::class, 'best_deal'])->name('best_deal');
    Route::get('/seller-best-deal',[App\Http\Controllers\CrmController::class, 'seller_best_deal'])->name('seller_best_deal');

    Route::delete('/call-me-back-delete/{id}',[App\Http\Controllers\CrmController::class, 'call_me_back_delete']);
    Route::delete('/seller-service-delete/{id}',[App\Http\Controllers\CrmController::class, 'service_delete']);
    Route::delete('/liked-service-delete/{id}',[App\Http\Controllers\CrmController::class, 'liked_service_delete']);
    Route::delete('/chat-enquiry-delete/{id}',[App\Http\Controllers\CrmController::class, 'chat_enquiry_delete']);
    Route::delete('/best-deal-delete/{id}',[App\Http\Controllers\CrmController::class, 'best_deal_delete']);


    Route::delete('/call-me-back-history-delete/{id}',[App\Http\Controllers\CrmController::class, 'call_me_back_history_delete']);
    Route::delete('/seller-service-history-delete/{id}',[App\Http\Controllers\CrmController::class, 'service_history_delete']);
    Route::delete('/liked-service-history-delete/{id}',[App\Http\Controllers\CrmController::class, 'liked_service_history_delete']);
    Route::delete('/chat-enquiry-history-delete/{id}',[App\Http\Controllers\CrmController::class, 'chat_enquiry_history_delete']);
    Route::delete('/best-deal-history-delete/{id}',[App\Http\Controllers\CrmController::class, 'best_deal_history_delete']);



    Route::put('call-me-back-update/{id}',[App\Http\Controllers\CrmController::class, 'call_me_back_update']);
    Route::put('seller-enquiry-update/{id}',[App\Http\Controllers\CrmController::class, 'seller_enquiry_update']);
    Route::put('liked-service-update/{id}',[App\Http\Controllers\CrmController::class, 'liked_service_update']);
    Route::put('today-chat-update/{id}',[App\Http\Controllers\CrmController::class, 'today_chat_update']);
    Route::put('best-deal-update/{id}',[App\Http\Controllers\CrmController::class, 'best_deal_update']);

    Route::put('seller-call-me-back-update/{id}',[App\Http\Controllers\CrmController::class, 'seller_call_me_back_update']);
    Route::put('seller-service-enquiry-update/{id}',[App\Http\Controllers\CrmController::class, 'seller_service_enquiry_update']);
    Route::put('seller-liked-service-update/{id}',[App\Http\Controllers\CrmController::class, 'seller_liked_service_update']);
    Route::put('seller-today-chat-update/{id}',[App\Http\Controllers\CrmController::class, 'seller_today_chat_update']);
    Route::put('seller-best-deal-update/{id}',[App\Http\Controllers\CrmController::class, 'seller_best_deal_update']);

    Route::put('call-me-back-reopen/{id}',[App\Http\Controllers\CrmController::class, 'call_me_back_reopen']);
    Route::put('seller-enquiry-reopen/{id}',[App\Http\Controllers\CrmController::class, 'seller_enquiry_reopen']);
    Route::put('liked-service-reopen/{id}',[App\Http\Controllers\CrmController::class, 'liked_service_reopen']);
    Route::put('today-chat-reopen/{id}',[App\Http\Controllers\CrmController::class, 'today_chat_reopen']);
    Route::put('best-deal-reopen/{id}',[App\Http\Controllers\CrmController::class, 'best_deal_reopen']);


    Route::put('seller-call-me-back-reopen/{id}',[App\Http\Controllers\CrmController::class, 'seller_call_me_back_reopen']);
    Route::put('seller-service-enquiry-reopen/{id}',[App\Http\Controllers\CrmController::class, 'seller_service_enquiry_reopen']);
    Route::put('seller-liked-service-reopen/{id}',[App\Http\Controllers\CrmController::class, 'seller_liked_service_reopen']);
    Route::put('seller-today-chat-reopen/{id}',[App\Http\Controllers\CrmController::class, 'seller_today_chat_reopen']);
    Route::put('seller-best-deal-reopen/{id}',[App\Http\Controllers\CrmController::class, 'seller_best_deal_reopen']);


    Route::get('/call-me-back-history',[App\Http\Controllers\CrmController::class, 'call_me_back_history'])->name('call_me_back_history');
    Route::get('/seller-enquiry-history',[App\Http\Controllers\CrmController::class, 'seller_enquiry_history'])->name('seller_enquiry_history');
    Route::get('/liked-service-history',[App\Http\Controllers\CrmController::class, 'liked_service_history'])->name('liked_service_history');
    Route::get('/today-chat-history',[App\Http\Controllers\CrmController::class, 'today_chat_history'])->name('today_chat_history');
    Route::get('/best-deal-history',[App\Http\Controllers\CrmController::class, 'best_deal_history'])->name('best_deal_history');

    Route::get('/seller-call-me-back-history',[App\Http\Controllers\CrmController::class, 'seller_call_me_back_history'])->name('seller_call_me_back_history');
    Route::get('/seller-service-enquiry-history',[App\Http\Controllers\CrmController::class, 'seller_service_enquiry_history'])->name('seller_service_enquiry_history');
    Route::get('/seller-liked-service-history',[App\Http\Controllers\CrmController::class, 'seller_liked_service_history'])->name('seller_liked_service_history');
    Route::get('/seller-today-chat-history',[App\Http\Controllers\CrmController::class, 'seller_today_chat_history'])->name('seller_today_chat_history');
    Route::get('/seller-best-deal-history',[App\Http\Controllers\CrmController::class, 'seller_best_deal_history'])->name('seller_best_deal_history');
    // END CRM
    // code bijay end for crm 
    // CHAT BOT START
    Route::get('/chatbox',[App\Http\Controllers\UserController::class, 'chatbox'])->name('chatbox');
    Route::get('/view-user-messages/{seller_id}/{user_id}',[App\Http\Controllers\UserController::class, 'view_user_messages'])->name('view_user_messages');
    Route::post('/admin_replay_message',[App\Http\Controllers\UserController::class,'admin_replay_message']);
    Route::post('/admin_page_refresh', [App\Http\Controllers\UserController::class, 'admin_page_refresh'])->name('admin_page_refresh');
    // CHAT BOT END
    // Route::get('/dashboard', function () {
    //     return view('home.index');
    // })->middleware(['verified']);
    // Promotion start
    Route::get('/add-promotion-package',[App\Http\Controllers\UserController::class, 'add_promotion_package']);
    Route::get('/list-promotion-package',[App\Http\Controllers\UserController::class, 'list_promotion_package']);
    Route::get('/list-promotions',[App\Http\Controllers\UserController::class, 'promotionmanagement']);
    Route::get('promotion-package/edit/{id}', [App\Http\Controllers\UserController::class, 'editPromotionpackage'])->name('editPromotionpackage');
    Route::get('promotion/edit/{id}', [App\Http\Controllers\UserController::class, 'editPromotion'])->name('editPromotion');
    Route::put('update-promotion-package/{id}',[App\Http\Controllers\UserController::class, 'update_promotion_package']);
    Route::put('update-promotion/{id}',[App\Http\Controllers\UserController::class, 'update_promotion']);
    Route::post('save-promotion',[App\Http\Controllers\UserController::class, 'save_promotion']);
    Route::get('/get-names', [App\Http\Controllers\UserController::class,'getNames']);

    // Profile update start
    Route::get('/profile_list', [App\Http\Controllers\UserController::class, 'profile_list']);
    Route::put('/update-profile/{id}', [App\Http\Controllers\UserController::class, 'update_profile_list']);
    // Profile update end

    // Promotion end
   

    // Ratings start
    Route::get('/ratings',[App\Http\Controllers\RatingController::class, 'ratings']);
    Route::get('/upDateratingstatus',[App\Http\Controllers\RatingController::class, 'updateRatingstatus']);
    // Ratings end

    // Email setting start
    Route::get('/email-send-settings',[App\Http\Controllers\UserController::class, 'add_email_send_settings']);
    Route::get('email-send-settings/edit/{id}', [App\Http\Controllers\UserController::class, 'editEmail_send_setting'])->name('editEmail_send_setting');
    Route::put('update-email-send-settings/{id}',[App\Http\Controllers\UserController::class, 'update_email_send_setting']);
    // Email setting end

    // Ad management start
    Route::get('/admanagement',[App\Http\Controllers\UserController::class, 'admanagement']);
    Route::get('ad/edit/{id}', [App\Http\Controllers\UserController::class, 'editAd'])->name('editAd');
    Route::put('update-advertise/{id}',[App\Http\Controllers\UserController::class, 'update_advertise']);
    // Ad management end
// seller code start
    
    Route::get('/seller-edit/{id}',[App\Http\Controllers\UserController::class, 'editSeller']);
    Route::delete('/seller-delete/{id}',[App\Http\Controllers\UserController::class, 'deleteSeller']);
    
    Route::post('/user/account',[App\Http\Controllers\UserController::class, 'account']);
    Route::get('/add-seller',[App\Http\Controllers\UserController::class, 'addSeller']);
    Route::get('/list-seller',[App\Http\Controllers\UserController::class, 'listSeller']);
    Route::post('/search-seller-list',[App\Http\Controllers\UserController::class, 'search_seller_list']);
    Route::post('/save-seller',[App\Http\Controllers\UserController::class, 'save_seller']);
    Route::put('update-seller/{id}',[App\Http\Controllers\UserController::class, 'updateSeller']);

    Route::get('/impersonate/user/{email}',[App\Http\Controllers\ImpersonateController::class, 'impersonate']);
    Route::post('/email_available_check',[App\Http\Controllers\UserController::class,'email_available_check']); 
    
    // seller code end
    // trending services start
    Route::get('/list-trending_services',[App\Http\Controllers\UserController::class,'list_trending_services']);   
    Route::get('trendingcategory/edit/{id}', [App\Http\Controllers\UserController::class, 'editTrendingCategory'])->name('editTrendingCategory');
    Route::put('/update-trend-category/{id}',[App\Http\Controllers\UserController::class, 'save_trend_category']);
    // trending services end
    // Master Category code start
    Route::get('/add-category',[App\Http\Controllers\UserController::class,'add_category']);
    Route::get('/list-category',[App\Http\Controllers\UserController::class,'list_category']);   
    Route::get('/list-city',[App\Http\Controllers\UserController::class,'list_city']);   
    Route::post('/save-city',[App\Http\Controllers\UserController::class,'save_city']);
    Route::get('city/edit/{id}', [App\Http\Controllers\UserController::class, 'editCity'])->name('editCity');
    Route::put('/update-city/{id}',[App\Http\Controllers\UserController::class, 'update_city']);
    Route::post('/city_available_check',[App\Http\Controllers\UserController::class,'city_available_check']);
    Route::delete('/city-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_city']);
    Route::get('/filtercategory',[App\Http\Controllers\UserController::class,'filtercategory']);   
   
    Route::delete('/category-delete/{id}',[App\Http\Controllers\UserController::class, 'delete_category']);
    
    Route::post('/category-create', [App\Http\Controllers\UserController::class, 'createCategory']);

    Route::get('category/edit/{id}', [App\Http\Controllers\UserController::class, 'editCategory'])->name('editCategory');
    

    Route::put('/update-category/{id}',[App\Http\Controllers\UserController::class, 'save_category']);
    // Master Category code  code end
// Manage Role and permission start
Route::resource('permissions',\App\Http\Controllers\PermissionController::class);
Route::resource('roles',\App\Http\Controllers\RoleController::class);
Route::resource('users',\App\Http\Controllers\UsermanagementController::class);
// Manage Role and permission end

// Product service code start

Route::get('/add-product-service',[App\Http\Controllers\UserController::class,'add_product_service']);
Route::post('/save-product-service',[App\Http\Controllers\UserController::class,'save_product_service']);
Route::post('/getSellers',[App\Http\Controllers\UserController::class,'getSellers']);
Route::get('/list-service',[App\Http\Controllers\UserController::class,'list_service']);  
Route::post('/search-service', [App\Http\Controllers\UserController::class,'search_service']);


Route::get('/list-product',[App\Http\Controllers\UserController::class,'list_product']);
Route::get('/product-edit/{id}', [App\Http\Controllers\UserController::class, 'product_edit']); 
Route::post('/getProductcategory', [UserController::class, 'getProductcategory'])->name('getProductcategory'); 
Route::post('/getServicecategory', [UserController::class, 'getServicecategory'])->name('getServicecategory'); 
Route::get('/productstschange',[App\Http\Controllers\UserController::class,'productstschange']);
Route::get('/servicestschange',[App\Http\Controllers\UserController::class,'servicestschange']);
Route::put('/update-product/{id}',[App\Http\Controllers\UserController::class,'update_product']);
Route::get('/service-edit/{id}', [App\Http\Controllers\UserController::class, 'service_edit']); 
Route::put('/update-service/{id}', [App\Http\Controllers\UserController::class, 'update_service']); 
Route::delete('/product-delete/{id}', [App\Http\Controllers\UserController::class, 'deleteProduct']); 
Route::delete('/service-delete/{id}', [App\Http\Controllers\UserController::class, 'deleteService']); 
// Product service code end
// Individual service edit start
Route::get('/seller-service-edit/{id}', [App\Http\Controllers\UserController::class, 'seller_service_edit']); 
Route::put('/update-seller-service/{id}', [App\Http\Controllers\UserController::class, 'update_seller_service']);
// Individual service edit end


// verifiy-email

// working email send  but hold pause for now
    Route::get('/email/verify', [App\Http\Controllers\VerificationController::class,'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\VerificationController::class,'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [App\Http\Controllers\VerificationController::class,'resend'])->name('verification.resend');
// working email send  but hold pause for now

   
// verifiy-email end

// callback list start

Route::get('/callback-list', [App\Http\Controllers\UserController::class, 'callback_list']); 
Route::delete('/callback-delete/{id}', [App\Http\Controllers\UserController::class, 'callback_delete']); 

Route::get('/enquiry-list',[App\Http\Controllers\UserController::class, 'enquiry_list']);
Route::delete('/service_enquiry-delete/{id}',[App\Http\Controllers\UserController::class, 'service_enquiry_delete']);

Route::get('/seller-enquiry-list', [App\Http\Controllers\UserController::class, 'seller_enquiry_list']);
Route::delete('/seller_enquiry_delete/{id}', [App\Http\Controllers\UserController::class, 'seller_enquiry_delete']);  

Route::get('/claim-list',[App\Http\Controllers\UserController::class,'claim_list']);
// callback list end

});
Route::get('/impersonate/destroy',[App\Http\Controllers\ImpersonateController::class, 'destroy']);




// Frontend section for seller


Route::get('/fontend-home',[App\Http\Controllers\Frontend\FrontendController::class,'home']);
Route::get('/seller-register',[App\Http\Controllers\Frontend\FrontendController::class,'register']);
// Route::get('/frontend-register',[App\Http\Controllers\Frontend\FrontendController::class,'register']);
Route::post('/save-frontend-seller',[App\Http\Controllers\Frontend\FrontendController::class,'save_frontend_seller']);
Route::post('/seller_email_available_check',[App\Http\Controllers\Frontend\FrontendController::class,'seller_email_available_check']); 
Route::post('/seller_phone_available_check',[App\Http\Controllers\Frontend\FrontendController::class,'seller_phone_available_check']); 
//end Frontend section



// Frontend customer section

Route::get('/',[App\Http\Controllers\CustomerController::class,'home']);
// Route::get('/homepage',[App\Http\Controllers\CustomerController::class,'home']); 

Route::get('/free-listing',[App\Http\Controllers\CustomerController::class,'free_listing']);
Route::post('/save_advertising',[App\Http\Controllers\CustomerController::class,'save_advertising']);
Route::post('/save-freelisting',[App\Http\Controllers\CustomerController::class,'save_freelisting']);

// Route::get('/fontend-home',[App\Http\Controllers\CustomerController::class,'home']);
Route::get('/customer-register',[App\Http\Controllers\CustomerController::class,'register']);
Route::post('/save-customer',[App\Http\Controllers\CustomerController::class,'save_customer']);
Route::post('/customer_email_available_check',[App\Http\Controllers\CustomerController::class,'customer_email_available_check']); 

Route::post('/customer_phone_available_check',[App\Http\Controllers\CustomerController::class,'customer_phone_available_check']); 
// category and subcategory start
// Route::get('/servicecategory/{id}/{subcategory?}', [App\Http\Controllers\CustomerController::class, 'servicecategory']);
Route::get('/servicecategory/{id}',[App\Http\Controllers\CustomerController::class,'servicecategory']); 
Route::get('/service_subcategory/subcat/{id}',[App\Http\Controllers\CustomerController::class,'service_sub_category']); 

// category and subcategory end
// load more data code for service start
Route::get('/servicecategory/{id}/load-more', [App\Http\Controllers\CustomerController::class, 'loadMoreData'])->name('servicecategory.loadmore');
// load more data code for service end
Route::get('/service-detail/{id}',[App\Http\Controllers\CustomerController::class,'servicedetail']);
Route::get('/product/{id}',[App\Http\Controllers\CustomerController::class,'productlist']);
Route::get('/product_detail/{id}',[App\Http\Controllers\CustomerController::class,'product_detail']);
Route::post('/save_service_enuiry',[App\Http\Controllers\CustomerController::class,'save_service_enuiry']);
Route::post('/save_claim/{id}',[App\Http\Controllers\CustomerController::class,'save_claim']);
// Best deal start
Route::post('/save_bestdeal/{id}',[App\Http\Controllers\CustomerController::class,'save_bestdeal']);
Route::post('/save_bestdeal_ajax/{id}',[App\Http\Controllers\CustomerController::class,'save_bestdeal_ajax']);
// Best deal end

Route::post('/save_seller_contact/{id}',[App\Http\Controllers\CustomerController::class,'save_seller_contact']);
Route::post('/save_callback_enuiry/{id}',[App\Http\Controllers\CustomerController::class,'save_callback_enuiry']);

Route::post('/services/like', [App\Http\Controllers\CustomerController::class, 'like'])->name('services.like');
Route::post('/updatewishlist', [App\Http\Controllers\CustomerController::class, 'updatewishlist'])->name('services.updatewishlist');
Route::get('/search', [App\Http\Controllers\CustomerController::class, 'search']);
Route::get('/allservice', [App\Http\Controllers\CustomerController::class, 'allservice']);
Route::get('/allproducts_page', [App\Http\Controllers\CustomerController::class, 'allproducts_page']);
Route::get('/service_list_ajax', [App\Http\Controllers\CustomerController::class, 'service_list_ajax']);
Route::get('/advertise-with-us', [App\Http\Controllers\CustomerController::class, 'advertise_with_us']);
Route::post('/getServicecategory', [UserController::class, 'getServicecategory'])->name('getServicecategory'); 

Route::post('/getProductcategory', [UserController::class, 'getProductcategory'])->name('getProductcategory'); 

Route::get('/sort_filter',[App\Http\Controllers\CustomerController::class,'sort_filter']);
Route::get('/about_us',[App\Http\Controllers\CustomerController::class,'about_us']);
Route::get('/contact_us',[App\Http\Controllers\CustomerController::class,'contact_us']);
Route::get('/faq',[App\Http\Controllers\CustomerController::class,'faq']);
Route::get('/privacy',[App\Http\Controllers\CustomerController::class,'privacy']);
Route::get('/terms',[App\Http\Controllers\CustomerController::class,'terms']);
Route::get('/sort_rate_filter',[App\Http\Controllers\CustomerController::class,'sort_rate_filter']);
Route::get('/sort_top_rate_filter',[App\Http\Controllers\CustomerController::class,'sort_top_rate_filter']);
Route::get('/sort_verified_filter',[App\Http\Controllers\CustomerController::class,'sort_verified_filter']);
Route::get('/sort_most_liked_filter',[App\Http\Controllers\CustomerController::class,'sort_most_liked_filter']);
Route::get('/sort_product/{order}', [App\Http\Controllers\CustomerController::class,'sort_product'])->name('sort_product');



// inner search page start 
Route::get('/servicecategory_ajax/{categoryId}', [App\Http\Controllers\CustomerController::class, 'serviceCategoryAjax']);
Route::get('/service_subcategory_ajax/{subCategory}/{subCategoryId}', [App\Http\Controllers\CustomerController::class, 'serviceSubcategoryAjax']);
Route::post('/add-rating', [App\Http\Controllers\CustomerController::class, 'addRating']) ; 



Route::group(['middleware' => ['auth','is_customer']],function(){
    Route::put('/customer-password-update', [App\Http\Controllers\CustomerController::class, 'customer_password_update']) ; 
    Route::get('/customer-profile-password', [App\Http\Controllers\CustomerController::class, 'customer_profile_password']) ; 
    Route::get('/customer-profile-view', [App\Http\Controllers\CustomerController::class, 'customer_profile_view']) ; 
    Route::put('/customer-profile-update/{id}', [App\Http\Controllers\CustomerController::class, 'customer_profile_update']); 
    Route::get('/homepage',[App\Http\Controllers\CustomerController::class,'home']);     
    Route::get('/customer_profile', [App\Http\Controllers\CustomerController::class, 'customer_profile']);
     // Wishlist start
     Route::get('/wished-list-business',[App\Http\Controllers\CustomerController::class, 'wished_list_business']);
     Route::delete('/wishlist-delete/{id}',[App\Http\Controllers\CustomerController::class, 'deleteWished']);
     // Wishlist end
});
// inner search page end
//end Frontend customer section

// Google login start for customer 
Route::get('auth/google', [App\Http\Controllers\GoogleController::class, 'loginWithGoogle'])->name('gmail.login');
// Route::get('auth/google/{type}', [App\Http\Controllers\GoogleController::class, 'loginWithGoogle'])->name('gmail.login');
Route::get('auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
// Google login end
// Facebook start
 Route::prefix('facebook')->name('facebook.')->group(function(){
    Route::get('auth',[FacebookController::class,'loginUsingFacebook'])->name('login');
    // Route::get('auth/{type}',[FacebookController::class,'loginUsingFacebook'])->name('login');
    Route::get('callback',[FacebookController::class,'callbackFromFacebook'])->name('callback');
 });
// Facebook end


// CHAT BOT START
Route::get('/chatbot/{id}', [App\Http\Controllers\CustomerController::class, 'chatbot'])->name('chatbot');
Route::post('/store_chatbot_message',[App\Http\Controllers\CustomerController::class,'store_chatbot_message']);
Route::get('/chat_messages', [App\Http\Controllers\CustomerController::class, 'chat_messages'])->name('chat_messages');
Route::post('/user_page_refresh', [App\Http\Controllers\CustomerController::class, 'user_page_refresh'])->name('user_page_refresh');
// CHAT BOT END
// claim status check
Route::get('/check-claim-status/{seller_id}', [App\Http\Controllers\ClaimController::class, 'checkClaimStatus']);


