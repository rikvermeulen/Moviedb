<?php

use Illuminate\Support\Facades\Route;


route::get('/', 'MoviesController@index')->name('movies.index');
route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
