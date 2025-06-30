<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm():View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($data)){
            return redirect()->intended('profile');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->intended('/login');
    }



    public function showRegisterForm():View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('auth.register');
    }



    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->intended('/login')->withErrors('status', 'Registration Successful');

    }



    public function profile(): View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }



    public function updateProfile(Request $request): RedirectResponse
    {
        $data = request()->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users, email,'.Auth::id(),
        ]);

        $user = Auth::user();
        $user->update($data);

        return redirect()->route('profile');
    }


    public function showChangePasswordForm():View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if(!Hash::check($data['current_password'], $user->password)){
            return back()->withErrors(['current_password' => 'Current password does not match our records.']);
        }

        $user->password = Hash::make($data['new_password']);
        $user->save();

        return redirect()->route('profile')->with('success', 'Password changed successfully.' );
    }
}
