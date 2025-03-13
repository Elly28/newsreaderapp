<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BusinessNewsController;
use App\Http\Controllers\EntertainmentNewsController;
use App\Http\Controllers\FavoriteController;
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
Route::get('/business/{id}', [BusinessNewsController::class, 'show'])->name('business.show');

Route::get('/entertainment', [EntertainmentNewsController::class, 'index'])->name('entertainment');
Route::get('/entertainment/{id}', [EntertainmentNewsController::class, 'show'])->name('entertainment.show');

Route::get('/general', [GeneralNewsController::class, 'index'])->name('general');
Route::get('/general/{id}', [GeneralNewsController::class, 'show'])->name('general.show');

Route::get('/health', [HealthNewsController::class, 'index'])->name('health');
Route::get('/health/{id}', [HealthNewsController::class, 'show'])->name('health.show');

Route::get('/science', [ScienceNewsController::class, 'index'])->name('science');
Route::get('/science/{id}', [ScienceNewsController::class, 'show'])->name('science.show');

Route::get('/sports', [SportsNewsController::class, 'index'])->name('sports');
Route::get('/sports/{id}', [SportsNewsController::class, 'show'])->name('sports.show');

Route::get('/technology', [TechnologyNewsController::class, 'index'])->name('technology');
Route::get('/technology/{id}', [TechnologyNewsController::class, 'show'])->name('technology.show');

Route::get('/favorites', [TechnologyNewsController::class, 'index'])->name('favorites');
Route::get('/favorites/{id}', [TechnologyNewsController::class, 'show'])->name('favorites.show');

Route::get('/mostread', [TechnologyNewsController::class, 'index'])->name('mostread');
Route::get('/mostread/{id}', [TechnologyNewsController::class, 'show'])->name('mostread.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add to favorites
    Route::post('/article/{id}/{category}/favorite', [FavoriteController::class, 'addToFavorites'])->name('article.favorite');

    // Remove from favorites
    Route::post('/article/{id}/{category}/unfavorite', [FavoriteController::class, 'removeFromFavorites'])->name('article.unfavorite');

    Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('favorites');
});

require __DIR__.'/auth.php';
