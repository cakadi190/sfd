<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function process($provider)
    {
        $providers = [
            'google'   => 'gl_id',
            'facebook' => 'fb_id',
        ];

        try {
            $social = Socialite::driver($provider)->user();
            $user = User::where($providers[$provider], $social->id);
            $auth = $user->first();

            if($auth)
            {
                if($user->orWhere('fullname', $social->name)->orWhere('email', $social->email)->first())
                {
                    return redirect()->route('login')->with('error', "We detected a duplicate of an account with the name \"{$social->name}\" or with email \"{$social->email}\". If this is you please add a login method with social media to your account.");
                } else {
                    Auth::login($auth);
                    return redirect()->route('dashboard.home');
                }
            } else {
                $create = User::create([
                    'fullname'  => $social->name,
                    'email'     => $social->email,
                    'fb_id'     => $social->id,
                    'password'  => bcrypt('admin@123'),
                ]);
                $create->assignRole('user');

                Auth::login($create);
                return redirect()->route('dashboard.home');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')
                             ->with('error', 'Woops! We are have an issue(s) to logged you in. Please try it later.')
                             ->with('debug', $e->getMessage());
        }
    }
}
