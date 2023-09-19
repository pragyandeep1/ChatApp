<?php

namespace App\Http\Controllers;

use App\Models\Admanagement;
use App\Models\Advertise_with_us;
use App\Models\Callback_enquiry;
use App\Models\Category;
use App\Models\ChatMessage;
use App\Models\City;
use App\Models\Claimedrequest;
use App\Models\Customer;
use App\Models\Emailsetting;
use App\Models\Freelisting;
use App\Models\Likedservice;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\ProspectLead;
use App\Models\Rating;
use App\Models\Seller_enquiry_details;
use App\Models\Sellerinfo;
use App\Models\Service;
use App\Models\Service_enquiry;
use App\Models\Trendingservice;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
    public function home(){
        // $currentUrl = url()->current();
        // $parsedUrl = parse_url($currentUrl);
        // $path = ltrim($parsedUrl['path'], '/');
        if (Auth::guard('customer')->check()) {
            $customerName = Auth::guard('customer')->user()->full_name;
        } else {
            // Customer is not logged in
            $customerName = null;
        }
        $services = Category::where('type', '=', 'service')->where('parent_id', null)->limit(20)->get();
        $products = Category::where('type', '=', 'product')->where('parent_id', null)->get();
        $cities = City::get();


        // Ads count start
        // Fetch categories with parent_id as null
            $parentCategories = Category::whereNull('parent_id')->pluck('id');

            // Fetch categories with parent_id equal to the above fetched ids
            $childCategories = Category::whereIn('parent_id', $parentCategories)->pluck('id');

            // // Count the number of records under each child category in the services table
            // $servicesCount = Service::whereIn('category_idc', $childCategories)
            //     ->groupBy('category_id')
            //     ->select('category_id', DB::raw('COUNT(*) as count'))
            //     ->get();
        // Ads count end
        // $trending_services = Trendingservice::get();
        return view('customer.homepage',compact('services','products','customerName','cities')); 
        // return view('layouts.frontend_layout.layouts.master'); 
     }
     public function free_listing(){
        $cities = City::get();
        return view('customer.free_listing',compact('cities')); 
     }
     public function save_advertising(Request $request){
        $data = $request->all();
        $free_listing_data = new Advertise_with_us();
        $free_listing_data->companyName = $data['companyName'];
                $free_listing_data->city = $data['city'];
                $free_listing_data->nameprefix = $data['nameprefix'];
                $free_listing_data->lastName = $data['lastName'];
                $free_listing_data->mobileNumber = $data['mobileNumber'];
                $free_listing_data->landlineNumber = $data['landlineNumber']??'';
                $free_listing_data->save();
                return redirect()->back()->with('success', 'Your data saved successfully.');
     }
     public function register(){
         return view('customer.customer_register');
     }
     public function save_customer(Request $request){
        if ($request->isMethod('post')) {
            $seller = new Customer();
                $users = new User();
             $data = $request->all();
            //  echo '<pre>';print_r($data);exit;
            // $userCount=User::where('email',$data['email'])->count();

             // Check if a user with the same email already exists
        $user = User::where('email', $data['email'])->first();

        // Check if a customer with the same email already exists
        $customer = Customer::where('email', $data['email'])->first();
            if($user && $customer){
            // if($userCount>0){
                $message="Email Already Exists!";
                Session::flash('error_message',$message);
                return redirect()->back(); 
            }
            else{
                
                $seller->full_name = $data['full_name'];
                $seller->mobile = $data['mobile'];
                $seller->email = $data['email'];
                $seller->full_address = $data['full_address'];
                $seller->dob = $data['dob'];
                $seller->state = $data['state'];
                $seller->city = $data['city'];
                $seller->password=bcrypt($data['password']);
                $seller->pincode = $data['pincode'];
    
                $users->mobile = $data['mobile'];
                $users->email=$data['email'];
                $users->name=$data['full_name'];
                $users->password=bcrypt($data['password']);
                $users->status=0;
                $users->user_type='customer';
                
                $seller->save();
                $users->save();
    
                // Send Confirmation Email
                $email = $data['email'];
                $messageData = [
                    'email'=> $data['email'],
                    'name'=>$data['full_name'],
                    'code'=>base64_encode($data['email'])
                ];
                Mail::send('emails.confirmation',$messageData,function($message) use($email){
                $message->to($email)->subject('Confirm Your Email Account for Registration');
                });
    
                // Redirect Back With Success Message
    
                $message="Please Check Your Email For Confirmation to Activate Your Account!";
                Session::put('success_message',$message);
                // return redirect()->back();
                // event(new Registered($users));
                auth()->login($users);
                // return redirect('/otp/login');
                // return redirect('/dashboard');
                return redirect('/homepage');
                
            }
             
             // return view('layouts.frontend_layout.layouts.frontend_login')->with('success', 'Data added successfully');
         }
     }
     public function customer_email_available_check(Request $request){
        $email = $request->input('email');
        $Registered_count = User::where('email',$email)->count();
        // $Customer_count = Customer::where('email',$email)->count();
        if ($Registered_count) {
        // if ($Registered_count && $Customer_count) {
            $msg = 'registered';
        }else{
            $msg = 'failed';
        }
       return response()->json(['registered' => $msg]);
     }
     public function customer_phone_available_check(Request $request){
        $mobile = $request->input('mobile');
        $Registered_count = User::where('mobile',$mobile)->count();
        if ($Registered_count) {
            $msg = 'registered';
        }else{
            $msg = 'failed';
        }
       return response()->json(['registered' => $msg]);
     }
    
     public function servicecategory($id)
    {
        $ads = Admanagement::first();
        $parent_category = Category::where('id', $id)->first();
        $allcategory = Category::where('parent_id', $id)->get();
        $subcategories = Category::where('parent_id', $id)->get();
        $cities = City::get();
        $category = Category::where('parent_id', $id)->first(); 

        $package1SellerIds = [];
        $otherSellerIds = [];
        $package1 = [];

        if ($allcategory->isNotEmpty()) {
            $categoryIds = $allcategory->pluck('id')->toArray();
            $seller_info_ids = Sellerinfo::whereIn('category_id',$categoryIds)->get();
            $allSellerInfoIds = $seller_info_ids->pluck('id')->toArray();
// dd($categoryIds);
            $sellerIdsString = Promotion::where('package_name', 'package1')
                ->where('category_id', $id)
                ->pluck('ids_for_promotions')
                ->first();
                
            if ($sellerIdsString) {
                $package1 = json_decode($sellerIdsString, true);
            }
            
            $package1SellerIds = $package1;
           
            $otherSellerIds = array_diff($allSellerInfoIds, $package1SellerIds);
            // $otherSellerIds = array_diff($categoryIds, $package1SellerIds);
            
            $perPage = 6;

            if (!empty($package1SellerIds)) {
                $seller_infos = Sellerinfo::whereIn('id', array_merge($package1SellerIds, $otherSellerIds))
                    ->orderByRaw("
                        CASE
                            WHEN id IN (" . implode(',', $package1SellerIds) . ") THEN 0
                            ELSE 1
                        END, google_rating DESC, company_name ASC
                    ")
                    ->paginate($perPage);
                    
            } else {
                // $seller_infos = Sellerinfo::whereIn('id', $otherSellerIds)
                $seller_infos = Sellerinfo::whereIn('category_id', $categoryIds)
                    ->orderBy('google_rating', 'desc')
                    ->orderBy('company_name', 'asc')
                    ->paginate($perPage);
                    
            }
        } else {
            $categoryIds = [];
            $seller_infos = [];
        }

        
        return view('customer.servicecategory', compact('parent_category', 'seller_infos', 'ads', 'categoryIds', 'subcategories', 'cities', 'package1', 'category'));
    }



     
    public function servicecategorybackup($id){
        
        $ads = Admanagement::first();
        $parent_category = Category::where('id', $id)->first();
        $category = Category::where('parent_id', $id)->first(); 
        $allcategory = Category::where('parent_id', $id)->get(); 
        $subcategories = Category::where('parent_id',$id)->get();
        $cities = City::get();
       if ($allcategory->isNotEmpty()) {
        $categoryIds = $allcategory->pluck('id')->toArray();
        // dd($categoryIds);
    
        //   $seller_infos = Sellerinfo::whereIn('category_id',$categoryIds)->orderBy('google_rating', 'desc')->orderBy('company_name', 'asc')->paginate(6);
          $seller_info_ids = Sellerinfo::whereIn('category_id',$categoryIds)->get();
          $allSellerInfoIds = $seller_info_ids->pluck('id')->toArray();
          $perPage = 6;
          $seller_infos = Sellerinfo::getSellerInfosWithPromotions($allSellerInfoIds, $perPage,$id);
        //   dd($seller_infos);
       }else{
        $seller_infos = [];
       }
       
        return view('customer.servicecategory',compact('category','seller_infos','parent_category','subcategories','ads','cities','categoryIds','allSellerInfoIds'));
    }
    public function service_sub_category($subcat){
        // dd($subcat);
        $ads = Admanagement::first();
        $category = Category::where('id', $subcat)->first(); 
        $parent_category = Category::where('id', $category->parent_id)->first();
        $subcategories = Category::where('parent_id',$subcat)->get();
        if ($subcat) {
            
              $seller_infos = Sellerinfo::where('category_id',$subcat)->orderBy('google_rating', 'desc')->orderBy('company_name', 'asc')->paginate(6);
           }else{
            $seller_infos = [];
           }
           $cities = City::get();
            return view('customer.service_sub_category',compact('category','seller_infos','parent_category','subcategories','ads','cities'));
    }
    public function loadMoreData($id)
    {
        $category = Category::where('id', $id)->first();
        $seller_infos = Sellerinfo::where('category_id', $category->id)->orderBy('google_rating', 'desc')->orderBy('company_name', 'asc')->paginate(6);
        $count_wishlist = 0;
        $sellerIds = $seller_infos->pluck('id');
        $user_id = Auth::user() ? Auth::user()->id : null;
        $count_wishlists = Likedservice::countWishlistForServices($user_id, $seller_infos);

        // foreach ($seller_infos->items() as $seller_info) {
        //     $count_wishlist += Likedservice::countWishlist($seller_info['id']);
        // }
        
        $is_authenticated =Auth::check();
        
        return response()->json([
            'seller_infos' => $seller_infos,
            'category' => $category,
            'count_wishlists' => $count_wishlists,
            'is_authenticated' => $is_authenticated,
            'user_id' => $user_id,
        ]);
    }

    public function productlist($id){
        $products = Category::where('type', '=', 'product')->where('id','=',$id)->first();
        $product_list = Product::where('category_id','=',$id)->where('status','=',1)->get();
        $category_list = Category::where('type','=','product')->where('parent_id','=',NULL)->get();
        // echo '<pre>';print_r($product_list);exit;
        return view('customer.product',compact('products','product_list','category_list'));
    }
    public function product_detail($id){
        $product_detail = Product::where('id','=',$id)->first();
        $category_list = Category::where('type','=','product')->where('parent_id','=',NULL)->get();
        // echo '<pre>';print_r($category_list);exit;
        return view('customer.product_detail',compact('product_detail','category_list'));
    }
    public function servicedetail_pastweek($id){
        // session code start
        $key = "seller_service_detail_visits_$id";

       

        // Get the visit count from the database (assuming you have a 'visit_count' column in your table)
        $visitCount = DB::table('sellerinfos')
            ->where('id', $id) // Replace 'seller_id' with the appropriate column name in your table
            ->value('view');

        // Check if the session data exists and if it's relevant within the last week
        if (Session::has($key) && now()->diffInSeconds(Session::get($key . '_timestamp')) <= 604800) {
            // Increment the visit count
            $visitCount++;
        } else {
            // Reset the visit count for the current visit
            $visitCount = 1;
        }

        // Update the database with the updated visit count
        DB::table('sellerinfos')
            ->where('id', $id) // Replace 'seller_id' with the appropriate column name in your table
            ->update(['view' => $visitCount]);

        // Store the current timestamp in the session
        Session::put($key . '_timestamp', now());
        
        $service_id = $id;
        $seller_data = Sellerinfo::where('id',$id)->first();
        $cities = City::get();
        $category = Category::where('id', $seller_data->category_id)->first();
        $user_data = User::where('email',$seller_data->email)->orWhere('mobile', $seller_data->phone)->first();
        $service_info = Service::where('category_id',$seller_data->category_id)->where('seller_name',$seller_data->company_name)->first();
        // $service_info = Service::where('category_id',$seller_data->category_id)->first();
        // dd($seller_data);
        $meta_title = $service_info->seo_title;
        $meta_desc = $service_info->seo_desc;
        $meta_tags = $service_info->seo_tags;

        $ratings = Rating::with('user')->where('status',1)->where('seller_id',$id)->orderBy('id','desc')->get()->toArray();
        // Calcualtion average rating start
         $ratingsum = Rating::where('status',1)->where('seller_id',$id)->sum('rating');
         $ratingcount = Rating::where('status',1)->where('seller_id',$id)->count();
         if ($ratingcount >0) {
            $avgRating = round($ratingsum/$ratingcount,1);
            $avgStarRating = round($ratingsum/$ratingcount);
         }else {
            $avgRating = 0;
            $avgStarRating = 0;
         }
        //  $seller_data->view = $visitCount;
        //  $seller_data->save();
        // Calcualtion average rating end
        // echo '<pre>';print_r($meta_tags);exit;
        // $service_info = Service::where('seller_name',$user_data->id)->first();
        return view('customer.servicedetail',compact('seller_data','user_data','service_info','category','meta_title','meta_desc','meta_tags','cities','ratings','avgRating','avgStarRating','service_id'));
    }
    public function servicedetail($id){
        // session code start
        $key = "seller_service_detail_visits_$id";

        if (!Session::has($key)) {
            Session::put($key, 1);
        } else {
            Session::increment($key);
        }

        $visitCount = Session::get($key, 0);
        // dd($visitCount);
        // Store the visitCount in a session variable accessible from servicecategory
        Session::put('servicecategory_visitCount', $visitCount);
        // session code end
        
        $service_id = $id;
        $seller_data = Sellerinfo::where('id',$id)->first();
        $cities = City::get();
        $category = Category::where('id', $seller_data->category_id)->first();
        $user_data = User::where('email',$seller_data->email)->orWhere('mobile', $seller_data->phone)->first();
        $service_info = Service::where('category_id',$seller_data->category_id)->where('seller_name',$seller_data->company_name)->first();
        // $service_info = Service::where('category_id',$seller_data->category_id)->first();
        // dd($seller_data);
        $meta_title = $service_info->seo_title;
        $meta_desc = $service_info->seo_desc;
        $meta_tags = $service_info->seo_tags;

        $ratings = Rating::with('user')->where('status',1)->where('seller_id',$id)->orderBy('id','desc')->get()->toArray();
        // Calcualtion average rating start
         $ratingsum = Rating::where('status',1)->where('seller_id',$id)->sum('rating');
         $ratingcount = Rating::where('status',1)->where('seller_id',$id)->count();
         if ($ratingcount >0) {
            $avgRating = round($ratingsum/$ratingcount,1);
            $avgStarRating = round($ratingsum/$ratingcount);
         }else {
            $avgRating = 0;
            $avgStarRating = 0;
         }
         $seller_data->view = $visitCount;
         $seller_data->save();
        // Calcualtion average rating end
        // echo '<pre>';print_r($meta_tags);exit;
        // $service_info = Service::where('seller_name',$user_data->id)->first();
        return view('customer.servicedetail',compact('seller_data','user_data','service_info','category','meta_title','meta_desc','meta_tags','cities','ratings','avgRating','avgStarRating','service_id'));
    }
    public function save_service_enuiry(Request $request){
      
            $service_enquiry = new Service_enquiry();
                
             $data = $request->all();

             $seller_id = $data['seller_id'];
             $seller_info = Sellerinfo::find($seller_id); 
             $company_name = $seller_info->company_name ?? $seller_info->seller_name;

                $service_enquiry->name = $data['name'];
                $service_enquiry->email = $data['email'];
                $service_enquiry->mobile = $data['mobile'];
                $service_enquiry->business_no = $data['business_no'];
                $service_enquiry->gst_no = $data['gst_no'];
                $service_enquiry->seller_id = $seller_id;

                $email_send_detail = Emailsetting::where('purpose','Enquiry Mail setting')->first();
                $email = $email_send_detail->email;
                
                $service_enquiry->save();
                $messageData = [
                        'mobile'=>$data['mobile'],
                        'company_name'=> $seller_info->company_name,
                        'seller_name'=> $seller_info->seller_name,
                    ];
                Mail::send('emails.callback_enquiry',$messageData,function($message) use($email, $company_name){
                    $message->to($email)->subject('Request for Enquiry About The Business '.$company_name);
                    });
                
                return redirect('/homepage');
                
           

    }
    public function save_claim(Request $request,$service_id){
        // dd($request);
        $claimedrequest = new Claimedrequest();
        
        $service_info = Service::find($service_id); 
        // $seller_info = Sellerinfo::find($seller_id); 
        $company_name = $service_info->seller_name;
        // $company_name = $service_info->company_name ?? $service_info->seller_name;
        // dd($seller_info);    
        $data = $request->all();
        $seller_id = $data['seller_id'];

           $claimedrequest->name = $data['name'];
           $claimedrequest->email = $data['email'];
           $claimedrequest->mobile = $data['mobile'];
           $claimedrequest->service_id = $service_id;
        //    $claimedrequest->service_id = $data['service_id'];
           
           $claimedrequest->save();
           $email_send_detail = Emailsetting::where('purpose','Claim Mail Setting')->first();
           $email = $email_send_detail->email;
        //    $email = 'kalyani@digitalrath.info';
                    $messageData = [
                        'mobile'=>$data['mobile'],
                        'company_name'=> $service_info->company_name,
                        'seller_name'=> $service_info->seller_name,
                    ];
                Mail::send('emails.callback_enquiry',$messageData,function($message) use($email, $company_name){
                    $message->to($email)->subject('Request for Claiming the Business '.$company_name);
                    });
                session()->flash("success","Service Provider will contact shortly.");

           // Set a cookie to track the application
            Cookie::queue('claim_application', 'pending', 30 * 24 * 60); // Set the cookie for 60 minutes
            // if ($request->hasCookie('claim_application')) {
               
            //     return 'Cookie is set.';
            // } else {
              
            //     return 'Cookie is not set.';
            // }
           return redirect('/service-detail/'.$seller_id);
        //    return redirect('/service-detail/'.$seller_info->id);
    }
    public function save_bestdeal(Request $request,$seller_id){
        $data = $request->all();
        // if (!Auth::check()) {
        //     $message = "Login to get best deals";
        //     Session::flash('error_message',$message);
        //     return redirect()->back();
        // }
        $city_name =   $data['best_deal_city'];
        $prospectleads = new ProspectLead();
        // $seller_info = Sellerinfo::where('category_id', $data['category_id'])
        // ->where('google_ratingd', '>', 3) 
        // ->where('city',$city_name) 
        // ->take(5) 
        // ->get();
        $seller_info = Sellerinfo::where('category_id', $data['category_id'])
        ->where('google_rating', '>', 3)
        ->take(5)
        ->get();
        // $seller_info = Sellerinfo::find($seller_id); 
        $category_info = Category::find($data['category_id']); 
        // dd($seller_info);
        
        // $company_name = $seller_info->company_name ?? $seller_info->seller_name;
        $category_name = $category_info->name;
        // dd($seller_info); 
           
           $prospectleads->name = $data['name'];
           $prospectleads->email = $data['email'];
           $prospectleads->mobile = $data['mobile'];
           $prospectleads->category_id = $data['category_id'];
           $prospectleads->seller_id = $seller_id;
           $prospectleads->user_id = Auth::user()->id;
           
           $prospectleads->save();
           $email_send_detail = Emailsetting::where('purpose','Best Deals')->first();
           $email = $data['email'];
             // Extract the required information from the seller_info collection
            $companyNames = $seller_info->pluck('company_name')->toArray();
            $mobileNumbers = $seller_info->pluck('phone')->toArray();
            $emails = $seller_info->pluck('email')->toArray();
            $googleRatings = $seller_info->pluck('google_rating')->toArray();
            $messageData = [
                'category_name' => $category_name,
                'company_names' => $companyNames,
                'mobile_numbers' => $mobileNumbers,
                'google_ratings' => $googleRatings,
                'emails' => $emails,
                'seller_info' => $seller_info,
                'mobile' => $data['mobile'], // Include the mobile number in messageData
            ];
                    // $messageData = [
                    //     'seller_data' => $seller_info,
                    // ];
                Mail::send('emails.best_deal',['messageData' => $messageData],function($message) use($email, $category_name){
                    $message->to($email)->subject('Best Deals From '.$category_name);
                    });

                    // Construct the message content for SMS
                    $messageBody = "Hello User,\n";
                    $messageBody .= "Here are the best deals from {$category_name}:\n";

                    foreach ($messageData['company_names'] as $key => $companyName) {
                        $messageBody .= "- {$companyName}\n";
                        $messageBody .= "  Mobile Number: {$messageData['mobile_numbers'][$key]}\n";
                        $messageBody .= "  Email: {$messageData['emails'][$key]}\n";
                        $messageBody .= "   Rating: {$messageData['google_ratings'][$key]}\n";
                    }

                    // $messageBody .= "\nContact Mobile Number: {$messageData['mobile']}";

                    // Send the SMS using your VerificationCode class
                 
                    VerificationCode::sendSms($data['mobile'], $messageBody);


                session()->flash("success","Best deals will be sent to you");

           
           return redirect('/servicecategory/'.$category_info->parent_id);
    }
    public function save_bestdeal_ajax(Request $request,$seller_id){
        $data = $request->all();
        
        $city_name =   $data['city'];
        $prospectleads = new ProspectLead();
        // $seller_info = Sellerinfo::where('category_id', $data['category_id'])
        // ->where('google_ratingd', '>', 3) 
        // ->where('city',$city_name) 
        // ->take(5) 
        // ->get();
        $seller_info = Sellerinfo::where('category_id', $data['category_id'])
        ->where('google_rating', '>', 3)
        ->take(5)
        ->get();
        // $seller_info = Sellerinfo::find($seller_id); 
        $category_info = Category::find($data['category_id']); 
        // dd($seller_info);
        
        // $company_name = $seller_info->company_name ?? $seller_info->seller_name;
        $category_name = $category_info->name;
        // dd($seller_info); 
           
           $prospectleads->name = $data['name'];
           $prospectleads->email = $data['email'];
           $prospectleads->mobile = $data['mobile'];
           $prospectleads->category_id = $data['category_id'];
           $prospectleads->seller_id = $seller_id;
           $prospectleads->user_id = Auth::user()->id;
           
           $prospectleads->save();
           $email = $data['email'];
             // Extract the required information from the seller_info collection
            $companyNames = $seller_info->pluck('company_name')->toArray();
            $mobileNumbers = $seller_info->pluck('phone')->toArray();
            $emails = $seller_info->pluck('email')->toArray();
            $googleRatings = $seller_info->pluck('google_rating')->toArray();
            $messageData = [
                'category_name' => $category_name,
                'company_names' => $companyNames,
                'mobile_numbers' => $mobileNumbers,
                'google_ratings' => $googleRatings,
                'emails' => $emails,
                'seller_info' => $seller_info,
                'mobile' => $data['mobile'], // Include the mobile number in messageData
            ];
                    // $messageData = [
                    //     'seller_data' => $seller_info,
                    // ];
                Mail::send('emails.best_deal',['messageData' => $messageData],function($message) use($email, $category_name){
                    $message->to($email)->subject('Best Deals From '.$category_name);
                    });

                    // Construct the message content for SMS
                    $messageBody = "Hello User,\n";
                    $messageBody .= "Here are the best deals from {$category_name}:\n";

                    foreach ($messageData['company_names'] as $key => $companyName) {
                        $messageBody .= "- {$companyName}\n";
                        $messageBody .= "  Mobile Number: {$messageData['mobile_numbers'][$key]}\n";
                        $messageBody .= "  Email: {$messageData['emails'][$key]}\n";
                        $messageBody .= "   Rating: {$messageData['google_ratings'][$key]}\n";
                    }

                    // $messageBody .= "\nContact Mobile Number: {$messageData['mobile']}";

                    // Send the SMS using your VerificationCode class
                 
                    // VerificationCode::sendSms($data['mobile'], $messageBody);
                    return response()->json(['message' => 'Please Check your mail']);
        
    }
    public function save_seller_contact(Request $request,$id){
        $service_enquiry = new Seller_enquiry_details();
        $product_detail = Product::where('id','=',$id)->first();
                
             $data = $request->all();
                
                $service_enquiry->name = $data['name'];
                $service_enquiry->email = $data['email'];
                $service_enquiry->mobile = $data['mobile'];
                $service_enquiry->business_no = $data['business_no'];
                $service_enquiry->gst_no = $data['gst_no'];
                
                $service_enquiry->save();

                $email = 'tusar@digitalrath.info';
                // $email = $data['email'];
                    $messageData = [
                        'email'=> $data['email'],
                        'name'=>$data['name'],
                        'product_title'=> $product_detail->product_title
                    ];
                Mail::send('emails.seller_enquiry',$messageData,function($message) use($email){
                    $message->to($email)->subject('Request from Customer for enquiry');
                    });
                session()->flash("success","Seller contacted successfully.");
                return redirect()->back()->with('success', 'Seller contacted successfully.');
    }
    public function save_callback_enuiry(Request $request,$id){
        $seller_detail = Sellerinfo::where('id',$id)->first();
        $callback_enquiry = new Callback_enquiry();
        $data = $request->all();
                
                $callback_enquiry->name = $data['name'];
                $callback_enquiry->mobile = $data['mobile'];
                $callback_enquiry->seller_id = $id;
                
                $callback_enquiry->save();

                // $email = 'tusar@digitalrath.info';
                // $email = 'kalyani@digitalrath.info';
                $email_send_detail = Emailsetting::where('purpose','Callback Email Setting')->first();
                $email = $email_send_detail->email;
                    $messageData = [
                        'mobile'=>$data['mobile'],
                        'company_name'=> $seller_detail->company_name,
                        'seller_name'=> $seller_detail->seller_name,
                    ];
                Mail::send('emails.callback_enquiry',$messageData,function($message) use($email){
                    $message->to($email)->subject('Request from Customer for enquiry');
                    });
                session()->flash("success","Service Provider will contact shortly.");
                return redirect()->back()->with('success', 'Service Provider will contact shortly.');
    }
    public function like(Request $request)
    {
        $serviceId = $request->input('service_id');
        $userId = $request->input('user_id');

        // Check if the liked service already exists in the LikedService table
        $likedService = LikedService::where('service_id', $serviceId)
            ->where('user_id', $userId)
            ->first();

        if ($likedService) {
            // If the liked service exists, delete it (unlike)
            if($likedService->status == 0){
                $likedService->status  = 1;
                $status =1;
                $likedService->update();
                $message = 'Service unliked successfully.';
            }else{
                $likedService->status  = 0;
                $status =0;
                $likedService->update();
                $message = 'Service liked successfully.';
            }
           
           
        } else {
            // If the liked service does not exist, create it (like)
            $likedService = new LikedService();
            $likedService->service_id = $serviceId;
            $likedService->user_id = $userId;
            $likedService->status = 1;
            $status =1;
            $likedService->save();
            $message = 'Service liked successfully.';
        }

        return response()->json(['message' => $message,'status'=> $status]);
    }
    public function updatewishlist(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            
            $serviceId = $data['service_id'];
            $userId = $data['user_id'];  
            $countWishlist = Likedservice::countWishlist($serviceId);
            if ($countWishlist == 0) {
                $likedService = new Likedservice();
                $likedService->user_id = Auth::user()->id;
                $likedService->service_id = $serviceId;
                $likedService->save();
                return response()->json(['status' => true,'action'=> 'add']);
            }else {
                Likedservice::where(['user_id'=> Auth::user()->id,'service_id'=> $serviceId])->delete();
                return response()->json(['status' => true,'action'=> 'remove']);
            }
            
        }
       

        
    }
    public function search(Request $request)
    {
        // dd($request);
        $cityId = $request->input('city');
        $searchName = $request->input('search_name');
        $category = $request->input('category');
        $inputType = $request->input('input_type');
// dd($searchName);
        $tags = explode(',', $searchName);
        // Assuming $inputType contains the value of the input_type (either "company_name" or "seo_tags")
// and $searchName contains the value of the search input

        $services = Sellerinfo::join('services', function ($join) use ($searchName, $inputType) {
            $join->on('sellerinfos.category_id', '=', 'services.category_id');

            if ($inputType === 'company_name') {
                // If the input_type is 'company_name', search by company_name
                $join->on('sellerinfos.company_name', '=', 'services.seller_name')
                    ->where('sellerinfos.company_name', 'LIKE', '%' . $searchName . '%');
            } elseif ($inputType === 'seo_tags') {
                // If the input_type is 'seo_tags', search by seo_tags
                $join->on('sellerinfos.company_name', '=', 'services.seller_name')
                    ->where('services.seo_tags', 'LIKE', '%' . $searchName . '%');
            }
        })
        ->select('sellerinfos.id', 'sellerinfos.company_name', 'services.image')
        ->groupBy('sellerinfos.id', 'sellerinfos.company_name')
        ->orderBy('sellerinfos.company_name', 'asc')
        ->paginate(10);
       
// dd($services);
        // Recent query used start  this query was running first but it search for the company_name only but seo_tag WAS avoided
        // $services = Sellerinfo::join('services', function ($join) use ($searchName) {
        //     $join->on('sellerinfos.category_id', '=', 'services.category_id')
        //         ->on('sellerinfos.company_name', '=', 'services.seller_name')
        //         ->where('sellerinfos.company_name', 'LIKE', '%' . $searchName . '%');
        // })
        // ->orWhere(function ($query) use ($searchName) {
        //     $query->join('services', function ($join) use ($searchName) {
        //         $join->on('sellerinfos.category_id', '=', 'services.category_id')
        //             ->on('sellerinfos.company_name', '=', 'services.seller_name')
        //             ->where('services.seo_tags', $searchName);
        //     });
        // })
        // ->select('sellerinfos.id', 'sellerinfos.company_name', 'services.image')
        // ->groupBy('sellerinfos.id', 'sellerinfos.company_name')
        // ->paginate(10);
// Recent query used end 

        // Now this query is used start 
        // $services = Sellerinfo::join('services', function ($join) use ($searchName) {
        //     $join->on('sellerinfos.category_id', '=', 'services.category_id')
        //          ->on('sellerinfos.company_name', '=', 'services.seller_name')
        //          ->where('sellerinfos.company_name', 'LIKE', '%' . $searchName . '%')
        //          ->orWhere('services.seo_tags', $searchName);
        // })
        // ->select('sellerinfos.id', 'sellerinfos.company_name', 'services.image')
        // ->groupBy('sellerinfos.id', 'sellerinfos.company_name')
        // ->paginate(10);
        // Now this query is used end

    //     $services = Sellerinfo::join('services', 'sellerinfos.category_id', '=', 'services.category_id')
    // ->where('sellerinfos.company_name', 'LIKE', '%' . $searchName . '%')
    // ->orWhere('services.seo_tags', $searchName)
    // ->select('sellerinfos.id', 'sellerinfos.company_name', 'services.image')
    // ->groupBy('sellerinfos.id', 'sellerinfos.company_name')
    // ->get();
        // $services = Sellerinfo::join('services', 'sellerinfos.category_id', '=', 'services.category_id')
        //     ->where(function ($query) use ($searchName, $tags) {
        //         $query->where('sellerinfos.company_name', 'LIKE', '%' . $searchName . '%')
        //             ->orWhere(function ($query) use ($tags) {
        //                 $query->whereIn('services.seo_tags', $tags);
        //             });
        //     })
        //     ->select('sellerinfos.id','sellerinfos.company_name','services.image')
        //     ->groupBy('sellerinfos.id', 'sellerinfos.company_name') // Group the results by id and company_name
        //     ->get();
            // dd($services);
            
        
            // 1st query start
        // $services = Sellerinfo::join('services', 'sellerinfos.category_id', '=', 'services.category_id')
        // ->where(function ($query) use ($searchName) {
        //     $query->where('sellerinfos.company_name', 'LIKE', '%' . $searchName . '%')
        //         ->orWhere(function ($query) use ($searchName) {
        //             $tags = explode(',', $searchName);
        //             foreach ($tags as $tag) {
        //                 $query->orWhere('services.seo_tags', 'LIKE', '%' . trim($tag) . '%');
        //             }
        //         });
        // })
        // ->select('sellerinfos.id', 'sellerinfos.company_name')
        // ->distinct()
        // ->get();
        // Original query end


            // $services = Sellerinfo::join('services', 'sellerinfos.category_id', '=', 'services.category_id')
            // ->where(function ($query) use ($searchName) {
            //     $query->where('sellerinfos.seller_name', 'LIKE', '%' . $searchName . '%')
            //         ->orWhere('services.seo_tags', 'LIKE', '%' . $searchName . '%');
                    
            // })
            // ->select('sellerinfos.id', 'sellerinfos.company_name')
            // ->distinct()
            // ->get(); this query is working but for single seo_tags

            
            // dd($services);
        // old query for service start

        // $services = Sellerinfo::where('full_address', 'LIKE', '%' . $cityId . '%')
        // ->where('company_name', $searchName)
        // ->get();

        // old query for service end

        // echo '<pre>';print_r($services);die();
      

        // Prepare the search results
        $results = [
            'services' => $services,
            // 'products' => $products,
        ];

    //    if ($category == 'service') {
        return view('customer.search_result',compact('services'));
    //    }
    //    else{
    //     return view('customer.search_result_products');
    //    }
        
    }
    public function allservice(){
        $cities =City::get();
        $services = Category::where('type', '=', 'service')->where('parent_id', null)->get();
        return view('customer.allservice',compact('services','cities')); 
    }
    public function allproducts_page(){
        $products = Category::where('type', '=', 'product')->where('parent_id', null)->get();
        return view('customer.allproducts_page',compact('products')); 
    }
    public function service_list_ajax(Request $request){
        $cityId = $request->input('cityId');
        // $category = $request->input('category');

        $categories = Category::where('type', 'service')->get();
        // $categories = Category::where('type', $category)->get();
        if ($categories->isEmpty()) {
            return [];
        }

        $categoryIds = $categories->pluck('id');
    
        $seller_info = Service::whereIn('category_id', $categoryIds)
                    // ->whereRaw('LOWER(city) = ?', [strtolower($cityId)])
                    ->whereRaw('LOWER(address) LIKE ?', ['%' . strtolower($cityId) . '%'])
                    // ->where('full_address', 'LIKE', '%' . $cityId . '%')
                    ->get();
        // $seller_info = Sellerinfo::whereIn('category_id', $categoryIds)
        //             // ->whereRaw('LOWER(city) = ?', [strtolower($cityId)])
        //             ->whereRaw('LOWER(full_address) LIKE ?', ['%' . strtolower($cityId) . '%'])
        //             // ->where('full_address', 'LIKE', '%' . $cityId . '%')
        //             ->get();

        // $data = $seller_info->pluck('company_name'); old
        $data = $seller_info->map(function ($seller) {
            return [
                'value' => $seller->seller_name,
                'seo_tags' => $seller->seo_tags,
            ];
        });

        return $data->toArray();
       
    }
    public function customer_profile(){
        $cities = City::get();
        return view('customer.customer_profile',compact('cities')); 
    }
    public function advertise_with_us(){
        $cities = City::get();
        return view('customer.advertise_with_us',compact('cities')); 
    }
    public function save_freelisting(Request $request){
        $data = $request->all();
        // echo '<pre/>';print_r($data);exit;
        $visibleDivId = $data['visible_div'];
        // For sellerinfo save
        $seller = new Sellerinfo;
        $seller->company_name=$data['company_name'];
        $seller->seller_name=$data['firstName'].' '.$data['lastName'];
        $seller->city=$data['city'];
        $seller->phone=$data['phone'];
        $seller->landlineNumber=$data['landlineNumber'];       
        // For product save
        if ($visibleDivId === 'form-product') {
            $productdata = new Product();
            $productdata->type = $data['type'];
           
            $productdata->product_title = $data['product_title'];
            $productdata->category_id = $data['product-category'];
            $productdata->product_description = $data['product_description'];
            $productdata->specification = $data['specification'];
            $productdata->packaging_type = $data['packaging_type'];
            $productdata->price = $data['price'];
            $productdata->unit = $data['unit'];
            $productdata->color = $data['color'];
            $productdata->packagingsize = $data['packagingsize'];
            $productdata->special_feature = $data['special_feature'];
            $productdata->brand = $data['brand'];
            $productdata->country_origin = $data['country_origin'];
            $productdata->expiry_date = $data['expiry_date'];
            $productdata->order_quantity = $data['order_quantity'];
           
            if($request->hasfile('image'))
            {
                    $file = $request->file('image');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/product/', $filename);
                    $productdata->image = $filename;
            }
            
            $productdata->save();
            $seller->save();
            return redirect('/free-listing')->with('success', 'Data added successfully');
          } else if ($visibleDivId === 'form-service') {

            // echo '<pre>';print_r($data);exit();
            $servicedata = new Service();
            $servicedata->type = $data['type'];
            
            $servicedata->category_id = $data['service-category'];
            $servicedata->address = $data['address'];
            $servicedata->phone = $data['phone'];
            $servicedata->is_whatsapp = isset($data['is_whatsapp']) ? $data['is_whatsapp'] : null;;
            $servicedata->price = $data['price'];
            $servicedata->unit = $data['unit'];
            $servicedata->features = $data['features'];
            $servicedata->payment_mode = $data['payment_mode'];
            $servicedata->service_highlight = $data['service_highlight'];
            $servicedata->from_date = $data['from_date'];
            $servicedata->to_date = $data['to_date'];
            // if ($data['question']) {
            //     $servicedata->question = implode(',',$data['question']);
            //     $servicedata->answer = implode(',',$data['answer']);
            // }
            
        //    file upload start
            $files = [];
            
            if ($request->hasFile('image')) {
                $images = $request->file('image');
                $destination ="uploads/service/".$servicedata->image;
                if (File::exists($destination)) {
                File::delete($destination);
                }
                foreach ($images as $image) {
                    // Generate a unique name for the image
                    $imageName = time(). '_' . $image->getClientOriginalName();
                    
                    // Move the image to the desired location
                    $image->move('uploads/service/', $imageName);
                    
                    $files[] = $imageName; 
                }
                
                
            }
            $servicedata->image = json_encode($files);

        //    file upload end

            $seller->save();
            $servicedata->save();
            return redirect('/free-listing')->with('success', 'Data added successfully');
            // return redirect('/add-product-service')->with('success', 'Data added successfully');
          }

        // For service save
    }

    public function sort_filter(Request $request){
       
        $order = $request->input('order');
        $cat_id = $request->input('cat_id');
        $category = Category::where('parent_id', $cat_id)->first();
        $query = Sellerinfo::where('category_id', $category->id);
        
        
        if ($order === 'asc') {
            $query->orderBy('company_name', 'asc');
        } elseif ($order === 'desc') {
            $query->orderBy('company_name', 'desc');
        } elseif ($order === 'rating') {
            $query->orderBy('google_rating', 'desc');
        }
    
        $seller_infos = $query->get();
    
        return response()->json([
            'seller_infos' => $seller_infos,
            'category' => $category,
        ]);
    }
    public function about_us(){
        $cities = City::get();
        return view('customer.about_us',compact('cities'));
    }
    public function contact_us(){
        $cities = City::get();
        return view('customer.contact_us',compact('cities'));
    }
    public function faq(){
        $cities = City::get();
        return view('customer.faq',compact('cities'));
    }
    public function privacy(){
        $cities = City::get();
        return view('customer.privacy',compact('cities'));
    }
    public function terms(){
        $cities = City::get();
        return view('customer.terms',compact('cities'));
    }
    public function sort_rate_filter(Request $request){
       
        $rating = $request->input('rating');
        $cat_id = $request->input('cat_id');
        $category = Category::where('parent_id', $cat_id)->first();
        $query = Sellerinfo::where('category_id', $category->id);
        
        
       if ($rating && $rating !== 'any' ) {
            $query->where('google_rating', $rating);
        }
    
        $seller_infos = $query->get();
    
        return response()->json([
            'seller_infos' => $seller_infos,
            'category' => $category,
        ]);
    }
    public function sort_top_rate_filter(Request $request){
       
        $rating = $request->input('rating');
        $cat_id = $request->input('cat_id');
        $category = Category::where('parent_id', $cat_id)->first();
        $query = Sellerinfo::where('category_id', $category->id);
        
        
       if ($rating && $rating == 'top' ) {
            $query->where('google_rating', '5');
        }
    
        $seller_infos = $query->get();
    
        return response()->json([
            'seller_infos' => $seller_infos,
            'category' => $category,
        ]);
    }
    public function sort_verified_filter(Request $request){
       
        $claim_status = $request->input('claim_status');
        $cat_id = $request->input('cat_id');
        $category = Category::where('parent_id', $cat_id)->first();
        $query = Sellerinfo::where('category_id', $category->id);
        
        
       if ($claim_status && $claim_status == 1 ) {
            $query->where('claim_status', '1');
        }
    
        $seller_infos = $query->get();
    
        return response()->json([
            'seller_infos' => $seller_infos,
            'category' => $category,
        ]);
    }
    public function sort_most_liked_filter(Request $request){
       
        $liked_status = $request->input('liked_status');
        $cat_id = $request->input('cat_id');
        $category = Category::where('parent_id', $cat_id)->first();

        $query = Sellerinfo::join('liked_services', 'sellerinfos.id', '=', 'liked_services.service_id')
            ->where('sellerinfos.category_id', $category->id);

        if ($liked_status && $liked_status == 1) {
            $query->where('liked_services.status', 1);
        }
        $seller_infos = $query->get();
    
        return response()->json([
            'seller_infos' => $seller_infos,
            'category' => $category,
        ]);
    }
    public function sort_product(Request $request,$order){
        
    $cat_id = $request->input('cat_id');

    // Validate order parameter
    if (!in_array($order, ['asc', 'desc'])) {
        return response()->json(['error' => 'Invalid order parameter'], 400);
    }

    $products = Category::where('type', 'product')->where('id', $cat_id)->first();
    $product_list = Product::where('category_id', $products->id)
        ->where('status', 1)
        ->orderBy('product_title', $order)
        ->get();
    $category_list = Category::where('type', 'product')
        ->where('parent_id', null)
        ->get();

    return response()->json([
        'product_list' => $product_list,
        'category_list' => $category_list,
    ]);
    }
    public function storeLocation(Request $request){
        $ip = $request->ip();
        $response = Http::get("https://your-ip-geolocation-api.com/location/{$ip}");

        $cityName = $response->json()['city'];

        // Store the city name in your preferred data store (e.g., session, database)

        return response()->json(['message' => 'Location stored successfully']);
  
    }

    // inner page search start 
    public function serviceCategoryAjax(Request $request, $categoryId)
    {
        // Implement search logic based on category ID
        $categories = Category::where('parent_id',$categoryId)->pluck('id');
        $services = Sellerinfo::whereIn('category_id', $categories)->get();
        $data = $services->pluck('company_name');

        return $data->toArray();
        // return response()->json($services);
    }

    public function serviceSubcategoryAjax(Request $request, $subCategory, $subCategoryId)
    {
        // Implement search logic based on subcategory ID
        // $categories = Category::where('parent_id',$subCategoryId)->pluck('id');
        $services = Sellerinfo::whereIn('category_id', $subCategoryId)->get();
        $data = $services->pluck('company_name');

        return $data->toArray();
        // return response()->json($services);
    }
    // inner page search end 

    public function addRating(Request $request){
        
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (!Auth::check()) {
                $message = "Login to rate this seller";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
            if (empty($data['rating'])) {
                // dd($data);
                $message = "Add atleast one star rating for this seller";
                Session::flash('error_message',$message);
                return redirect()->back();
            }
                $ratingcount = Rating::where(['user_id'=>Auth::user()->id,'seller_id'=>$data['seller_id']])->count();
                if ($ratingcount>0) {
                    $message = "Your rating already exists for this seller";
                    Session::flash('error_message',$message);
                    return redirect()->back();
                }else {
                    $rating = new Rating();
                    $rating->user_id = Auth::user()->id;
                    $rating->seller_id = $data['seller_id'];
                    $rating->rating = $data['rating'];
                    $rating->review = $data['review'];
                    $rating->status = 0;
                    $rating->save();
                    $message = "Thanks for rating.";
                    Session::flash('success_message',$message);
                    return redirect()->back();
                }
            // dd($data);
        }
    }
    public function customer_profile_password(){
        $id = Auth::user()->id;
        $user_data = User::find($id);
        $customer = $user_data->customers;
        // dd($customer);
        $cities = City::get();
        return view('customer.customer-profile-password',compact('user_data','cities','customer')); 
    }
    public function customer_password_update(Request $request){
        // dd($request);
        $validatedData = $request->validate([           
            'password' => 'required|min:5',
        ], [
            
            'password.required' => 'Password is required',
            'oldpassword.required' => 'Old Password is required'
        ]);
        $current_user = Auth::user();
        $user = User::where('id',$current_user->id);
        if (Hash::check($request->oldpassword,$current_user->password)) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
            return redirect()->back()->with('success','Password updated successfully.');
        }else{
            return redirect()->back()->with('error','Old password should match');
        }
    
    }
    public function customer_profile_view(){
        $id = Auth::user()->id;
        $user_data = User::find($id);
        $customer = $user_data->customers;
        // dd($customer);
        $cities = City::get();
        return view('customer.customer_profile_view',compact('user_data','cities','customer')); 
    }
    public function customer_profile_update(Request $request,$id){
        $data = $request->all();
       $user_data = User::find($id);
       $customer_data = Customer::where('email',$user_data->email)->first();


       $user_data = User::find($id);
        // dd($user_data);
        $user_data->name = $request->name ;        
        $user_data->email=$request->email;
        $user_data->mobile=$request->mobile;
        $user_data->address=$request->address;
        // if ($request->password) {
        //     $user_data->password=bcrypt($request->password);
        // }
        if($request->hasfile('profile_image'))
        {
            $destination ="uploads/userdata/profile_image/".$user_data->profile_image;
            if (File::exists($destination)) {
               File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/userdata/profile_image/', $filename);
            $user_data->profile_image = $filename;
        }
        $user_data->save();
        $customer_data->dob = $request->dob;
        $customer_data->full_address = $request->full_address;
        $customer_data->email = $request->email;
        $customer_data->pincode = $request->pincode;
        $customer_data->state = $request->state;
        $customer_data->city = $request->city;
        $customer_data->save();
        return redirect('/customer-profile-view')->with('status', 'Data updated successfully');

    //    $seller->full_name = $data['full_name'];
    //             $seller->mobile = $data['mobile'];
    //             $seller->email = $data['email'];
    //             $seller->full_address = $data['full_address'];
    //             $seller->dob = $data['dob'];
    //             $seller->state = $data['state'];
    //             $seller->city = $data['city'];
    //             $seller->password=bcrypt($data['password']);
    //             $seller->pincode = $data['pincode'];
    
    //             $user_data->mobile = $data['mobile'];
    //             $user_data->email=$data['email'];
    //             $user_data->name=$data['full_name'];
    //             $user_data->password=bcrypt($data['password']);
    //             $user_data->status=0;
    //             $user_data->user_type='customer';
                
    //             $seller->save();
    //             $user_data->save();

    }
    // chatbot code start 
    public function store_chatbot_message(Request $request) {
        $data = $this->validate($request, [
            'message' => 'required',
        ]);

        $data['user_id'] = $request->user_id;
        $data['seller_id'] = $request->seller_id;
        $data['seller_mobile'] = $request->seller_mobile;
        $data['seller_name'] = $request->seller_name;
        $data['message'] = $request->message;
        $data['position'] = 'left';

        $store = (new ChatMessage())->storeData($data);
        // return redirect()->route('chatbot')->with('message', 'Your message has been sent');
        return response()->json(['message' => 'Form submitted successfully']);
    }
    public function user_page_refresh(Request $request){
        $user_id = $request->input('user_id');
        $seller_id = $request->input('seller_id');
        $chat_conservation = ChatMessage::where('user_id',$user_id)->where('seller_id',$seller_id)->OrderBy('id','ASC')->get();

        $output='';
        foreach($chat_conservation as $i=>$data){
            if($data->position =='right'){
                $output .= '<div class="message-container left">
                    <small>'.$data->seller_name.'</small>
                    <div class="msg_block">'. $data->message .'</div>
                    <h5 style="text-align: right; font-size: 8px; margin: auto;">'. date('h:i:a',strtotime($data->created_at)) .'</h5>
                </div>';
        }

                if($data->position =='left'){
                    $output .= '<div class="message-container right">
                    <small>'. Auth::user()->name .'</small>
                    <div class="msg_block">'. $data->message .'</div>
                    <h5 style="text-align: right; font-size: 8px; margin: auto;">'. date('h:i
    a',strtotime($data->created_at)) .'</h5>
                </div>';
                }
                
               
        }
           return $output;     
        // return response()->json(['message' => 'Form submitted successfully']);
        // return response()->json(['message' => $output]);
    }
    // chatbot code end
    // wished business start
    public function wished_list_business(){
        $cities = City::get();
        $user_id = Auth::user()->id;
        $wished = Likedservice::with('sellerInfo', 'users')->where('user_id',$user_id)->paginate(6);
        $count = Likedservice::count();
        // dd($wished);
        return view('customer.wished_list_business',compact('wished','count','cities'));
    }
    public function deleteWished($id){
        $wisheddata = Likedservice::find($id);
        $wisheddata->delete();
        return redirect('/wished-list-business')->with('status', 'Data deleted successfully');
    }
    // wished business  end

    
}
