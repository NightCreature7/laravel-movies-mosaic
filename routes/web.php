<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('root');

Route::middleware(['guest'])->group(function () {
    Auth::routes();
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route for searching movies
    Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');

    // Route for displaying movie details
    Route::get('/movies/details/{id}', [MovieController::class, 'details'])->name('movies.details');
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Additional routes can be defined here as needed
