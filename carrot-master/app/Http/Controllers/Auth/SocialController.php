<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect('/');
    }
    public function findOrCreateUser($user)
    {
        $authUser = User::where($user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => '',
            'provider_id' => $user->id,
            'level' => 1,
        ]);
    }
    public function redirect()
    {
        return Socialite::driver()->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);
        return redirect('/');
    }
}
