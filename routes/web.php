<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movies.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);

Route::get('/actors/{actors}', [ActorsController::class, 'show'])->name('actors.show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');




