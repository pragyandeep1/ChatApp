<?php

namespace App\Http\Controllers;

use App\Models\Admanagement;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\AppointmentMaster;
use App\Models\Callback_enquiry;
use App\Models\Category;
use App\Models\ChatMessage;
use App\Models\City;
use App\Models\Claimedrequest;
use App\Models\Consultation;
use App\Models\DoctorInformation;
use App\Models\Emailsetting;
use App\Models\Faq;
use App\Models\User;
use App\Models\HospitalData;
use App\Models\Likedservice;
use App\Models\Medicine;
use App\Models\PatientInfo;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Seller_enquiry_details;
use App\Models\Sellerinfo;
use App\Models\Service;
use App\Models\Service_enquiry;
use App\Models\Speciality;
use App\Models\State;
use App\Models\StateCity;
use App\Models\Symptom;
use App\Models\Trendingservice;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function loginRegister(){
        return view('home.login_register');
    }

    // public function registerUser(Request $request){
    //     if($request->isMethod('post')){
    //         Session::forget('error_message');
    //         Session::forget('success_message');
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;
    //         $rules=[
    //             'name'=>'required|regex:/^[\pL\s\-]+$/u',
    //             'mobile'=>'required|numeric|digits:10',
    //             'email'=> 'required|email|max:255',
    //             'password'=>'required',
    //             'password'=>'required|digits:8',
    //             'password.required'=>'Password Must be Minimum 8 Digit',
                
    //         ];
    //         $customMessages=[
    //             'name.required'=>'Name is Required',
    //             'name.alpha'=>'Valid Name is Required',
    //             'mobile.required'=>'Mobile No. is Required',
    //             'mobile.numeric'=>'valid Mobile no. is Required',
    //             'mobile.digits'=>'Number Must be 10 Digit',
    //             'email.required'=> 'Email is Required',
    //             'email.email'=>'Valid Email is Required',
    //             'password.required'=>'Password is Required',
                
    //         ];
            
    //         $this->validate($request,$rules,$customMessages);

    //         $userCount=User::where('email',$data['email'])->count();
    //         if($userCount>0){
    //             $message="Email Already Exists!";
    //             Session::flash('error_message',$message);
    //             return redirect()->back(); 
    //         }
    //         else{
    //             $user = new User;
    //             $user->name=$data['name'];
    //             $user->email=$data['email'];
    //             $user->mobile=$data['mobile'];
    //             $user->password=bcrypt($data['password']);
    //             $user->address="";
    //             $user->status=1;
    //             // $user->status=0;
    //             $user->save();

    //             // Send Confirmation Email
    //             $email = $data['email'];
    //             $messageData = [
    //                 'email'=> $data['email'],
    //                 'name'=>$data['name'],
    //                 'code'=>base64_encode($data['email'])
    //             ];
    //             // Mail::send('emails.confirmation',$messageData,function($message) use($email){
    //             // $message->to($email)->subject('Confirm Your Email Account for Registration');
    //             // });

    //             // Redirect Back With Success Message

    //             $message="Successfully registered!";
    //             // $message="Please Check Your Email For Confirmation to Activate Your Account!";
    //             Session::put('success_message',$message);
    //             return redirect()->back();

    //             // if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
    //             //     // echo "<pre>"; print_r(Auth::User()); die;
    //             //     if(!empty(Session::get('session_id'))){
    //             //         $user_id = Auth::user()->id;
    //             //         $session_id = Session::get('session_id');
    //             //         Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
    //             //     }

    //             //     $email=$data['email'];
    //             //     $messageData=['name'=>$data['name'],'mobile'=>$data['mobile'],'email'=>$data['email']];
    //             //     Mail::send('emails.register',$messageData,function($message) use($email){
    //             //         $message->to($email)->subject('Welcome to Airsoft Point');
    //             //     });
    //             //     return redirect('/products/my-cart');
    //             // }
    //         }
    //     }
    // }

    public function confirmAccount($email){
        Session::forget('error_message');
        Session::forget('success_message');
        $email = base64_decode($email);

        // Check User Email Exists

        $userCount = User::where('email',$email)->count();
        if($userCount>0){
             // User Email is already activated or not
             $userDetails=User::where('email',$email)->first();
             if($userDetails->status==1){
                 $message = "Your Account is Already Activated. Please Login.";
                 Session::put('error_message',$message);
                 return redirect('/login-register');
             }else{
                        // Update User Status to 1 to Activate Account
                        User::where('email',$email)->update(['status'=>1]);
                        $messageData=['name'=>$userDetails['name'],'mobile'=>$userDetails['mobile'],'email'=>$email];
                         Mail::send('emails.register',$messageData,function($message) use($email){
                             $message->to($email)->subject('Welcome to Our Multiseller');
                        });
                        //redirect to login/register with success page
                        $message = " Your Account is Activated. You Can Login Now!";
                        Session::put('success_message',$message);
                        return redirect('/login-register');
             }
        }else{
            abort(404);
        }

    }

    public function logoutUser(){
        Auth::logout();
        // Session::flush(); // Clear the entire session
        return redirect('/login-register');
    }
    public function loginUser(Request $request){
        $credentials = $request->only('email', 'password');
        // $data = $request->all();
        // $user = User::where('email',$data['email'])->orWhere('name',$data['email'])->first();
        // Attempt to authenticate using email, username, or phone number
        if (filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } elseif (ctype_digit($credentials['email'])) {
            $field = 'mobile';
        } else {
            $field = 'name';
        }

        $attemptCredentials = [
            $field => $credentials['email'],
            'password' => $credentials['password'],
        ];

        if (Auth::attempt($attemptCredentials)) {
            $user = Auth::user();
            if ($user->user_type === 'customer') {
                return redirect('/homepage');
            } else {
                return redirect('/dashboard');
            }
        } else {
            return back()->withErrors(['message' => 'Invalid credentials']);
        }
    }
// old code for login start
    public function loginUser_backup(Request $request){
        if($request->isMethod('post')){
            Session::forget('error_message');
            Session::forget('success_message');
            $data = $request->all();
            $user = User::where('email',$data['email'])->orWhere('name',$data['email'])->first();
            // dd($user);
            // login code start
            $credentials = $request->only('email','name','password');
            if (Auth::guard('web')->attempt($credentials)) {
                
                // User login successful
                if ($user->user_type === 'customer') {
                    return redirect('/homepage');
                } else {
                    return redirect('/dashboard');
                }
                // return redirect('/dashboard');
            }
            // if (Auth::guard('customer')->attempt($credentials)) {
            //     // Admin login successful
            //     return redirect('/homepage');
            // }
            // login code end
            // Login failed
            return back()->withErrors(['message' => 'Invalid credentials']);
            // old code start
            // if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
            //     $request->session()->put('loginId', $data['email']);
            //     Session::flash('error_message','Invalid Email or Password!');
            //     //Check Email is Activator or Not
            //     $userStatus = User::where('email',$data['email'])->first();
            //     if($userStatus->status==0){
            //         Auth::logout();
            //         $message = "Your Account is Not Activated Yet! Please Confirm Your Email to Activate!";
            //         Session::put('error_message',$message);
            //         return redirect()->back();
            //     }
                
            //     if ($user->user_type === 'customer') {
            //         return redirect('/homepage');
            //     } else {
            //         return redirect('/dashboard');
            //     }
            // }else{
            //     $message="Invalid Email or Password!";
            //     Session::flash('error_message',$message);
            //     return redirect()->back();
            // }
            // old code end
        }
    }
// old code for login end

    public function forgotPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            Session::forget('error_message');
            Session::forget('success_message');
            // echo "<pre>"; print_r($data); die;
            $emailCount = User::where('email',$data['email'])->count();
            if($emailCount==0){
                $message= "Email Does Not Exists!";
                Session::put('error_message','Email Does Not Exists!');
                Session::forget('success_message');
                return redirect()->back();
            }

            //Generate New Random Password
            $random_password = Str::random(8);
            //Encode/secure password
            $new_password = bcrypt($random_password);
            User::where('email',$data['email'])->update(['password'=>$new_password]);
            $userName = User::select('name')->where('email',$data['email'])->first();
            $email = $data['email'];
            $name = $userName->name;
            $messageData = [
                'email'=>$email,
                'name'=>$name,
                'password'=>$random_password
            ];
            Mail::send('emails.forgot_password',$messageData,function($message) use($email){
            $message->to($email)->subject("Get New Password - E-Commerce");
            });

            $message = "Please Check Email For New Password!";
            Session::put('success_message',$message);
            return redirect('/login-register');
        }
        return view('home.forgot_password');
    }

    

    // public function chkUserPassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;
    //         $user_id = Auth::User()->id;
    //         $checkPassword = User::select('password')->where('id',$user_id)->first();
    //         if(Hash::check($data['current_pwd'],$checkPassword->password)){
    //             return "true";
    //         }else{
    //             return "false";
    //         }
    //     }
    // }
    // public function updateUserPassword(Request $request){
    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         Session::forget('error_message');
    //         Session::forget('success_message');
            
    //         // echo "<pre>"; print_r($data); die;
    //         $user_id = Auth::User()->id;
    //         $checkPassword = User::select('password')->where('id',$user_id)->first();
    //         if(Hash::check($data['current_pwd'],$checkPassword->password)){
    //             //Update Password
    //             $new_pwd = bcrypt($data['new_pwd']);
    //             User::where('id',$user_id)->update(['password'=>$new_pwd]);
    //             $message = "Password Updated Successfully";
    //             Session::put('success_message',$message);
    //             return redirect()->back();

    //         }else{
    //             $message = "Current Password is Incorrect!";
    //             Session::put('error_message',$message);
    //             return redirect()->back();
    //         }
    //     }
    // }
    public function addSeller(Request $request){
        return view('layouts.admin_layout.add_seller');
    }
    public function save_seller(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo '<pre>';print_r($data);exit();
            $seller = new Sellerinfo;
            $users = new User;
            $seller->company_name=$data['company_name'];
            $seller->seller_name=$data['seller_name'];
            $seller->email=$data['email'];
            $seller->phone=$data['phone'];
            $seller->password=bcrypt($data['password']);
            $seller->full_address=$data['full_address'];
            $seller->pan_no=$data['pan_no'];
            $seller->gst_no=$data['gst_no'];
            $seller->opening_time=$data['opening_time'];
            $seller->closing_time=$data['closing_time'];
            if (isset($data['business_hr'])) {
                $seller->business_hr=implode(',',$data['business_hr']);
            }
            
            $seller->website=$data['website'];
            $seller->linkedin=$data['linkedin'];
            $seller->facebook=$data['facebook'];
            $seller->instagram=$data['instagram'];
            $seller->rank=$data['rank'];
            $seller->twitter=$data['twitter'];
            $seller->google_rating=$data['google_rating'];
            $seller->company_info=$data['company_info'];

            $users->email=$data['email'];
            $users->name=$data['seller_name'];
            // $users->mobile=$data['phone'];
            $users->password=bcrypt($data['password']);
            // $users->address=$data['address'];
            // $users->user_type='hospital';
            $seller->year_drp_down=$data['year_drp_down'];
            $seller->latitude=$data['latitude'];
            $seller->longitude=$data['longitude'];
            $seller->city=$data['city'];
            $seller->Gmaps_URL = $data['Gmaps_URL'] ?? '';
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/userdata/', $filename);
                $seller->image = $filename;
            }
            // $user->status=0;
            $seller->save();
            $users->save();
            
            return redirect('/add-seller')->with('success', 'Data added successfully');
            // return redirect()->back()->with('status','Data added successfully');
        }
       
       
       
        
    }

    public function listSeller(){
        $clinicdata = Sellerinfo::paginate(5);
       
        $count = Sellerinfo::count();
        return view('layouts.admin_layout.all_seller_list',compact('clinicdata','count'));
    }
    public function search_seller_list(Request $request){
        $searchQuery = $request->input('search');

        $seller_info = Sellerinfo::where('company_name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('full_address', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('phone', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('email', 'LIKE', '%' . $searchQuery . '%')
            ->paginate(5);
    
        $count = $seller_info->total();
    
        return response()->json([
            'seller_info' => $seller_info,
            'count' => $count
        ]);
    }
    public function editSeller($id){
        $clinicdata = Sellerinfo::find($id);
        return view('layouts.admin_layout.seller_edit',compact('clinicdata'));
    }
    public function updateSeller(Request $request,$id){
        // dd($request);
        $seller = Sellerinfo::find($id);
        $seller->seller_name = $request->seller_name ;        
        $seller->email=$request->email;
        $seller->phone=$request->phone;
        $seller->password=bcrypt($request->password);
        $seller->full_address= $request->full_address;
        $seller->year_drp_down=$request->year_drp_down;
        $seller->latitude=$request->latitude;
        $seller->longitude=$request->longitude;
        $seller->opening_time=$request->opening_time;
        $seller->gst_no=$request->gst_no;
        $seller->closing_time=$request->closing_time;
        $seller->pan_no=$request->pan_no;
        $seller->city=$request->city;
        $seller->website=$request->website;
        $seller->linkedin=$request->linkedin;
        $seller->facebook=$request->facebook;
        $seller->instagram=$request->instagram;
        $seller->rank=$request->rank;
        $seller->twitter=$request->twitter;
        $seller->google_rating=$request->google_rating;
        $seller->company_info=$request->company_info;
        $seller->Gmaps_URL=$request->Gmaps_URL ?? '';
        if ($seller->business_hr) {
            $seller->business_hr= implode(',',$request->business_hr) ;
        }
        
        if($request->hasfile('image'))
        {
            $destination ="uploads/userdata/".$seller->image;
            if (File::exists($destination)) {
               File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/userdata/', $filename);
            $seller->image = $filename;
        }
        $seller->update();
        return redirect('/list-seller')->with('status', 'Data updated successfully');
    }
    public function deleteSeller($id){
        $clinicdata = Sellerinfo::find($id);
        $destination ="uploads/userdata/".$clinicdata->image;
        if (File::exists($destination)) {
            File::delete($destination);
         }
         $clinicdata->delete();
         return redirect('/list-seller')->with('status', 'Data deleted successfully');
    }
    
    public function email_available_check(Request $request){
        if($request->get('email'))
        {
            $email = $request->get('email');
            $data = DB::table("users")
            ->where('email', $email)
            ->count();
            if($data > 0)
            {
            echo 'not_unique';
            }
            else
            {
            echo 'unique';
            }
        }
    
    }

// trending services code start
 
public function list_trending_services(){
    // $categories = Category::where('parent_id', null)->orderby('id', 'asc')->limit(2)->get();
    $trendcategories = Trendingservice::all();
    // echo '<pre>';print_r($trendcategories->categoy_id);exit;
    // $specialitydata = Category::paginate(5);       
    $count = Trendingservice::count();
    return view('layouts.admin_layout.list_trending_service',compact('trendcategories','count'));
}
public function editTrendingCategory($id){
    $trend_category = Trendingservice::findOrFail($id);
    $categories = Category::where('parent_id', null)->orderby('name', 'asc')->get();
    // echo '<pre>';print_r($trend_category);exit();
    return view('layouts.admin_layout.edit-trend-category',compact('trend_category', 'categories'));
}
public function save_trend_category($id,Request $request){
    $category = Trendingservice::findOrFail($id);
   
    $data = $request->all();

    
    // $categorydata = new Category;
    $category->category_id = $data['category_id'];
    $category->category_title = $data['category_title'];
    
   
    if($request->hasfile('background_image'))
    {
            $file = $request->file('background_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/trending-category/', $filename);
            $category->background_image = $filename;
    }
    
    $category->save();
    
    return redirect('/list-trending_services')->with('success', 'Category has been updates successfully.');
}
// trending services code  end
    // Category code start
    
    
    public function list_category(){
        $categories = Category::where('parent_id', null)->orderby('created_at', 'desc')->paginate(5);
    
        // $specialitydata = Category::paginate(5);       
        $count = Category::count();
        return view('layouts.admin_layout.category_list',compact('categories','count'));
    }
    public function list_city(){
        $cities = City::orderby('id', 'desc')->paginate(5);
        $count = City::count();
        return view('layouts.admin_layout.list_city',compact('cities','count'));
    }
    public function save_city(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $citydata = new City();
            $citydata->state = 'Odisha';
            $citydata->city = $data['city'];
            if($request->hasfile('image'))
            {
                    $file = $request->file('image');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/city/', $filename);
                    $citydata->image = $filename;
            }
            $citydata->save();
          
            
            
            return redirect('/list-city')->with('success', 'Data added successfully');
        }
    }
    public function editCity($id){
        $city = City::findOrFail($id);
       
        return view('layouts.admin_layout.edit-city',compact('city'));
    }
    public function update_city($id,Request $request){
        $city = City::findOrFail($id);
       
            $data = $request->all();
            $city->city = $data['city'];
           
            if($request->hasfile('image'))
            {
                    $file = $request->file('image');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/city/', $filename);
                    $city->image = $filename;
            }
            
            $city->save();
            
            return redirect('/list-city')->with('success', 'Updated successfully.');
    }
    public function city_available_check(Request $request){
        if($request->get('city'))
        {
            $city = $request->get('city');
            $data = DB::table("cities")
            ->where('city', $city)
            ->count();
            if($data > 0)
            {
            echo 'not_unique';
            }
            else
            {
            echo 'unique';
            }
        }
    }
    public function delete_city($id){
        $statedata = City::find($id);
       
         $statedata->delete();
         return redirect('/list-city')->with('status', 'Data deleted successfully');
    }
    public function filtercategory(Request $request)
    {
        $selectedValue = $request->input('selectedValue');
        
        $data = Category::where('type', $selectedValue)->get();
        
        return response()->json($data);
    }
    public function delete_category($id){
        $category = Category::findOrFail($id);
        if(count($category->subcategory))
        {
            $subcategories = $category->subcategory;
            foreach($subcategories as $cat)
            {
                $cat = Category::findOrFail($cat->id);
                $cat->parent_id = null;
                $cat->save();
            }
        }
    $category->delete();
        // $statedata = Category::find($id);
       
        //  $statedata->delete();
         return redirect('/list-category')->with('status', 'Data deleted successfully');
    }
    public function createCategory(Request $request)
    {
        
        if($request->isMethod('POST')){
            $data = $request->all();
           
            $categorydata = new Category;
            $categorydata->name = $data['name'];
            $categorydata->slug = $data['slug'];
            $categorydata->type = $data['type'];
            $categorydata->parent_id = $data['parent_id'];
           
            if($request->hasfile('thumbnail'))
            {
                    $file = $request->file('thumbnail');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/category/', $filename);
                    $categorydata->thumbnail = $filename;
            }
            
            $categorydata->save();
            return redirect('/list-category')->with('success', 'Data added successfully');
            // return redirect()->back()->with('success', 'Category has been created successfully.');
        }
       
    }
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('parent_id', null)->where('id', '!=', $category->id)->orderby('name', 'asc')->get();
        // echo '<pre>';print_r($category);exit();
        return view('layouts.admin_layout.edit-category',compact('category', 'categories'));
    }
    
    public function save_category($id,Request $request){
       
        $category = Category::findOrFail($id);
       
            $data = $request->all();
       
            if($request->name != $category->name || $request->parent_id != $category->parent_id)
            {
                if(isset($request->parent_id))
                {
                    $checkDuplicate = Category::where('name', $request->name)->where('parent_id', $request->parent_id)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist in this parent.');
                    }
                }
                else
                {
                    $checkDuplicate = Category::where('name', $request->name)->where('parent_id', null)->first();
                    if($checkDuplicate)
                    {
                        return redirect()->back()->with('error', 'Category already exist with this name.');
                    }
                }
            }
            // $categorydata = new Category;
            $category->name = $data['name'];
            $category->slug = $data['slug'];
            $category->type = $data['type'];
            $category->parent_id = $data['parent_id'];
           
            if($request->hasfile('thumbnail'))
            {
                    $file = $request->file('thumbnail');
                    $extention = $file->getClientOriginalExtension();
                    $filename = time().'.'.$extention;
                    $file->move('uploads/category/', $filename);
                    $category->thumbnail = $filename;
            }
            
            $category->save();
            
            return redirect('/list-category')->with('success', 'Category has been updates successfully.');
       
    }
// category end code
    
   
    public function symptom_available_check(Request $request){
        if($request->get('symptom'))
        {
            $symptom = $request->get('symptom');
            $data = DB::table("symptoms")
            ->where('symptom', $symptom)
            ->count();
            if($data > 0)
            {
            echo 'not_unique';
            }
            else
            {
            echo 'unique';
            }
        }
    }
    // Speciality code end

    // Product Service code start
    public function add_product_service(){
        return view('layouts.admin_layout.add_product_service');
    }
    public function save_product_service(Request $request){
        $data = $request->all();
        $visibleDivId = $data['visible_div'];
        // echo '<pre>';print_r($data);exit();
        // dd($data);
        if($request->isMethod('post')){
            

            if ($visibleDivId === 'form-product') {
                $productdata = new Product();
                $productdata->type = $data['type'];
                $productdata->seller_name = $data['seller_name'];
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
                $productdata->seo_title = $data['seo_title'];
                $productdata->seo_tags = $data['seo_tags'];
                $productdata->seo_desc = $data['seo_desc'];
               
                if($request->hasfile('image'))
                {
                        $file = $request->file('image');
                        $extention = $file->getClientOriginalExtension();
                        $filename = time().'.'.$extention;
                        $file->move('uploads/product/', $filename);
                        $productdata->image = $filename;
                }
                
                $productdata->save();
                return redirect('/add-product-service')->with('success', 'Data added successfully');
              } else if ($visibleDivId === 'form-service') {

                // echo '<pre>';print_r($data);exit();
                $servicedata = new Service();
                $servicedata->type = $data['type'];
                $servicedata->seller_name = $data['seller_name'];
                $servicedata->category_id = $data['service-category'];
                $servicedata->address = $data['address'];
                $servicedata->phone = $data['phone'];
                if (isset($data['is_whatsapp'])) {
                    $servicedata->is_whatsapp = $data['is_whatsapp'];
                }
                $servicedata->price = $data['price'];
                $servicedata->unit = $data['unit'];
                $servicedata->features = $data['features'];
                $servicedata->payment_mode = $data['payment_mode'];
                $servicedata->service_highlight = $data['service_highlight'];
                $servicedata->from_date = $data['from_date'];
                $servicedata->to_date = $data['to_date'];
                $servicedata->seo_title = $data['seo_title'];
                $servicedata->seo_desc = $data['seo_desc'];
                $servicedata->seo_tags = $data['seo_tags'];
              
                // if (isset($data['question'])) {
                // $servicedata->question = implode(',',$data['question']);
                // }
                // if (isset($data['answer'])) {
                // $servicedata->answer = implode(',',$data['answer']);
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

                $servicedata->save();
                if (is_array($data['question'])) {
                    // Loop through each question
                    foreach ($data['question'] as $index => $question) {
                        // Find the corresponding answer using the index
                        $answer = isset($data['answer'][$index]) ? $data['answer'][$index] : null;
                
                       
                            // Create a new record for the question and answer
                            $newFaq = new Faq([
                                'service_id' => $servicedata->id,
                                'question' => $question,
                                'answer' => $answer,
                            ]);
                            $newFaq->save();
                      
                    }
                }
                return redirect('/list-service')->with('success', 'Data added successfully');
                // return redirect('/add-product-service')->with('success', 'Data added successfully');
              }
        }
    }
    public function getSellers(Request $request){
        $search = $request->search;

      if($search == ''){
         $employees = User::orderby('id','desc')->select('id','name')->limit(5)->get();
      }else{
         $employees = User::orderby('id','desc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
      }

      $response = array();
      foreach($employees as $employee){
         $response[] = array(
              "id"=>$employee->id,
              "text"=>$employee->name
         );
      }
      return response()->json($response); 
    }

    public function list_service(){
        $services = Service::paginate(5);
       
        $count = Service::count();
        return view('layouts.admin_layout.list_service',compact('services','count'));
    }
    public function search_service(Request $request){
        $searchQuery = $request->input('search');

        $services = Service::where('seller_name', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('address', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('phone', 'LIKE', '%' . $searchQuery . '%')
            ->paginate(5);
    
        $count = $services->total();
    
        return response()->json([
            'services' => $services,
            'count' => $count
        ]);
    }
    public function list_product(){
        $products = Product::paginate(5);
       
        $count = Product::count();
        return view('layouts.admin_layout.list_product',compact('products','count'));
    }
    public function product_edit($id){
        $productdata = Product::find($id);
        $categories = Category::where('type', '=', 'product')->orderby('name', 'asc')->get();
        $sellernames = User::orderby('name', 'asc')->get();
        return view('layouts.admin_layout.product_edit',compact('productdata','categories','sellernames'));
    }
    // Fetch records
   public function getProductcategory(Request $request){
        $search = $request->search;

        if($search == ''){
        $employees = Category::orderby('name','asc')->select('id','name')->where('type','=', 'product')->limit(5)->get();
        }else{
        $employees = Category::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($employees as $employee){
        $response[] = array(
                "id"=>$employee->id,
                "text"=>$employee->name
        );
        }
        return response()->json($response); 
    } 
   public function getServicecategory(Request $request){
        $search = $request->search;

        if($search == ''){
        $employees = Category::orderby('name','asc')->select('id','name')->where('type','=', 'service')->limit(5)->get();
        }else{
        $employees = Category::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($employees as $employee){
        $response[] = array(
                "id"=>$employee->id,
                "text"=>$employee->name
        );
        }
        return response()->json($response); 
    } 
    public function productstschange(Request $request){
        $product = Product::find($request->prd_id);
        $product->status = $request->status;
        $product->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
    public function servicestschange(Request $request){
        $service = Service::find($request->service_id);
        $service->claim_status = $request->status;
        Cookie::queue('claim_application', 'approved'); // Set the cookie for 30 days
  
        // $service->status = $request->status;
        $service->save();

  
        return response()->json(['success'=>'Status change successfully.']);
    }
    public function update_product(Request $request,$id){
        $productdata = Product::find($id);
        $productdata->type = $request->type ;        
        $productdata->seller_name = $request->seller_name;
        $productdata->category_id = $request->category_id;
        $productdata->product_title = $request->product_title;
        $productdata->product_description= $request->product_description;
        $productdata->specification=$request->specification;
        $productdata->packaging_type=$request->packaging_type;
        $productdata->price=$request->price;
        $productdata->unit=$request->unit;
        $productdata->color=$request->color;
        $productdata->packagingsize=$request->packagingsize;
        $productdata->special_feature =$request->special_feature;
        $productdata->brand=$request->brand;
        $productdata->country_origin=$request->country_origin;
        $productdata->expiry_date=$request->expiry_date;
        $productdata->order_quantity=$request->order_quantity;
        
        if($request->hasfile('image'))
        {
            $destination ="uploads/product/".$productdata->image;
            if (File::exists($destination)) {
               File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/product/', $filename);
            $productdata->image = $filename;
        }
        $productdata->update();
        return redirect('/list-product')->with('status', 'Data updated successfully');
    }
    public function service_edit($id){
        $servicedata = Service::findOrFail($id);
        
        $categories = Category::where('type', '=', 'service')->orderby('name', 'asc')->get();
        $sellernames = User::orderby('name', 'asc')->get();
        return view('layouts.admin_layout.service_edit',compact('servicedata','categories','sellernames'));
    }
    public function update_service(Request $request,$id){
        $data = $request->all();
        // echo '<pre>';print_r($data);exit();
        $servicedata = Service::find($id);
        $faqdata = Faq::where('service_id',$id)->get();
        $seller_info = Sellerinfo::where('company_name', '=', $servicedata->seller_name)->first();
        // $seller_info = Sellerinfo::where('company_name', '=', DB::raw("'" . $servicedata->seller_name . "'"))->first();


        $servicedata->type = $request->type ;        
        $servicedata->seller_name = $request->seller_name;
        $servicedata->category_id = $request->category_id;
        $servicedata->address = $request->address;
        $servicedata->phone= $request->phone;
        $servicedata->is_whatsapp=$request->is_whatsapp;
        $servicedata->price=$request->price;
        $servicedata->unit=$request->unit;
        $servicedata->features=$request->features;
        $servicedata->payment_mode =$request->payment_mode;
        $servicedata->service_highlight=$request->service_highlight;
        $servicedata->extra_services=$request->extra_services;
        $servicedata->from_date=$request->from_date;
        $servicedata->to_date=$request->to_date;
        $servicedata->status=$request->status;
        if (is_array($data['question']) && count($data['question']) > 0) {
            // Loop through each question
            foreach ($data['question'] as $index => $question) {
                // Find the corresponding answer using the index
                $answer = isset($data['answer'][$index]) ? $data['answer'][$index] : null;
        
                // Retrieve the existing FAQ record, if any, based on the question
                $existingFaq = Faq::where('service_id', $id)
                    ->where('question', $question)
                    ->first();
        
                // Check if the record exists
                if ($question !== null) {
                    if ($existingFaq) {
                        // Update the answer if present
                        if ($answer) {
                            $existingFaq->answer = $answer;
                            $existingFaq->save();
                        }
                    } else {
                        // Create a new record for the question and answer
                        $newFaq = new Faq([
                            'service_id' => $id,
                            'question' => $question,
                            'answer' => $answer,
                        ]);
                        $newFaq->save();
                    }
                }
            }
        }
        // if (isset($data['question'])) {
        // $servicedata->question = implode(',',$data['question']);
        // }
        // if (isset($data['answer'])) {
        // $servicedata->answer = implode(',',$data['answer']);
        // }
        // $servicedata->order_quantity=$request->order_quantity;
        // $files = [];
        // if ($request->hasFile('image')) {
        //     $images = $request->file('image');
        //     $destination ="uploads/service/".$servicedata->image;
        //     if (File::exists($destination)) {
        //        File::delete($destination);
        //     }
        //     foreach ($images as $image) {
        //         // Generate a unique name for the image
        //         $imageName = time(). '_' . $image->getClientOriginalName();
                
        //         // Move the image to the desired location
        //         $image->move('uploads/service/', $imageName);
                
        //         $files[] = $imageName; 
        //     }
            
            
        // }
        // $servicedata->image = json_encode($files);
        // image code start 
        // Get the existing images from the hidden input field
    $existingImages = $request->input('existing_images');
    $updatedImages = [];
    // Process and update the images
    if ($request->hasFile('image')) {
        $newImages = $request->file('image');
        
        // Delete existing images from storage
        foreach ($existingImages as $existingImage) {
            $destination = "uploads/service/" . $existingImage;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        
        $updatedImages = [];
        foreach ($newImages as $image) {
            // Generate a unique name for the new image
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the new image to the desired location
            $image->move('uploads/service/', $imageName);

            $updatedImages[] = $imageName;
        }
        
        // Merge the existing images and updated images
        $allImages = array_merge($existingImages, $updatedImages);
        
        // Update the image field in the $servicedata object
        $servicedata = Service::find($id);
        $servicedata->image = json_encode($allImages);
    }
        // image code end
        if (empty($seller_info->image) && !empty($updatedImages)) {
            // If $seller_info->image is empty, check if there are any uploaded images from the service folder
            // and update with the first image from the $files array
            $firstImage = reset($updatedImages);
    
            // Copy the first image to the uploads/userdata/ folder
            File::copy("uploads/service/" . $firstImage, "uploads/userdata/" . $firstImage);
    
            // Update the image field of the SellerInfo model with the filename
            $seller_info->image = $firstImage;
        } else {
            // If $seller_info->image is not empty or if there are no uploaded images from the service folder,
            // no changes needed for the image field of the SellerInfo model.
            // You can optionally log or handle this case differently if needed.
        }

        $seller_info->category_id = $request->category_id;
        $servicedata->seo_title = $request->seo_title;
        $servicedata->seo_desc = $request->seo_desc;
        $servicedata->seo_tags = $request->seo_tags;
        
        $seller_info->update();
        $servicedata->update();
        return  redirect()->to($request->last_url)->with('status','Data Updated Successfully');
    }
    public function seller_service_edit($id){
        $user_data = User::find($id);
        
        $servicedata = Service::where('seller_name',$user_data->name)->first();
        // dd($servicedata);
     
        $categories = Category::where('type', '=', 'service')->orderby('name', 'asc')->get();
        $sellernames = User::orderby('name', 'asc')->get();
        return view('layouts.admin_layout.seller_service_edit',compact('servicedata','categories','sellernames'));
    }
    public function update_seller_service(Request $request,$id){
        $data = $request->all();
        // echo '<pre>';print_r($data);exit();
        $servicedata = Service::find($id);
        $faqdata = Faq::where('service_id',$id)->get();
        $seller_info = Sellerinfo::where('company_name', '=', $servicedata->seller_name)->first();
        // $seller_info = Sellerinfo::where('company_name', '=', DB::raw("'" . $servicedata->seller_name . "'"))->first();


        $servicedata->type = $request->type ;        
        $servicedata->seller_name = $request->seller_name;
        $servicedata->category_id = $request->category_id;
        $servicedata->address = $request->address;
        $servicedata->phone= $request->phone;
        $servicedata->is_whatsapp=$request->is_whatsapp;
        $servicedata->price=$request->price;
        $servicedata->unit=$request->unit;
        $servicedata->features=$request->features;
        $servicedata->payment_mode =$request->payment_mode;
        $servicedata->service_highlight=$request->service_highlight;
        $servicedata->extra_services=$request->extra_services;
        $servicedata->from_date=$request->from_date;
        $servicedata->to_date=$request->to_date;
        $servicedata->status=$request->status;
        if (is_array($data['question']) && count($data['question']) > 0) {
            // Loop through each question
            foreach ($data['question'] as $index => $question) {
                // Find the corresponding answer using the index
                $answer = isset($data['answer'][$index]) ? $data['answer'][$index] : null;
        
                // Retrieve the existing FAQ record, if any, based on the question
                $existingFaq = Faq::where('service_id', $id)
                    ->where('question', $question)
                    ->first();
        
                // Check if the record exists
                if ($question !== null) {
                    if ($existingFaq) {
                        // Update the answer if present
                        if ($answer) {
                            $existingFaq->answer = $answer;
                            $existingFaq->save();
                        }
                    } else {
                        // Create a new record for the question and answer
                        $newFaq = new Faq([
                            'service_id' => $id,
                            'question' => $question,
                            'answer' => $answer,
                        ]);
                        $newFaq->save();
                    }
                }
            }
        }
        // if (isset($data['question'])) {
        // $servicedata->question = implode(',',$data['question']);
        // }
        // if (isset($data['answer'])) {
        // $servicedata->answer = implode(',',$data['answer']);
        // }
        // $servicedata->order_quantity=$request->order_quantity;
        // $files = [];
        // if ($request->hasFile('image')) {
        //     $images = $request->file('image');
        //     $destination ="uploads/service/".$servicedata->image;
        //     if (File::exists($destination)) {
        //        File::delete($destination);
        //     }
        //     foreach ($images as $image) {
        //         // Generate a unique name for the image
        //         $imageName = time(). '_' . $image->getClientOriginalName();
                
        //         // Move the image to the desired location
        //         $image->move('uploads/service/', $imageName);
                
        //         $files[] = $imageName; 
        //     }
            
            
        // }
        // $servicedata->image = json_encode($files);
        // image code start 
        // Get the existing images from the hidden input field
    $existingImages = $request->input('existing_images');
    $updatedImages = [];
    // Process and update the images
    if ($request->hasFile('image')) {
        $newImages = $request->file('image');
        
        // Delete existing images from storage
        foreach ($existingImages as $existingImage) {
            $destination = "uploads/service/" . $existingImage;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }
        
        $updatedImages = [];
        foreach ($newImages as $image) {
            // Generate a unique name for the new image
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the new image to the desired location
            $image->move('uploads/service/', $imageName);

            $updatedImages[] = $imageName;
        }
        
        // Merge the existing images and updated images
        $allImages = array_merge($existingImages, $updatedImages);
        
        // Update the image field in the $servicedata object
        $servicedata = Service::find($id);
        $servicedata->image = json_encode($allImages);
    }
        // image code end
        if (empty($seller_info->image) && !empty($updatedImages)) {
            // If $seller_info->image is empty, check if there are any uploaded images from the service folder
            // and update with the first image from the $files array
            $firstImage = reset($updatedImages);
    
            // Copy the first image to the uploads/userdata/ folder
            File::copy("uploads/service/" . $firstImage, "uploads/userdata/" . $firstImage);
    
            // Update the image field of the SellerInfo model with the filename
            $seller_info->image = $firstImage;
        } else {
            // If $seller_info->image is not empty or if there are no uploaded images from the service folder,
            // no changes needed for the image field of the SellerInfo model.
            // You can optionally log or handle this case differently if needed.
        }

        $seller_info->category_id = $request->category_id;
        $servicedata->seo_title = $request->seo_title;
        $servicedata->seo_desc = $request->seo_desc;
        $servicedata->seo_tags = $request->seo_tags;
        
        $seller_info->update();
        $servicedata->update();
        return  redirect()->to($request->last_url)->with('status','Data Updated Successfully');
    }
    public function update_service_backup(Request $request,$id){
        $data = $request->all();
        // echo '<pre>';print_r($data);exit();
        $servicedata = Service::find($id);
        $faqdata = Faq::where('service_id',$id)->get();
        $seller_info = Sellerinfo::where('company_name', '=', $servicedata->seller_name)->first();
        // $seller_info = Sellerinfo::where('company_name', '=', DB::raw("'" . $servicedata->seller_name . "'"))->first();


        $servicedata->type = $request->type ;        
        $servicedata->seller_name = $request->seller_name;
        $servicedata->category_id = $request->category_id;
        $servicedata->address = $request->address;
        $servicedata->phone= $request->phone;
        $servicedata->is_whatsapp=$request->is_whatsapp;
        $servicedata->price=$request->price;
        $servicedata->unit=$request->unit;
        $servicedata->features=$request->features;
        $servicedata->payment_mode =$request->payment_mode;
        $servicedata->service_highlight=$request->service_highlight;
        $servicedata->extra_services=$request->extra_services;
        $servicedata->from_date=$request->from_date;
        $servicedata->to_date=$request->to_date;
        $servicedata->status=$request->status;
        if (is_array($data['question']) && count($data['question']) > 0) {
            // Loop through each question
            foreach ($data['question'] as $index => $question) {
                // Find the corresponding answer using the index
                $answer = isset($data['answer'][$index]) ? $data['answer'][$index] : null;
        
                // Retrieve the existing FAQ record, if any, based on the question
                $existingFaq = Faq::where('service_id', $id)
                    ->where('question', $question)
                    ->first();
        
                // Check if the record exists
                if ($question !== null) {
                    if ($existingFaq) {
                        // Update the answer if present
                        if ($answer) {
                            $existingFaq->answer = $answer;
                            $existingFaq->save();
                        }
                    } else {
                        // Create a new record for the question and answer
                        $newFaq = new Faq([
                            'service_id' => $id,
                            'question' => $question,
                            'answer' => $answer,
                        ]);
                        $newFaq->save();
                    }
                }
            }
        }
        // if (isset($data['question'])) {
        // $servicedata->question = implode(',',$data['question']);
        // }
        // if (isset($data['answer'])) {
        // $servicedata->answer = implode(',',$data['answer']);
        // }
        // $servicedata->order_quantity=$request->order_quantity;
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
        
        if (empty($seller_info->image) && !empty($files)) {
            // If $seller_info->image is empty, check if there are any uploaded images from the service folder
            // and update with the first image from the $files array
            $firstImage = reset($files);
    
            // Copy the first image to the uploads/userdata/ folder
            File::copy("uploads/service/" . $firstImage, "uploads/userdata/" . $firstImage);
    
            // Update the image field of the SellerInfo model with the filename
            $seller_info->image = $firstImage;
        } else {
            // If $seller_info->image is not empty or if there are no uploaded images from the service folder,
            // no changes needed for the image field of the SellerInfo model.
            // You can optionally log or handle this case differently if needed.
        }

        $seller_info->category_id = $request->category_id;
        $servicedata->seo_title = $request->seo_title;
        $servicedata->seo_desc = $request->seo_desc;
        $servicedata->seo_tags = $request->seo_tags;
        
        $seller_info->update();
        $servicedata->update();
        return  redirect()->to($request->last_url)->with('status','Data Updated Successfully');
    }
    
    public function deleteService($id){
        $clinicdata = Service::find($id);
        $seller_info = Sellerinfo::where('company_name', '=', DB::raw("'" . $clinicdata->seller_name . "'"))->first();
        $user = User::where('name', '=', DB::raw("'" . $clinicdata->seller_name . "'"))->first();
        $destination ="uploads/service/".$clinicdata->image;
        if (File::exists($destination)) {
            File::delete($destination);
         }
         $clinicdata->delete();
         $seller_info->delete();
         $user->delete();
         return redirect('/list-service')->with('status', 'Data deleted successfully');
    }
    public function deleteProduct($id){
        $clinicdata = Product::find($id);
        $destination ="uploads/product/".$clinicdata->image;
        if (File::exists($destination)) {
            File::delete($destination);
         }
         $clinicdata->delete();
         return redirect('/list-product')->with('status', 'Data deleted successfully');
    }
    // Product Service code end

    

    public function callback_list(){
        $callback_enquiry =  Callback_enquiry::paginate(5);
        $count = Callback_enquiry::count();
        return view('layouts.admin_layout.callback_list',compact('callback_enquiry','count'));
    }
    public function callback_delete($id){
        $callback_enquiry = Callback_enquiry::find($id);
        $callback_enquiry->delete();
         return redirect('/callback-list')->with('status', 'Data deleted successfully');
    }
    public function enquiry_list(){
        $service_enquiry =  Service_enquiry::paginate(5);
        $count = Service_enquiry::count();
        return view('layouts.admin_layout.enquiry_list',compact('service_enquiry','count'));
    }
    // This is for product contact seller
    public function seller_enquiry_list(){
        $seller_enquiry_details =  Seller_enquiry_details::paginate(5);
        $count = Seller_enquiry_details::count();
        return view('layouts.admin_layout.seller_enquiry_list',compact('seller_enquiry_details','count'));
    }
    public function seller_enquiry_delete($id){
        $seller_enquiry_details =  Seller_enquiry_details::find($id);
        $seller_enquiry_details->delete();
        return redirect('/seller-enquiry-list')->with('status', 'Data deleted successfully');
        }
    // This is for service enquiry form
    public function service_enquiry_delete($id){
        $service_enquiry =  Service_enquiry::find($id);
        $service_enquiry->delete();
        // $count = Service_enquiry::count();
        return redirect('/enquiry-list')->with('status', 'Data deleted successfully');
        // return view('layouts.admin_layout.enquiry_list',compact('service_enquiry','count'));
    }
    public function admanagement(){
        $admanagement =  Admanagement::get();
        $count = Admanagement::count();
        return view('layouts.admin_layout.admanagement',compact('admanagement','count'));
    }
    public function editAd($id){
        $admanagement = Admanagement::findOrFail($id);
        return view('layouts.admin_layout.edit_admanagement',compact('admanagement'));
    }
    public function update_advertise(Request $request,$id){
        $admanagement = Admanagement::find($id);
        $admanagement->ad_name = $request->ad_name ;        
        
        if($request->hasfile('image'))
        {
            $destination ="uploads/userdata/".$admanagement->image;
            if (File::exists($destination)) {
               File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/userdata/', $filename);
            $admanagement->image = $filename;
        }
        $admanagement->update();
        return redirect('/admanagement')->with('status', 'Data updated successfully');
    }
    public function add_promotion_package(){
       
        return view('layouts.admin_layout.add-promotion-package');
    }
    
    public function list_promotion_package(){
        $admanagement =  Promotion::with('category')->get();
        $count = Promotion::count();
        return view('layouts.admin_layout.list-promotion-package',compact('admanagement','count'));
    }
    public function promotionmanagement(){
        $admanagement =  Promotion::get();
        $count = Promotion::count();
        return view('layouts.admin_layout.promotion_admanagement',compact('admanagement','count'));
    }
    public function editPromotion($id){
        $admanagement = Promotion::findOrFail($id);
        return view('layouts.admin_layout.promotion_editmanagement',compact('admanagement'));
    }
    public function editPromotionpackage($id){
        $admanagement = Promotion::findOrFail($id);
        return view('layouts.admin_layout.promotion-package-editmanagement',compact('admanagement'));
    }
    public function update_promotion(Request $request,$id){
        $admanagement = Promotion::find($id);
        $admanagement->package1 = $request->package1 ;        
        $admanagement->package2 = $request->package2 ;        
        $admanagement->package3 = $request->package3 ;        
        
        
        $admanagement->update();
        return redirect('/list-promotions')->with('status', 'Data updated successfully');
    }
    public function save_promotion(Request $request){
        
        $admanagement = new Promotion();
        // echo '<pre>';print_r($request->ids_for_promotions);die();
        $admanagement->category_id = $request->category_id ;        
        $admanagement->package_name = $request->package_name ;        
        $admanagement->ids_for_promotions = json_encode($request->ids_for_promotions) ;        
        
        
        $admanagement->save();
        return redirect('/list-promotion-package')->with('status', 'Data added successfully');
    }
    public function getNames(Request $request)
    {
        $categoryId = $request->input('category_id');
        
        // Fetch all subcategories based on the selected category
        $allCategories = Category::where('parent_id', $categoryId)->get();
        $categoryIds = $allCategories->pluck('id')->toArray();

        // Fetch seller information for the selected subcategories
        $sellerInfo = Sellerinfo::whereIn('category_id', $categoryIds)->get();

        // Prepare the data to be sent as JSON response
        $names = $sellerInfo->map(function ($item) {
            return ['id' => $item->id, 'name' => $item->company_name];
        });

        return response()->json(['names' => $names]);
    }
    public function update_promotion_package(Request $request,$id){
        $admanagement = Promotion::find($id);
        $admanagement->category_id = $request->category_id ;        
        $admanagement->package_name = $request->package_name ; 

        // Retrieve existing IDs (as an array)
        $existingIds = json_decode($admanagement->ids_for_promotions, true);
        
        // Retrieve new IDs submitted in the form
        $newIds = $request->input('ids_for_promotions');
        
        // Merge existing and new IDs
        // $updatedIds = array_unique(array_merge($existingIds, $newIds));
        
        // Update the model with the updated IDs
        $admanagement->ids_for_promotions = json_encode($newIds);     
        // $admanagement->ids_for_promotions = json_encode($updatedIds);     
        
        
        $admanagement->update();
        return redirect('/list-promotion-package')->with('status', 'Data updated successfully');
    }
    public function claim_list(){
        $claim_list =  Claimedrequest::paginate(5);
        $count = Claimedrequest::count();
        return view('layouts.admin_layout.claim-list',compact('claim_list','count'));
    }
    public function profile_list(){
        $id = Auth::user()->id;
        $adminData =User::find($id);
        return view('layouts.admin_layout.profile_update',compact('adminData'));
    }
    public function update_profile_list(Request $request,$id){
        // dd($request);
        $seller = User::find($id);
        // dd($seller);
        $seller->name = $request->name ;        
        $seller->email=$request->email;
        $seller->mobile=$request->mobile;
        $seller->address=$request->address;
        if ($request->password) {
            $seller->password=bcrypt($request->password);
        }
        if($request->hasfile('profile_image'))
        {
            $destination ="uploads/userdata/profile_image/".$seller->profile_image;
            if (File::exists($destination)) {
               File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/userdata/profile_image/', $filename);
            $seller->profile_image = $filename;
        }
        $seller->save();
        return redirect('/profile_list')->with('status', 'Data updated successfully');
    }
    public function add_email_send_settings(){
        $emailmanage =  Emailsetting::get();
        $count = Emailsetting::count();
        return view('layouts.admin_layout.emailmanagement',compact('emailmanage','count'));
    }
    public function editEmail_send_setting($id){
        $admanagement = Emailsetting::findOrFail($id);
        return view('layouts.admin_layout.edit_email_management',compact('admanagement'));
    }
    public function update_email_send_setting(Request $request,$id){
        $admanagement = Emailsetting::find($id);
        $admanagement->purpose = $request->purpose ;        
        $admanagement->email = $request->email ;        
        $admanagement->name = $request->name ;        
        $admanagement->cc = $request->cc ;        
        $admanagement->reply_to = $request->reply_to ;        
        
        
        $admanagement->update();
        return redirect('/email-send-settings')->with('status', 'Data updated successfully');
    }

    // chatbot start
    public function chatbox(){
        $user_email = Auth::user()->email;
        $seller_mobile = Auth::user()->mobile;
        $seller_name = Auth::user()->name;
        $sellerinfo = Sellerinfo::where('email',$user_email)->first();
        $chatbot =  ChatMessage::leftjoin('users', 'users.id', 'chat_messages.user_id')
        ->where('chat_messages.seller_id',$sellerinfo->id)->OrWhere('seller_mobile',$seller_mobile)->OrWhere('seller_name',$seller_name)->groupBy('chat_messages.user_id')
        ->select('chat_messages.*','users.name')
        ->paginate(5);
        $count = ChatMessage::count();
        // return $seller_name;
        return view('layouts.admin_layout.chatbox',compact('user_email','chatbot','count'));
    }

    public function view_user_messages($seller_id , $user_id){
        $user_messages = ChatMessage::leftjoin('users', 'users.id', 'chat_messages.user_id')
        ->select('chat_messages.*','users.name')
        ->where('chat_messages.seller_id',$seller_id)->where('chat_messages.user_id',$user_id)->get();
        // return $user_messages;
        return view('layouts.admin_layout.view_user_messages',compact('user_messages'));
    }

    public function admin_replay_message(Request $request) {
        $data = $this->validate($request, [
            'message' => 'required',
        ]);

        $data['user_id'] = $request->user_id;
        $data['seller_id'] = $request->seller_id;
        $data['seller_name'] = $request->seller_name;
        $data['message'] = $request->message;
        $data['position'] = 'right';

        $store = (new ChatMessage)->storeData($data);
        // return redirect()->route('chatbot')->with('message', 'Your message has been sent');
        return response()->json(['message' => 'Form submitted successfully']);
    }

    public function admin_page_refresh(Request $request){
        $user_id = $request->input('user_id');
        $seller_id = $request->input('seller_id');
        $chat_conservation = ChatMessage::leftjoin('users', 'users.id', 'chat_messages.user_id')
        ->where('user_id',$user_id)
        ->select('chat_messages.*','users.name')
        ->where('chat_messages.seller_id',$seller_id)->get();

        $output='';
        foreach($chat_conservation as $i=>$data){
            if($data->position =='left'){
                $output .= '<div class="message-container left">
                    <small>'.$data->name.'</small>
                    <div class="msg_block">'. $data->message .'</div>
                    <h5 style="text-align: right; font-size: 8px; margin: auto;">'. date('h:i:a',strtotime($data->created_at)) .'</h5>
                </div>';
        }

                if($data->position =='right'){
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
    
    // chatbot end
    
}
