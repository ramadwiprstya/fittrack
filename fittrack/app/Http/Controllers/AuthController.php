<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Check if user needs onboarding
            $user = Auth::user();
            if (!$user->onboarding_completed) {
                return redirect()->route('onboarding.gender');
            }
            
            return redirect()->intended('/dashboard');
        }

        // Check if user exists with this email
        $user = \App\Models\User::where('email', $request->email)->first();
        
        if ($user) {
            // User exists but wrong password
            throw ValidationException::withMessages([
                'password' => 'Kata sandi yang Anda masukkan salah. Silakan coba lagi.',
            ]);
        } else {
            // User doesn't exist
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar. Silakan periksa kembali atau daftar akun baru.',
            ]);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'onboarding_completed' => false,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login to continue.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
