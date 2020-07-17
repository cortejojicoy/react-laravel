<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\User;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialFacebookAccount::where('provider_name','facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider_name' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'username' => $providerUser->getName(),
//                    'firstname'=> $providerUser
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
