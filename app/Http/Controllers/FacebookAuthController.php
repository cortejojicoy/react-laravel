<?php

namespace App\Http\Controllers;

use App\SocialFacebookAccountService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Socialite;

class FacebookAuthController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->to('/home');
    }
}
