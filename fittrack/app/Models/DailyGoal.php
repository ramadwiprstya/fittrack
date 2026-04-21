<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyGoal extends Model
{
    protected $fillable = [
        'user_id',
        'calories_goal',
        'protein_goal',
        'carbs_goal',
        'fat_goal',
        'date',
    ];

    protected $casts = [
        'calories_goal' => 'integer',
        'protein_goal' => 'integer',
        'carbs_goal' => 'integer',
        'fat_goal' => 'integer',
        'date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
