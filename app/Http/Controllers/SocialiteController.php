<?php

namespace App\Http\Controllers;


use App\Models\User;

use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;


class SocialiteController extends Controller
{
   protected array $allowedProviders = ['facebook', 'google','github','twitter'];
   function redirectToProvider($provider): RedirectResponse|JsonResponse|\Illuminate\Http\RedirectResponse
   {
       if (in_array($provider, $this->allowedProviders)) {
           session()->flush();
           return Socialite::driver($provider)->redirect();

       }else{
           return response()->json(['error' => 'invalid provider'],400);
       }
   }
   function handleProviderCallback($provider): Application|Redirector|\Illuminate\Http\RedirectResponse
   {
       try{

           $googleUser = Socialite::driver($provider)->user();
           Session::invalidate();

           $isUserExist = User::where('email',$googleUser->email)->first();
           if($isUserExist){
               Auth::login($isUserExist);
               Session::regenerate();
               return redirect()->intended('student/dashboard');
           }else{
               $userData=User::create([
                   'name' => $googleUser->name,
                   'email' => $googleUser->email,
                   'google_id' => $googleUser->id,
                   'password' => Hash::make(bin2hex(random_bytes(10)))
               ]);
               Auth::login($userData);
           }
           if ($userData){
               Auth::login($userData);
               return redirect(route('student.dashboard'));
           }
       }catch (Exception $exception){
           Session::invalidate();
           Session::regenerate();
           return redirect()->route('login')->withErrors([
               'error' => 'Authentication failed. Please try again.',
           ]);
       }

       return redirect(route('student.dashboard'));
   }
}
