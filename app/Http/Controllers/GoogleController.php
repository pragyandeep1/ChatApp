<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GoogleController extends Controller
{
    public function loginWithGoogle(Request $request){
    // public function loginWithGoogle($type){
        // Store the user type in the session
    // Session::put('auth_type', $type);
    // session(['auth_type' => $request->user_type]);
    Session::put('auth_type', $request->query('user_type'));
    // dd(Session::get('auth_type'));
    // return Socialite::driver('google')->redirect(['auth_type' => $type]);
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        // die();
        $user = Socialite::driver('google')->user();
        // dd($user);
        try {
            
            $findUser = User::where('google_id', $user->id)->first();
            // $findUser = User::where('google_id', $user->id)->first();
            $userType = Session::get('auth_type');
            // if ($findUser) {
            //     $findUser->update([
            //         'user_type' => $findUser->user_type 
            //     ]);
            // } else {
               if(is_null($findUser)){
                $findUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => bcrypt('DR4767#'), // Replace with your logic
                    'user_type' => $userType,
                    'status' => 1,
    
                ]);
            }
            Auth::login($findUser);
       
        return redirect()->intended('/');
        // return redirect('/homepage');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
      
        
    }
    public function handleGoogleCallback__()
    {
       
        $user = Socialite::driver('google')->user();
         // $user = Socialite::driver('google')->user();
         Log::debug('Google User Data:', ['user' => $user]);
         $findUser = User::where('email', $user->getEmail())->first();
         $userType = Session::get('auth_type');

         if ($findUser) {
             Auth::login($findUser);

             if ($userType === 'customer') {
                 return redirect()->intended('/homepage');
             } elseif ($userType === 'seller') {
                 return redirect()->intended('/dashboard');
             }
         } else {
             $newUser = User::create([
                 'name' => $user->getName(),
                 'email' => $user->getEmail(),
                 'google_id' => $user->getId(),
                 'password' => bcrypt('DR4767#'), // Replace with your logic
                 'user_type' => $userType,
             ]);

             Auth::login($newUser);

             if ($userType === 'customer') {
                 return redirect('/homepage');
             } elseif ($userType === 'seller') {
                 return redirect('/profile_list');
             }
         }
        
        // try {
        //     // $user = Socialite::driver('google')->user();
        //     Log::debug('Google User Data:', ['user' => $user]);
        //     $findUser = User::where('email', $user->getEmail())->first();
        //     $userType = Session::get('auth_type');

        //     if ($findUser) {
        //         Auth::login($findUser);

        //         if ($userType === 'customer') {
        //             return redirect()->intended('/homepage');
        //         } elseif ($userType === 'seller') {
        //             return redirect()->intended('/dashboard');
        //         }
        //     } else {
        //         $newUser = User::create([
        //             'name' => $user->getName(),
        //             'email' => $user->getEmail(),
        //             'password' => bcrypt('DR4767#'), // Replace with your logic
        //             'user_type' => $userType,
        //         ]);

        //         Auth::login($newUser);

        //         if ($userType === 'customer') {
        //             return redirect('/homepage');
        //         } elseif ($userType === 'seller') {
        //             return redirect('/profile_list');
        //         }
        //     }
        // } catch (\Exception $e) {
        //     // Handle the exception
        //     return redirect()->route('login')->withErrors(['message' => 'Error occurred during login.']);
        // }
    }
    
    
    
}
