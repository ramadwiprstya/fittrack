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
        DB::statement('UPDATE `daily_goals` SET `protein_goal` = ROUND(`protein_goal`)');
        DB::statement('UPDATE `daily_goals` SET `carbs_goal` = ROUND(`carbs_goal`)');
        DB::statement('UPDATE `daily_goals` SET `fat_goal` = ROUND(`fat_goal`)');

        DB::statement('ALTER TABLE `daily_goals` MODIFY `protein_goal` INT NOT NULL DEFAULT 150');
        DB::statement('ALTER TABLE `daily_goals` MODIFY `carbs_goal` INT NOT NULL DEFAULT 250');
        DB::statement('ALTER TABLE `daily_goals` MODIFY `fat_goal` INT NOT NULL DEFAULT 65');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE `daily_goals` MODIFY `protein_goal` DECIMAL(8,2) NOT NULL DEFAULT 150');
        DB::statement('ALTER TABLE `daily_goals` MODIFY `carbs_goal` DECIMAL(8,2) NOT NULL DEFAULT 250');
        DB::statement('ALTER TABLE `daily_goals` MODIFY `fat_goal` DECIMAL(8,2) NOT NULL DEFAULT 65');
    }
};







