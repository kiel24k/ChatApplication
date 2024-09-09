<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callBackGoogle()
    {

        $user = Socialite::driver('google')->stateless()->user();
        $findUser = User::where('google_id', $user->id)->first();

        if ($findUser) {
            Auth::login($findUser);
        } else {
            $user = User::create([
                'email' => $user->email,
                'name' => $user->name,
                'google_id' => $user->id,
            ]);
            Auth::login($user);
            return redirect()->intended('/');
        }
        return redirect()->intended('/client-dashboard');

       
    }
}
