<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BusinessNewsController;
use App\Http\Controllers\EntertainmentNewsController;
use App\Http\Controllers\GeneralNewsController;
use App\Http\Controllers\HealthNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScienceNewsController;
use App\Http\Controllers\SportsNewsController;
use App\Http\Controllers\TechnologyNewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/articles/{category}/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/business', [BusinessNewsController::class, 'index'])->name('business');
Route::get('/entertainment', [EntertainmentNewsController::class, 'index'])->name('entertainment');
Route::get('/general', [GeneralNewsController::class, 'index'])->name('general');
Route::get('/health', [HealthNewsController::class, 'index'])->name('health');
Route::get('/science', [ScienceNewsController::class, 'index'])->name('science');
Route::get('/sports', [SportsNewsController::class, 'index'])->name('sports');
Route::get('/technology', [TechnologyNewsController::class, 'index'])->name('technology');
Route::get('/favorites', [TechnologyNewsController::class, 'index'])->name('favorites');
Route::get('/mostread', [TechnologyNewsController::class, 'index'])->name('mostread');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
