<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FacebookController extends Controller
{
    public function loginUsingFacebook(Request $request){
        // $type = request()->query('type');
        // Session::put('auth_type', $type);
        Session::put('auth_type', $request->query('type'));
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFromFacebook(){
        $userType = Session::get('auth_type');
        $user = Socialite::driver('facebook')->user();
       
        try {
            // $user = Socialite::driver('facebook')->user();
           $saveUser =  User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ],[
                'facebook_id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt('DR4767#'),
                'user_type' => $userType
            ]
        );
        Auth::loginUsingId($saveUser->id);
        if ($userType === 'customer') {
            return redirect()->intended('/homepage');
        } elseif ($userType === 'seller') {
            return redirect()->intended('/dashboard');
        }
        // return redirect()->intended('homepage');
        }catch(Exception $e) {
            dd($e->getMessage());
        }
    }
    // ITsolutionstuff code
    public function noncallbackFromFacebook(){
        try {
            $userType = Session::get('auth_type');
            $user = Socialite::driver('facebook')->user();
         
            $finduser = User::where('facebook_id', $user->id)->first();
        
            if($finduser){
         
                Auth::login($finduser);
        
                return redirect()->intended('dashboard');
         
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => bcrypt('DR4767#'),
                    'user_type' => $userType
                ]);
        
                Auth::login($newUser);
        
                return redirect()->intended('dashboard');
            }
        
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
