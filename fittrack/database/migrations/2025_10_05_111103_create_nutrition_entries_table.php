<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nutrition_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade');
            $table->decimal('quantity', 8, 2); // in grams
            $table->integer('calories');
            $table->decimal('protein', 8, 2);
            $table->decimal('carbs', 8, 2);
            $table->decimal('fat', 8, 2);
            $table->datetime('consumed_at');
            $table->string('meal_type')->default('breakfast'); // breakfast, lunch, dinner, snack
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_entries');
    }
};
