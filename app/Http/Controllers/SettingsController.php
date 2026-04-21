<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyGoal;
use Carbon\Carbon;

class SettingsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Get today's goals
        $todayGoal = DailyGoal::where('user_id', $user->id)
            ->where('date', today())
            ->first();

        return view('settings.index', compact('todayGoal'));
    }

    public function updateGoals(Request $request)
    {
        $request->validate([
            'calories_goal' => 'required|integer|min:1000|max:5000',
            'protein_goal' => 'required|numeric|min:50|max:300',
            'carbs_goal' => 'required|numeric|min:100|max:500',
            'fat_goal' => 'required|numeric|min:30|max:150',
        ]);

        $user = auth()->user();
        
        DailyGoal::updateOrCreate(
            [
                'user_id' => $user->id,
                'date' => today(),
            ],
            [
                'calories_goal' => $request->calories_goal,
                'protein_goal' => $request->protein_goal,
                'carbs_goal' => $request->carbs_goal,
                'fat_goal' => $request->fat_goal,
            ]
        );

        return redirect()->route('settings.index')->with('success', 'Daily goals updated successfully!');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'gender' => 'required|in:male,female,other',
            'date_of_birth' => 'required|date|before:today',
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return redirect()->route('settings.index')->with('success', 'Profile updated successfully!');
    }
}