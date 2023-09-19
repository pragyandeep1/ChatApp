<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Sellerinfo;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function home(){
       return view('layouts.frontend_layout.layouts.master'); 
    }
    public function register(){
        return view('layouts.frontend_layout.layouts.frontend_register');
    }
    public function seller_email_available_check(Request $request){
        $email = $request->input('email');
        $Registered_count = User::where('email',$email)->count();
        $Seller_count = Sellerinfo::where('email',$email)->count();
        if ($Registered_count) {
        // if ($Registered_count && $Seller_count) {
            $msg = 'registered';
        }else{
            $msg = 'failed';
        }
       return response()->json(['registered' => $msg]);
    }
    public function seller_phone_available_check(Request $request){
        $mobile = $request->input('mobile');
        $Registered_count = User::where('mobile',$mobile)->count();
        $Seller_count = Sellerinfo::where('phone',$mobile)->count();
        if ($Registered_count && $Seller_count) {
            $msg = 'registered';
        }else{
            $msg = 'failed';
        }
       return response()->json(['registered' => $msg]);
    }
    public function save_frontend_seller(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo '<pre>';print_r($data);exit;
            $seller = new Sellerinfo();
            $users = new User;
            $seller->company_name = $data['company_name'];
            $seller->seller_name = $data['seller_name'];
            $seller->phone = $data['phone'];
            $seller->email = $data['email'];
            $seller->year_drp_down = $data['year_drp_down'];
            $seller->gst_no = $data['gst_no'];
            $seller->pan_no = $data['pan_no'];

            $users->email=$data['email'];
            $users->name=$data['seller_name'];
            $users->user_type='seller';
            $users->password=bcrypt($data['password']);
//             $user->address="";
            $users->status=0;
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/userdata/', $filename);
                $seller->image = $filename;
            }
            $seller->save();
            $users->save();

            // Mail send code 09-05-23
            // Send Confirmation Email
            $email = $data['email'];
            $messageData = [
                'email'=> $data['email'],
                'name'=>$data['seller_name'],
                'code'=>base64_encode($data['email'])
            ];
            Mail::send('emails.confirmation',$messageData,function($message) use($email){
            $message->to($email)->subject('Confirm Your Email Account for Registration');
            });

            // Redirect Back With Success Message

            $message="Please Check Your Email For Confirmation to Activate Your Account!";
            Session::put('success_message',$message);
            // Mail send code 09-05-23

            // event(new Registered($users));
            auth()->login($users);
            return redirect('/dashboard');
            // return view('layouts.frontend_layout.layouts.frontend_login')->with('success', 'Data added successfully');
        }
    }
}
