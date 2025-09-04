<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin() {

        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('auth.login');
    }

    public function authenticate(Request $request) {

        try {
            $credentials = $request->validate([
                'username' => ['required', 'string', 'min:3', 'max:50', 'exists:users,username'],
                'password' => ['required', 'string', Password::min(8)],
            ],
            [
                'username.exists' => 'The provided credentials do not match our records.',
            ]
        );
        } catch (ValidationException $e) {
            
            $errors = $e->errors();

            return back()->withErrors($errors)->withInput();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function dashboard() {

        $user = Auth::authenticate();

        if($user) {
            return view('dashboard', ['user' => $user]);
        }
    }
}
