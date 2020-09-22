<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/', [MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movies.show');

/*route::get('/', 'MoviesController@index')->name('index');*/
/*route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');*/


Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('/home', [HomeController::class, 'index'])->name('home');




