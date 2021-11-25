<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\Models\User;
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
            $users  = new User();
            $social = Socialite::driver($provider)->user();
            $user   = $users->where($providers[$provider], $social->id);
            $auth   = $user->first();

            if($auth)
            {
                Auth::login($auth);
                return redirect()->route('dashboard.home');
            } else {
                if($users->where('email', $social->email)->count() > 0)
                {
                    Auth::login($auth);
                    return redirect()->route('dashboard.home');
                } else {
                    $data = [
                        'id_user'   => uniqid('user-'),
                        'fullname'  => $social->name,
                        'email'     => $social->email,
                        'password'  => bcrypt('password123'),
                    ];
                    $data[$providers[$provider]] = $social->id;
                    $create = User::create($data);
                    $create->assignRole('user');

                    Auth::login($create);
                    return redirect()->route('dashboard.home');
                }
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Woops! We are have an issue(s) to logged you in. Please try it later.')->with('debug', $e->getMessage());
        }
    }
}
