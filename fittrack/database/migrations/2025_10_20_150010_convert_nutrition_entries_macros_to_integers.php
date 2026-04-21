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
        // Convert fractions to rounded integers before altering column types
        DB::statement('UPDATE `nutrition_entries` SET `quantity` = ROUND(`quantity`)');
        DB::statement('UPDATE `nutrition_entries` SET `protein` = ROUND(`protein`)');
        DB::statement('UPDATE `nutrition_entries` SET `carbs` = ROUND(`carbs`)');
        DB::statement('UPDATE `nutrition_entries` SET `fat` = ROUND(`fat`)');

        DB::statement('ALTER TABLE `nutrition_entries` MODIFY `quantity` INT NOT NULL');
        DB::statement('ALTER TABLE `nutrition_entries` MODIFY `protein` INT NOT NULL');
        DB::statement('ALTER TABLE `nutrition_entries` MODIFY `carbs` INT NOT NULL');
        DB::statement('ALTER TABLE `nutrition_entries` MODIFY `fat` INT NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE `nutrition_entries` MODIFY `quantity` DECIMAL(8,2) NOT NULL');
        DB::statement('ALTER TABLE `nutrition_entries` MODIFY `protein` DECIMAL(8,2) NOT NULL');
        DB::statement('ALTER TABLE `nutrition_entries` MODIFY `carbs` DECIMAL(8,2) NOT NULL');
        DB::statement('ALTER TABLE `nutrition_entries` MODIFY `fat` DECIMAL(8,2) NOT NULL');
    }
};







