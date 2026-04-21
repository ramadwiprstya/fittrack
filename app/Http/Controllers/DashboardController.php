<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\NutritionEntry;
use App\Models\DailyGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();
        
        // Get today's nutrition entries
        $todayEntries = $user->nutritionEntries()
            ->whereDate('consumed_at', $today)
            ->with('food')
            ->orderBy('consumed_at')
            ->get();

        // Calculate totals for today
        $todayTotals = $todayEntries->reduce(function ($carry, $entry) {
            $carry['calories'] += $entry->calories;
            $carry['protein'] += $entry->protein;
            $carry['carbs'] += $entry->carbs;
            $carry['fat'] += $entry->fat;
            return $carry;
        }, ['calories' => 0, 'protein' => 0, 'carbs' => 0, 'fat' => 0]);

        // Get or create today's goals
        $todayGoal = $user->dailyGoals()->where('date', $today)->first();
        if (!$todayGoal) {
            $todayGoal = $user->dailyGoals()->create([
                'date' => $today,
                'calories_goal' => 2000,
                'protein_goal' => 150,
                'carbs_goal' => 250,
                'fat_goal' => 65,
            ]);
        }

        // Calculate progress percentage
        $caloriesProgress = $todayGoal->calories_goal > 0 
            ? round(($todayTotals['calories'] / $todayGoal->calories_goal) * 100) 
            : 0;

        // Get weekly data for chart
        $weekStart = $today->copy()->startOfWeek();
        $weekData = [];
        
        for ($i = 0; $i < 7; $i++) {
            $date = $weekStart->copy()->addDays($i);
            $dayEntries = $user->nutritionEntries()
                ->whereDate('consumed_at', $date)
                ->get();
            
            $dayTotal = $dayEntries->sum('calories');
            $dayGoal = $user->dailyGoals()
                ->where('date', $date)
                ->first();
            
            $weekData[] = [
                'date' => $date,
                'consumed' => $dayTotal,
                'target' => $dayGoal ? $dayGoal->calories_goal : 2000,
                'day' => $date->format('D'),
            ];
        }

        // Get all foods for dropdown
        $foods = Food::orderBy('name')->get();

        return view('dashboard', compact(
            'todayEntries',
            'todayTotals',
            'todayGoal',
            'caloriesProgress',
            'weekData',
            'foods'
        ));
    }
}
