<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Food;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            // Breakfast Foods
            ['name' => 'Nasi Putih', 'calories_per_100g' => 130, 'protein_per_100g' => 2.7, 'carbs_per_100g' => 28, 'fat_per_100g' => 0.3],
            ['name' => 'Telur Rebus', 'calories_per_100g' => 155, 'protein_per_100g' => 13, 'carbs_per_100g' => 1.1, 'fat_per_100g' => 11],
            ['name' => 'Telur Goreng', 'calories_per_100g' => 196, 'protein_per_100g' => 13, 'carbs_per_100g' => 1.1, 'fat_per_100g' => 15],
            ['name' => 'Telur Dadar', 'calories_per_100g' => 196, 'protein_per_100g' => 13, 'carbs_per_100g' => 1.1, 'fat_per_100g' => 15],
            ['name' => 'Roti Tawar', 'calories_per_100g' => 265, 'protein_per_100g' => 9, 'carbs_per_100g' => 49, 'fat_per_100g' => 3.2],
            ['name' => 'Roti Gandum', 'calories_per_100g' => 247, 'protein_per_100g' => 13, 'carbs_per_100g' => 41, 'fat_per_100g' => 4.2],
            ['name' => 'Oatmeal', 'calories_per_100g' => 68, 'protein_per_100g' => 2.4, 'carbs_per_100g' => 12, 'fat_per_100g' => 1.4],
            ['name' => 'Cornflakes', 'calories_per_100g' => 357, 'protein_per_100g' => 7, 'carbs_per_100g' => 84, 'fat_per_100g' => 0.9],
            ['name' => 'Susu Sapi', 'calories_per_100g' => 42, 'protein_per_100g' => 3.4, 'carbs_per_100g' => 5, 'fat_per_100g' => 1],
            ['name' => 'Susu Coklat', 'calories_per_100g' => 83, 'protein_per_100g' => 3.4, 'carbs_per_100g' => 12, 'fat_per_100g' => 2.5],
            ['name' => 'Yogurt Plain', 'calories_per_100g' => 59, 'protein_per_100g' => 10, 'carbs_per_100g' => 3.6, 'fat_per_100g' => 0.4],
            ['name' => 'Yogurt Buah', 'calories_per_100g' => 99, 'protein_per_100g' => 3.5, 'carbs_per_100g' => 19, 'fat_per_100g' => 1.5],
            ['name' => 'Pisang', 'calories_per_100g' => 89, 'protein_per_100g' => 1.1, 'carbs_per_100g' => 23, 'fat_per_100g' => 0.3],
            ['name' => 'Apel', 'calories_per_100g' => 52, 'protein_per_100g' => 0.3, 'carbs_per_100g' => 14, 'fat_per_100g' => 0.2],
            ['name' => 'Jeruk', 'calories_per_100g' => 47, 'protein_per_100g' => 0.9, 'carbs_per_100g' => 12, 'fat_per_100g' => 0.1],
            ['name' => 'Mangga', 'calories_per_100g' => 60, 'protein_per_100g' => 0.8, 'carbs_per_100g' => 15, 'fat_per_100g' => 0.4],
            ['name' => 'Strawberry', 'calories_per_100g' => 32, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 8, 'fat_per_100g' => 0.3],
            ['name' => 'Anggur', 'calories_per_100g' => 67, 'protein_per_100g' => 0.6, 'carbs_per_100g' => 17, 'fat_per_100g' => 0.4],
            ['name' => 'Kiwi', 'calories_per_100g' => 61, 'protein_per_100g' => 1.1, 'carbs_per_100g' => 15, 'fat_per_100g' => 0.5],
            ['name' => 'Alpukat', 'calories_per_100g' => 160, 'protein_per_100g' => 2, 'carbs_per_100g' => 9, 'fat_per_100g' => 15],

            // Lunch Foods - Meat & Protein
            ['name' => 'Ayam Goreng', 'calories_per_100g' => 239, 'protein_per_100g' => 25, 'carbs_per_100g' => 0, 'fat_per_100g' => 15],
            ['name' => 'Ayam Bakar', 'calories_per_100g' => 165, 'protein_per_100g' => 31, 'carbs_per_100g' => 0, 'fat_per_100g' => 3.6],
            ['name' => 'Ayam Panggang', 'calories_per_100g' => 165, 'protein_per_100g' => 31, 'carbs_per_100g' => 0, 'fat_per_100g' => 3.6],
            ['name' => 'Daging Sapi', 'calories_per_100g' => 250, 'protein_per_100g' => 26, 'carbs_per_100g' => 0, 'fat_per_100g' => 15],
            ['name' => 'Daging Kambing', 'calories_per_100g' => 294, 'protein_per_100g' => 25, 'carbs_per_100g' => 0, 'fat_per_100g' => 21],
            ['name' => 'Ikan Salmon', 'calories_per_100g' => 208, 'protein_per_100g' => 25, 'carbs_per_100g' => 0, 'fat_per_100g' => 12],
            ['name' => 'Ikan Tuna', 'calories_per_100g' => 132, 'protein_per_100g' => 28, 'carbs_per_100g' => 0, 'fat_per_100g' => 1.3],
            ['name' => 'Ikan Lele', 'calories_per_100g' => 105, 'protein_per_100g' => 18, 'carbs_per_100g' => 0, 'fat_per_100g' => 3.5],
            ['name' => 'Ikan Gurame', 'calories_per_100g' => 97, 'protein_per_100g' => 20, 'carbs_per_100g' => 0, 'fat_per_100g' => 1.5],
            ['name' => 'Ikan Patin', 'calories_per_100g' => 103, 'protein_per_100g' => 19, 'carbs_per_100g' => 0, 'fat_per_100g' => 2.8],
            ['name' => 'Udang', 'calories_per_100g' => 99, 'protein_per_100g' => 24, 'carbs_per_100g' => 0, 'fat_per_100g' => 0.3],
            ['name' => 'Cumi-cumi', 'calories_per_100g' => 82, 'protein_per_100g' => 15, 'carbs_per_100g' => 3, 'fat_per_100g' => 1.4],
            ['name' => 'Kepiting', 'calories_per_100g' => 97, 'protein_per_100g' => 20, 'carbs_per_100g' => 0, 'fat_per_100g' => 1.5],
            ['name' => 'Tahu', 'calories_per_100g' => 76, 'protein_per_100g' => 8, 'carbs_per_100g' => 1.9, 'fat_per_100g' => 4.8],
            ['name' => 'Tempe', 'calories_per_100g' => 193, 'protein_per_100g' => 19, 'carbs_per_100g' => 9, 'fat_per_100g' => 11],
            ['name' => 'Tahu Goreng', 'calories_per_100g' => 270, 'protein_per_100g' => 15, 'carbs_per_100g' => 8, 'fat_per_100g' => 20],
            ['name' => 'Tempe Goreng', 'calories_per_100g' => 336, 'protein_per_100g' => 20, 'carbs_per_100g' => 12, 'fat_per_100g' => 25],

            // Vegetables
            ['name' => 'Sayur Bayam', 'calories_per_100g' => 23, 'protein_per_100g' => 2.9, 'carbs_per_100g' => 3.6, 'fat_per_100g' => 0.4],
            ['name' => 'Sayur Kangkung', 'calories_per_100g' => 20, 'protein_per_100g' => 2.6, 'carbs_per_100g' => 3.1, 'fat_per_100g' => 0.2],
            ['name' => 'Wortel', 'calories_per_100g' => 41, 'protein_per_100g' => 0.9, 'carbs_per_100g' => 10, 'fat_per_100g' => 0.2],
            ['name' => 'Brokoli', 'calories_per_100g' => 34, 'protein_per_100g' => 2.8, 'carbs_per_100g' => 7, 'fat_per_100g' => 0.4],
            ['name' => 'Kembang Kol', 'calories_per_100g' => 25, 'protein_per_100g' => 1.9, 'carbs_per_100g' => 5, 'fat_per_100g' => 0.3],
            ['name' => 'Tomat', 'calories_per_100g' => 18, 'protein_per_100g' => 0.9, 'carbs_per_100g' => 4, 'fat_per_100g' => 0.2],
            ['name' => 'Timun', 'calories_per_100g' => 16, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 4, 'fat_per_100g' => 0.1],
            ['name' => 'Selada', 'calories_per_100g' => 15, 'protein_per_100g' => 1.4, 'carbs_per_100g' => 3, 'fat_per_100g' => 0.2],
            ['name' => 'Kacang Panjang', 'calories_per_100g' => 31, 'protein_per_100g' => 1.8, 'carbs_per_100g' => 7, 'fat_per_100g' => 0.2],
            ['name' => 'Buncis', 'calories_per_100g' => 31, 'protein_per_100g' => 1.8, 'carbs_per_100g' => 7, 'fat_per_100g' => 0.2],
            ['name' => 'Terong', 'calories_per_100g' => 25, 'protein_per_100g' => 1, 'carbs_per_100g' => 6, 'fat_per_100g' => 0.2],
            ['name' => 'Labu Siam', 'calories_per_100g' => 19, 'protein_per_100g' => 0.6, 'carbs_per_100g' => 4, 'fat_per_100g' => 0.1],
            ['name' => 'Jagung', 'calories_per_100g' => 86, 'protein_per_100g' => 3.3, 'carbs_per_100g' => 19, 'fat_per_100g' => 1.2],
            ['name' => 'Kentang', 'calories_per_100g' => 77, 'protein_per_100g' => 2, 'carbs_per_100g' => 17, 'fat_per_100g' => 0.1],
            ['name' => 'Ubi Jalar', 'calories_per_100g' => 86, 'protein_per_100g' => 1.6, 'carbs_per_100g' => 20, 'fat_per_100g' => 0.1],

            // Indonesian Traditional Foods
            ['name' => 'Mie Ayam', 'calories_per_100g' => 180, 'protein_per_100g' => 8, 'carbs_per_100g' => 25, 'fat_per_100g' => 5],
            ['name' => 'Nasi Goreng', 'calories_per_100g' => 163, 'protein_per_100g' => 4.2, 'carbs_per_100g' => 28, 'fat_per_100g' => 3.5],
            ['name' => 'Nasi Uduk', 'calories_per_100g' => 180, 'protein_per_100g' => 3, 'carbs_per_100g' => 30, 'fat_per_100g' => 5],
            ['name' => 'Nasi Kuning', 'calories_per_100g' => 175, 'protein_per_100g' => 3.5, 'carbs_per_100g' => 29, 'fat_per_100g' => 4.5],
            ['name' => 'Gado-gado', 'calories_per_100g' => 120, 'protein_per_100g' => 6, 'carbs_per_100g' => 15, 'fat_per_100g' => 4],
            ['name' => 'Pecel', 'calories_per_100g' => 95, 'protein_per_100g' => 4, 'carbs_per_100g' => 12, 'fat_per_100g' => 3],
            ['name' => 'Soto Ayam', 'calories_per_100g' => 85, 'protein_per_100g' => 6, 'carbs_per_100g' => 8, 'fat_per_100g' => 2.5],
            ['name' => 'Soto Betawi', 'calories_per_100g' => 95, 'protein_per_100g' => 7, 'carbs_per_100g' => 6, 'fat_per_100g' => 4],
            ['name' => 'Rawon', 'calories_per_100g' => 88, 'protein_per_100g' => 8, 'carbs_per_100g' => 5, 'fat_per_100g' => 3.5],
            ['name' => 'Gudeg', 'calories_per_100g' => 180, 'protein_per_100g' => 4, 'carbs_per_100g' => 35, 'fat_per_100g' => 3],
            ['name' => 'Rendang', 'calories_per_100g' => 468, 'protein_per_100g' => 25, 'carbs_per_100g' => 8, 'fat_per_100g' => 38],
            ['name' => 'Sate Ayam', 'calories_per_100g' => 201, 'protein_per_100g' => 25, 'carbs_per_100g' => 2, 'fat_per_100g' => 10],
            ['name' => 'Sate Kambing', 'calories_per_100g' => 220, 'protein_per_100g' => 26, 'carbs_per_100g' => 2, 'fat_per_100g' => 12],
            ['name' => 'Pecel Lele', 'calories_per_100g' => 185, 'protein_per_100g' => 18, 'carbs_per_100g' => 2, 'fat_per_100g' => 12],
            ['name' => 'Bakso', 'calories_per_100g' => 142, 'protein_per_100g' => 12, 'carbs_per_100g' => 8, 'fat_per_100g' => 6],
            ['name' => 'Sop Buntut', 'calories_per_100g' => 95, 'protein_per_100g' => 8, 'carbs_per_100g' => 3, 'fat_per_100g' => 5],
            ['name' => 'Ketoprak', 'calories_per_100g' => 110, 'protein_per_100g' => 5, 'carbs_per_100g' => 18, 'fat_per_100g' => 2],
            ['name' => 'Lontong Sayur', 'calories_per_100g' => 125, 'protein_per_100g' => 4, 'carbs_per_100g' => 22, 'fat_per_100g' => 2.5],
            ['name' => 'Ketupat Sayur', 'calories_per_100g' => 130, 'protein_per_100g' => 4, 'carbs_per_100g' => 24, 'fat_per_100g' => 2.8],
            ['name' => 'Bubur Ayam', 'calories_per_100g' => 120, 'protein_per_100g' => 6, 'carbs_per_100g' => 18, 'fat_per_100g' => 2],

            // Rice & Grains
            ['name' => 'Nasi Merah', 'calories_per_100g' => 111, 'protein_per_100g' => 2.6, 'carbs_per_100g' => 23, 'fat_per_100g' => 0.9],
            ['name' => 'Nasi Hitam', 'calories_per_100g' => 108, 'protein_per_100g' => 3.5, 'carbs_per_100g' => 22, 'fat_per_100g' => 1.2],
            ['name' => 'Ketupat', 'calories_per_100g' => 150, 'protein_per_100g' => 3, 'carbs_per_100g' => 32, 'fat_per_100g' => 0.5],
            ['name' => 'Lontong', 'calories_per_100g' => 130, 'protein_per_100g' => 2.5, 'carbs_per_100g' => 28, 'fat_per_100g' => 0.3],
            ['name' => 'Bubur Sumsum', 'calories_per_100g' => 95, 'protein_per_100g' => 2, 'carbs_per_100g' => 20, 'fat_per_100g' => 0.5],
            ['name' => 'Bubur Kacang Hijau', 'calories_per_100g' => 110, 'protein_per_100g' => 4, 'carbs_per_100g' => 20, 'fat_per_100g' => 1],

            // Snacks & Others
            ['name' => 'Kerupuk', 'calories_per_100g' => 400, 'protein_per_100g' => 8, 'carbs_per_100g' => 70, 'fat_per_100g' => 10],
            ['name' => 'Kerupuk Udang', 'calories_per_100g' => 450, 'protein_per_100g' => 12, 'carbs_per_100g' => 65, 'fat_per_100g' => 15],
            ['name' => 'Emping', 'calories_per_100g' => 380, 'protein_per_100g' => 15, 'carbs_per_100g' => 60, 'fat_per_100g' => 8],
            ['name' => 'Kacang Tanah', 'calories_per_100g' => 567, 'protein_per_100g' => 26, 'carbs_per_100g' => 16, 'fat_per_100g' => 49],
            ['name' => 'Kacang Almond', 'calories_per_100g' => 579, 'protein_per_100g' => 21, 'carbs_per_100g' => 22, 'fat_per_100g' => 50],
            ['name' => 'Kacang Walnut', 'calories_per_100g' => 654, 'protein_per_100g' => 15, 'carbs_per_100g' => 14, 'fat_per_100g' => 65],
            ['name' => 'Kacang Mete', 'calories_per_100g' => 553, 'protein_per_100g' => 18, 'carbs_per_100g' => 30, 'fat_per_100g' => 44],
            ['name' => 'Kacang Pistachio', 'calories_per_100g' => 560, 'protein_per_100g' => 20, 'carbs_per_100g' => 28, 'fat_per_100g' => 45],
            ['name' => 'Coklat Hitam', 'calories_per_100g' => 546, 'protein_per_100g' => 7.8, 'carbs_per_100g' => 45, 'fat_per_100g' => 31],
            ['name' => 'Coklat Susu', 'calories_per_100g' => 535, 'protein_per_100g' => 7.7, 'carbs_per_100g' => 59, 'fat_per_100g' => 30],
            ['name' => 'Es Krim', 'calories_per_100g' => 207, 'protein_per_100g' => 3.5, 'carbs_per_100g' => 24, 'fat_per_100g' => 11],
            ['name' => 'Es Krim Coklat', 'calories_per_100g' => 216, 'protein_per_100g' => 3.8, 'carbs_per_100g' => 25, 'fat_per_100g' => 12],
            ['name' => 'Kue Lapis', 'calories_per_100g' => 320, 'protein_per_100g' => 6, 'carbs_per_100g' => 45, 'fat_per_100g' => 12],
            ['name' => 'Kue Nastar', 'calories_per_100g' => 450, 'protein_per_100g' => 6, 'carbs_per_100g' => 55, 'fat_per_100g' => 22],
            ['name' => 'Kue Kastengel', 'calories_per_100g' => 480, 'protein_per_100g' => 8, 'carbs_per_100g' => 50, 'fat_per_100g' => 28],
            ['name' => 'Donat', 'calories_per_100g' => 452, 'protein_per_100g' => 5.9, 'carbs_per_100g' => 51, 'fat_per_100g' => 25],
            ['name' => 'Pizza Slice', 'calories_per_100g' => 266, 'protein_per_100g' => 11, 'carbs_per_100g' => 33, 'fat_per_100g' => 10],
            ['name' => 'Hamburger', 'calories_per_100g' => 295, 'protein_per_100g' => 17, 'carbs_per_100g' => 25, 'fat_per_100g' => 12],
            ['name' => 'Kentang Goreng', 'calories_per_100g' => 365, 'protein_per_100g' => 4, 'carbs_per_100g' => 41, 'fat_per_100g' => 22],
            ['name' => 'Nugget Ayam', 'calories_per_100g' => 250, 'protein_per_100g' => 15, 'carbs_per_100g' => 20, 'fat_per_100g' => 12],
            ['name' => 'Sosis', 'calories_per_100g' => 301, 'protein_per_100g' => 13, 'carbs_per_100g' => 2, 'fat_per_100g' => 27],
            ['name' => 'Bakwan', 'calories_per_100g' => 180, 'protein_per_100g' => 6, 'carbs_per_100g' => 25, 'fat_per_100g' => 6],
            ['name' => 'Tahu Isi', 'calories_per_100g' => 220, 'protein_per_100g' => 12, 'carbs_per_100g' => 15, 'fat_per_100g' => 12],
            ['name' => 'Tempe Mendoan', 'calories_per_100g' => 280, 'protein_per_100g' => 15, 'carbs_per_100g' => 20, 'fat_per_100g' => 18],

            // Beverages
            ['name' => 'Air Putih', 'calories_per_100g' => 0, 'protein_per_100g' => 0, 'carbs_per_100g' => 0, 'fat_per_100g' => 0],
            ['name' => 'Teh Manis', 'calories_per_100g' => 32, 'protein_per_100g' => 0.1, 'carbs_per_100g' => 8, 'fat_per_100g' => 0],
            ['name' => 'Teh Tawar', 'calories_per_100g' => 1, 'protein_per_100g' => 0.1, 'carbs_per_100g' => 0, 'fat_per_100g' => 0],
            ['name' => 'Kopi Hitam', 'calories_per_100g' => 2, 'protein_per_100g' => 0.3, 'carbs_per_100g' => 0, 'fat_per_100g' => 0],
            ['name' => 'Kopi Susu', 'calories_per_100g' => 45, 'protein_per_100g' => 2, 'carbs_per_100g' => 5, 'fat_per_100g' => 2],
            ['name' => 'Jus Jeruk', 'calories_per_100g' => 45, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 11, 'fat_per_100g' => 0.2],
            ['name' => 'Jus Apel', 'calories_per_100g' => 46, 'protein_per_100g' => 0.1, 'carbs_per_100g' => 11, 'fat_per_100g' => 0.1],
            ['name' => 'Jus Mangga', 'calories_per_100g' => 60, 'protein_per_100g' => 0.5, 'carbs_per_100g' => 15, 'fat_per_100g' => 0.2],
            ['name' => 'Jus Alpukat', 'calories_per_100g' => 160, 'protein_per_100g' => 2, 'carbs_per_100g' => 9, 'fat_per_100g' => 15],
            ['name' => 'Coca Cola', 'calories_per_100g' => 42, 'protein_per_100g' => 0, 'carbs_per_100g' => 10.6, 'fat_per_100g' => 0],
            ['name' => 'Sprite', 'calories_per_100g' => 38, 'protein_per_100g' => 0, 'carbs_per_100g' => 9.6, 'fat_per_100g' => 0],
            ['name' => 'Fanta', 'calories_per_100g' => 40, 'protein_per_100g' => 0, 'carbs_per_100g' => 10, 'fat_per_100g' => 0],
            ['name' => 'Air Kelapa', 'calories_per_100g' => 19, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 3.7, 'fat_per_100g' => 0.2],
            ['name' => 'Susu Kedelai', 'calories_per_100g' => 33, 'protein_per_100g' => 2.9, 'carbs_per_100g' => 1.8, 'fat_per_100g' => 1.8],
            ['name' => 'Smoothie Buah', 'calories_per_100g' => 60, 'protein_per_100g' => 1, 'carbs_per_100g' => 14, 'fat_per_100g' => 0.3],
            ['name' => 'Es Teh Manis', 'calories_per_100g' => 35, 'protein_per_100g' => 0.1, 'carbs_per_100g' => 9, 'fat_per_100g' => 0],
            ['name' => 'Es Jeruk', 'calories_per_100g' => 48, 'protein_per_100g' => 0.7, 'carbs_per_100g' => 12, 'fat_per_100g' => 0.2],
            ['name' => 'Wedang Jahe', 'calories_per_100g' => 25, 'protein_per_100g' => 0.3, 'carbs_per_100g' => 6, 'fat_per_100g' => 0.1],
            ['name' => 'Bajigur', 'calories_per_100g' => 45, 'protein_per_100g' => 1, 'carbs_per_100g' => 8, 'fat_per_100g' => 1.5],
            ['name' => 'Bandrek', 'calories_per_100g' => 40, 'protein_per_100g' => 0.8, 'carbs_per_100g' => 7, 'fat_per_100g' => 1.2],

            // Fast Food & Western
            ['name' => 'Fried Chicken', 'calories_per_100g' => 246, 'protein_per_100g' => 20, 'carbs_per_100g' => 8, 'fat_per_100g' => 15],
            ['name' => 'French Fries', 'calories_per_100g' => 365, 'protein_per_100g' => 4, 'carbs_per_100g' => 41, 'fat_per_100g' => 22],
            ['name' => 'Onion Rings', 'calories_per_100g' => 411, 'protein_per_100g' => 5, 'carbs_per_100g' => 38, 'fat_per_100g' => 27],
            ['name' => 'Chicken Nuggets', 'calories_per_100g' => 250, 'protein_per_100g' => 15, 'carbs_per_100g' => 20, 'fat_per_100g' => 12],
            ['name' => 'Fish & Chips', 'calories_per_100g' => 280, 'protein_per_100g' => 15, 'carbs_per_100g' => 25, 'fat_per_100g' => 12],
            ['name' => 'Spaghetti', 'calories_per_100g' => 131, 'protein_per_100g' => 5, 'carbs_per_100g' => 25, 'fat_per_100g' => 1.1],
            ['name' => 'Macaroni', 'calories_per_100g' => 131, 'protein_per_100g' => 5, 'carbs_per_100g' => 25, 'fat_per_100g' => 1.1],
            ['name' => 'Lasagna', 'calories_per_100g' => 135, 'protein_per_100g' => 8, 'carbs_per_100g' => 15, 'fat_per_100g' => 5],
            ['name' => 'Sandwich', 'calories_per_100g' => 250, 'protein_per_100g' => 12, 'carbs_per_100g' => 30, 'fat_per_100g' => 8],
            ['name' => 'Hot Dog', 'calories_per_100g' => 290, 'protein_per_100g' => 12, 'carbs_per_100g' => 20, 'fat_per_100g' => 18],

            // Desserts & Sweets
            ['name' => 'Pudding', 'calories_per_100g' => 80, 'protein_per_100g' => 2, 'carbs_per_100g' => 18, 'fat_per_100g' => 0.5],
            ['name' => 'Jelly', 'calories_per_100g' => 60, 'protein_per_100g' => 1, 'carbs_per_100g' => 15, 'fat_per_100g' => 0],
            ['name' => 'Cake Coklat', 'calories_per_100g' => 371, 'protein_per_100g' => 4.9, 'carbs_per_100g' => 53, 'fat_per_100g' => 15],
            ['name' => 'Cake Vanilla', 'calories_per_100g' => 350, 'protein_per_100g' => 4.5, 'carbs_per_100g' => 50, 'fat_per_100g' => 14],
            ['name' => 'Tiramisu', 'calories_per_100g' => 240, 'protein_per_100g' => 4, 'carbs_per_100g' => 25, 'fat_per_100g' => 13],
            ['name' => 'Cheesecake', 'calories_per_100g' => 321, 'protein_per_100g' => 5.5, 'carbs_per_100g' => 25, 'fat_per_100g' => 22],
            ['name' => 'Pancake', 'calories_per_100g' => 227, 'protein_per_100g' => 6, 'carbs_per_100g' => 28, 'fat_per_100g' => 9],
            ['name' => 'Waffle', 'calories_per_100g' => 291, 'protein_per_100g' => 8, 'carbs_per_100g' => 37, 'fat_per_100g' => 12],
            ['name' => 'Crepes', 'calories_per_100g' => 200, 'protein_per_100g' => 6, 'carbs_per_100g' => 25, 'fat_per_100g' => 8],
            ['name' => 'Muffin', 'calories_per_100g' => 265, 'protein_per_100g' => 4, 'carbs_per_100g' => 44, 'fat_per_100g' => 8],

            // Additional Indonesian Foods
            ['name' => 'Pempek', 'calories_per_100g' => 180, 'protein_per_100g' => 8, 'carbs_per_100g' => 30, 'fat_per_100g' => 3],
            ['name' => 'Kerak Telor', 'calories_per_100g' => 220, 'protein_per_100g' => 12, 'carbs_per_100g' => 25, 'fat_per_100g' => 8],
            ['name' => 'Martabak Manis', 'calories_per_100g' => 380, 'protein_per_100g' => 8, 'carbs_per_100g' => 55, 'fat_per_100g' => 15],
            ['name' => 'Martabak Telor', 'calories_per_100g' => 250, 'protein_per_100g' => 12, 'carbs_per_100g' => 20, 'fat_per_100g' => 12],
            ['name' => 'Pisang Goreng', 'calories_per_100g' => 200, 'protein_per_100g' => 2, 'carbs_per_100g' => 35, 'fat_per_100g' => 6],
            ['name' => 'Tahu Sumedang', 'calories_per_100g' => 280, 'protein_per_100g' => 15, 'carbs_per_100g' => 20, 'fat_per_100g' => 15],
            ['name' => 'Cilok', 'calories_per_100g' => 120, 'protein_per_100g' => 4, 'carbs_per_100g' => 25, 'fat_per_100g' => 1],
            ['name' => 'Cimol', 'calories_per_100g' => 110, 'protein_per_100g' => 3, 'carbs_per_100g' => 22, 'fat_per_100g' => 1.5],
            ['name' => 'Batagor', 'calories_per_100g' => 180, 'protein_per_100g' => 8, 'carbs_per_100g' => 25, 'fat_per_100g' => 5],
            ['name' => 'Siomay', 'calories_per_100g' => 150, 'protein_per_100g' => 6, 'carbs_per_100g' => 20, 'fat_per_100g' => 4],

            // Additional Popular Indonesian Foods
            ['name' => 'Ayam Penyet', 'calories_per_100g' => 350, 'protein_per_100g' => 28, 'carbs_per_100g' => 15, 'fat_per_100g' => 20],
            ['name' => 'Ayam Goreng (Updated)', 'calories_per_100g' => 400, 'protein_per_100g' => 30, 'carbs_per_100g' => 8, 'fat_per_100g' => 25],
            ['name' => 'Ayam Geprek', 'calories_per_100g' => 450, 'protein_per_100g' => 32, 'carbs_per_100g' => 20, 'fat_per_100g' => 28],
            ['name' => 'Lele Goreng', 'calories_per_100g' => 350, 'protein_per_100g' => 25, 'carbs_per_100g' => 12, 'fat_per_100g' => 22],
            ['name' => 'Sate Ayam (10 tusuk)', 'calories_per_100g' => 350, 'protein_per_100g' => 35, 'carbs_per_100g' => 5, 'fat_per_100g' => 18],
            ['name' => 'Sop Buntut (Updated)', 'calories_per_100g' => 500, 'protein_per_100g' => 35, 'carbs_per_100g' => 8, 'fat_per_100g' => 35],
            ['name' => 'Bakso (Updated)', 'calories_per_100g' => 250, 'protein_per_100g' => 18, 'carbs_per_100g' => 15, 'fat_per_100g' => 12],
            ['name' => 'Gado-gado (Updated)', 'calories_per_100g' => 400, 'protein_per_100g' => 12, 'carbs_per_100g' => 25, 'fat_per_100g' => 28],
            ['name' => 'Rawon (Updated)', 'calories_per_100g' => 300, 'protein_per_100g' => 25, 'carbs_per_100g' => 8, 'fat_per_100g' => 18],
            ['name' => 'Pecel Sayur', 'calories_per_100g' => 300, 'protein_per_100g' => 8, 'carbs_per_100g' => 20, 'fat_per_100g' => 22],
            ['name' => 'Mie Ayam (Updated)', 'calories_per_100g' => 350, 'protein_per_100g' => 15, 'carbs_per_100g' => 45, 'fat_per_100g' => 12],
        ];

        foreach ($foods as $food) {
            Food::create($food);
        }
    }
}