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
})->name('front');

Route::get('/test', function () {
    return view('welcome-moz');
});

Route::post('/translate/{lang}',"TranslateController@index")->name('translate');

Route::get('categories','TranslateController@categories')->name('pharse.categories');

Route::get('categories/topics/{category}','CategoryController@topic')->name('single.category');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function (){

Route::get('categories/create','CategoryController@create')->name('categories.create');
Route::get('categories/index','CategoryController@index')->name('categories.index');
Route::get('categories/edit/{category}','CategoryController@edit')->name('categories.edit');
Route::get('categories/delete/{category}','CategoryController@delete')->name('categories.delete');
Route::post('categories/store','CategoryController@store')->name('categories.store');
Route::post('categories/update/{category}','CategoryController@update')->name('categories.update');

Route::get('topics/create','TopicController@create')->name('topics.create');
Route::get('topics/index','TopicController@index')->name('topics.index');
Route::get('topics/edit/{topic}','TopicController@edit')->name('topics.edit');
Route::get('topics/delete/{topic}','TopicController@delete')->name('topics.delete');
Route::post('topics/store','TopicController@store')->name('topics.store');
Route::post('topics/update/{topic}','TopicController@update')->name('topics.update');
});

