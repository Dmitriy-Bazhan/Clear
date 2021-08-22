<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithFacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('fb_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);
                return redirect()->intended('dashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function removeFacebookId(){
        $user = Socialite::driver('facebook')->user();
        User::where('fb_id', $user->id)->delete();
        return redirect(url('/'));
    }
}
