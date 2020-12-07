<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('welcome-moz');
});

Route::post('/translate/{lang}',"TranslateController@index")->name('translate');

Route::get('categories','TranslateController@categories')->name('pharse.categories');

Route::get('categories/topics','TranslateController@topic')->name('single.topic');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
