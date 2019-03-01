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

Route::get('/', function () {
    return view('welcome');
});

Route::get('questions', 'PublicController@index');
Route::get('questions/{question}', 'PublicController@show');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('questions', 'QuestionsController')->except(['show']);
    Route::get('questions/{question}/option', 'OptionController@create');
    Route::post('questions/{question}/option', 'OptionController@store');
    Route::post('questions/vote', 'OptionController@vote');
});
