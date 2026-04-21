<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\NutritionEntry;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        $todayEntries = NutritionEntry::with('food')
            ->where('user_id', auth()->id())
            ->whereDate('consumed_at', today())
            ->orderBy('consumed_at', 'desc')
            ->get();

        return view('food.index', compact('foods', 'todayEntries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'food_id' => 'required|exists:foods,id',
            'quantity' => 'required|numeric|min:1',
            'meal_type' => 'required|in:breakfast,lunch,dinner,snack',
        ]);

        $food = Food::findOrFail($request->food_id);
        
        $nutritionEntry = new NutritionEntry([
            'user_id' => auth()->id(),
            'food_id' => $food->id,
            'quantity' => $request->quantity,
            'calories' => round(($food->calories_per_100g * $request->quantity) / 100),
            'protein' => round(($food->protein_per_100g * $request->quantity) / 100, 2),
            'carbs' => round(($food->carbs_per_100g * $request->quantity) / 100, 2),
            'fat' => round(($food->fat_per_100g * $request->quantity) / 100, 2),
            'consumed_at' => now(),
            'meal_type' => $request->meal_type,
        ]);

        $nutritionEntry->save();

        return redirect()->route('food.index')->with('success', 'Food entry added successfully!');
    }

    public function storeNutrition(Request $request)
    {
        $request->validate([
            'food_ids' => 'required|array|min:1',
            'food_ids.*' => 'required|exists:foods,id',
            'quantities' => 'required|array|min:1',
            'quantities.*' => 'required|numeric|min:0.1',
            'meal_type' => 'required|string|max:50',
            'date' => 'required|date',
        ]);

        try {
            $createdEntries = [];
            
            // Create nutrition entries for each food
            for ($i = 0; $i < count($request->food_ids); $i++) {
                $food = Food::findOrFail($request->food_ids[$i]);
                $quantity = $request->quantities[$i];
                
                // Calculate nutrition for this specific food
                $calories = ($food->calories_per_100g * $quantity) / 100;
                $protein = ($food->protein_per_100g * $quantity) / 100;
                $carbs = ($food->carbs_per_100g * $quantity) / 100;
                $fat = ($food->fat_per_100g * $quantity) / 100;

                $nutritionEntry = new NutritionEntry([
                    'user_id' => auth()->id(),
                    'food_id' => $food->id,
                    'quantity' => $quantity,
                    'unit' => 'gram', // Fixed unit as gram
                    'calories' => $calories,
                    'protein' => $protein,
                    'carbs' => $carbs,
                    'fat' => $fat,
                    'consumed_at' => $request->date . ' ' . now()->format('H:i:s'),
                    'meal_type' => $request->meal_type,
                ]);

                $nutritionEntry->save();
                $createdEntries[] = $nutritionEntry;
            }

            return response()->json([
                'success' => true,
                'message' => count($createdEntries) . ' asupan makanan berhasil ditambahkan!',
                'data' => $createdEntries
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}