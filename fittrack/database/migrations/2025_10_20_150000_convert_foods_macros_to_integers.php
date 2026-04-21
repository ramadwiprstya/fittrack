<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Round existing values to whole numbers, then change column types to INT
        DB::statement('UPDATE `foods` SET `protein_per_100g` = ROUND(`protein_per_100g`)');
        DB::statement('UPDATE `foods` SET `carbs_per_100g` = ROUND(`carbs_per_100g`)');
        DB::statement('UPDATE `foods` SET `fat_per_100g` = ROUND(`fat_per_100g`)');

        DB::statement('ALTER TABLE `foods` MODIFY `protein_per_100g` INT NOT NULL DEFAULT 0');
        DB::statement('ALTER TABLE `foods` MODIFY `carbs_per_100g` INT NOT NULL DEFAULT 0');
        DB::statement('ALTER TABLE `foods` MODIFY `fat_per_100g` INT NOT NULL DEFAULT 0');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE `foods` MODIFY `protein_per_100g` DECIMAL(8,2) NOT NULL DEFAULT 0');
        DB::statement('ALTER TABLE `foods` MODIFY `carbs_per_100g` DECIMAL(8,2) NOT NULL DEFAULT 0');
        DB::statement('ALTER TABLE `foods` MODIFY `fat_per_100g` DECIMAL(8,2) NOT NULL DEFAULT 0');
    }
};







