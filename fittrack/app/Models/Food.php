<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    protected $table = 'foods';
    
    protected $fillable = [
        'name',
        'description',
        'calories_per_100g',
        'protein_per_100g',
        'carbs_per_100g',
        'fat_per_100g',
        'category',
        'icon',
    ];

    protected $casts = [
        'calories_per_100g' => 'integer',
        'protein_per_100g' => 'integer',
        'carbs_per_100g' => 'integer',
        'fat_per_100g' => 'integer',
    ];

    public function nutritionEntries(): HasMany
    {
        return $this->hasMany(NutritionEntry::class);
    }
}
