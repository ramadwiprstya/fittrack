<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function gender()
    {
        return view('onboarding.gender');
    }

    public function storeGender(Request $request)
    {
        $request->validate([
            'gender' => 'required|in:male,female,other',
        ]);

        $user = Auth::user();
        $user->update(['gender' => $request->gender]);

        return redirect()->route('onboarding.date-of-birth');
    }

    public function dateOfBirth()
    {
        return view('onboarding.date-of-birth');
    }

    public function storeDateOfBirth(Request $request)
    {
        $request->validate([
            'date_of_birth' => 'required|date|before:today',
        ]);

        $user = Auth::user();
        $user->update([
            'date_of_birth' => $request->date_of_birth,
            'onboarding_completed' => true,
        ]);

        return redirect()->route('dashboard')->with('success', 'Welcome to FitTrack! Your profile has been set up successfully.');
    }
}