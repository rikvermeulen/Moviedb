<?php

use App\Http\Controllers\ActorsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TvShowsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Livewire\Blogs;

Route::get('/', [IndexController::class, 'index'])->name('index.index');

Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');

Route::get('/tvShows', [TvShowsController::class, 'index'])->name('tv.index');
Route::get('/tvShows/{id}', [TvShowsController::class, 'show'])->name('tv.show');

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page?}', [ActorsController::class, 'index']);

Route::get('/actors/{id}', [ActorsController::class, 'show'])->name('actors.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:Admin']], function() {
    Route::resource('/users/blog','App\Http\Controllers\BlogController');
    Route::resource('/roles','App\Http\Controllers\RoleController');
    Route::resource('/users','App\Http\Controllers\UserController');

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/users/blog', Blogs::class)
->name('blog');

