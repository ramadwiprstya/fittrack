<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NutritionEntry extends Model
{
    protected $fillable = [
        'user_id',
        'food_id',
        'quantity',
        'unit',
        'calories',
        'protein',
        'carbs',
        'fat',
        'consumed_at',
        'meal_type',
    ];

    protected $casts = [
        'quantity' => 'integer',
        'calories' => 'integer',
        'protein' => 'integer',
        'carbs' => 'integer',
        'fat' => 'integer',
        'consumed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
