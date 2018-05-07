<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('people', 'PersonController');
Route::resource('pages', 'PagesController');
Route::resource('scraped', 'ScrapedController');
Route::resource('api', 'ApiController', ['only' => 'index']);
Route::resource('dashboard', 'DashboardController', ['only' => 'index']);


Auth::routes();
