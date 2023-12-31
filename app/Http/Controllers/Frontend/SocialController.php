<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    // Facebook Login
    public function facebookRedirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook() {
        $user = Socialite::driver('facebook')->stateless()->user();
        $findUser = User::where('facebook_id', $user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect('/dashboard');
        }else {
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->facebook_id = $user->id;
            $new_user->password = bcrypt('12345678');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/dashboard');
        }
    }


    // Google Login
    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle() {
        $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('google_id', $user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect('/dashboard');
        }else {
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->google_id = $user->id;
            $new_user->password = bcrypt('12345678');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/dashboard');
        }
    }


    // GitHub Login
    public function githubRedirect() {
        return Socialite::driver('github')->redirect();
    }

    public function loginWithGithub() {
        $user = Socialite::driver('github')->stateless()->user();
        $findUser = User::where('github_id', $user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect('/dashboard');
        }else {
            $new_user = new User();
            $new_user->name = $user->name;
            $new_user->email = $user->email;
            $new_user->github_id = $user->id;
            $new_user->password = bcrypt('12345678');
            $new_user->save();
            Auth::login($new_user);
            return redirect('/dashboard');
        }
    }

}
