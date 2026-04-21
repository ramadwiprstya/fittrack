<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NutritionEntry;
use App\Models\DailyGoal;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();
        
        // Get data for the last 7 days
        $weekStart = $today->copy()->subDays(6);
        $weekData = [];
        
        for ($i = 0; $i < 7; $i++) {
            $date = $weekStart->copy()->addDays($i);
            
            // Get nutrition entries for this day
            $dayEntries = $user->nutritionEntries()
                ->whereDate('consumed_at', $date)
                ->get();
            
            // Get or create daily goal for this day
            $dayGoal = $user->dailyGoals()->where('date', $date)->first();
            if (!$dayGoal) {
                $dayGoal = $user->dailyGoals()->create([
                    'date' => $date,
                    'calories_goal' => 2000,
                    'protein_goal' => 150,
                    'carbs_goal' => 250,
                    'fat_goal' => 65,
                ]);
            }
            
            // Calculate totals for this day
            $dayTotals = $dayEntries->reduce(function ($carry, $entry) {
                $carry['calories'] += $entry->calories;
                $carry['protein'] += $entry->protein;
                $carry['carbs'] += $entry->carbs;
                $carry['fat'] += $entry->fat;
                return $carry;
            }, ['calories' => 0, 'protein' => 0, 'carbs' => 0, 'fat' => 0]);
            
            $weekData[] = [
                'date' => $date,
                'day' => $date->format('D'),
                'calories' => $dayTotals['calories'],
                'protein' => $dayTotals['protein'],
                'carbs' => $dayTotals['carbs'],
                'fat' => $dayTotals['fat'],
                'goal_calories' => $dayGoal->calories_goal,
                'goal_protein' => $dayGoal->protein_goal,
                'goal_carbs' => $dayGoal->carbs_goal,
                'goal_fat' => $dayGoal->fat_goal,
            ];
        }
        
        // Calculate averages
        $avgCalories = count($weekData) > 0 ? array_sum(array_column($weekData, 'calories')) / count($weekData) : 0;
        $avgProtein = count($weekData) > 0 ? array_sum(array_column($weekData, 'protein')) / count($weekData) : 0;
        $avgCarbs = count($weekData) > 0 ? array_sum(array_column($weekData, 'carbs')) / count($weekData) : 0;
        $avgFat = count($weekData) > 0 ? array_sum(array_column($weekData, 'fat')) / count($weekData) : 0;
        
        return view('report.index', compact(
            'weekData',
            'avgCalories',
            'avgProtein',
            'avgCarbs',
            'avgFat'
        ));
    }
}
