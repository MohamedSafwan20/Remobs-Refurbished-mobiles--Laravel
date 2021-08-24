<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required|min:3|max:120',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }

    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('/');
        } else {
            return back()->withInput()->with(['error' => 'wrong username or password']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function socialAuthRedirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function socialAuthCallback($provider)
    {
        // Twitter doesn't support stateless
        // Ignore: stateless error
        $userDetailsFromSocialAuth = Socialite::driver($provider)->stateless()->user();

        $user = User::where('email', $userDetailsFromSocialAuth->email)->get();

        if (count($user) > 0)
            return Auth::loginUsingId($user[0]->id) ? redirect()->intended('/') : back()->with('error', 'Something went wrong.');
        else {
            $user = User::create([
                'full_name' => $userDetailsFromSocialAuth->name,
                'email' => $userDetailsFromSocialAuth->email,
                'provider' => $provider,
                'provider_id' => $userDetailsFromSocialAuth->id,
            ]);

            return Auth::loginUsingId($user->id) ? redirect()->intended('/') : back()->with('error', 'Something went wrong.');
        }
    }
}
