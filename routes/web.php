<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\OnboardingController;

// Landing page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Forgot Password routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');

// Onboarding routes
Route::middleware('auth')->group(function () {
    Route::get('/onboarding/gender', [OnboardingController::class, 'gender'])->name('onboarding.gender');
    Route::post('/onboarding/gender', [OnboardingController::class, 'storeGender'])->name('onboarding.store-gender');
    Route::get('/onboarding/date-of-birth', [OnboardingController::class, 'dateOfBirth'])->name('onboarding.date-of-birth');
    Route::post('/onboarding/date-of-birth', [OnboardingController::class, 'storeDateOfBirth'])->name('onboarding.store-date-of-birth');
});

// Protected routes
Route::middleware(['auth', 'onboarding'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Food routes
    Route::get('/food', [FoodController::class, 'index'])->name('food.index');
    Route::post('/food', [FoodController::class, 'store'])->name('food.store');
    
    // Nutrition routes
    Route::post('/nutrition', [FoodController::class, 'storeNutrition'])->name('nutrition.store');

// Test route for foods
Route::get('/test-foods', function() {
    $foods = App\Models\Food::orderBy('name')->take(10)->get(['name', 'calories_per_100g']);
    return response()->json($foods);
});
    
    // Report routes
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    
    // Settings routes
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/goals', [SettingsController::class, 'updateGoals'])->name('settings.updateGoals');
    Route::post('/settings/profile', [SettingsController::class, 'updateProfile'])->name('settings.updateProfile');
});
