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
    return view('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function(){
	Route::get('exam/list', 'DoTestController@list')->name('exam.list');
	Route::resource('tests', 'TestsController');
	Route::resource('questions', 'QuestionsController');
	Route::get('exam/do/{id}', 'DoTestController@do_exam');
	Route::post('exam/store/{id}', 'DoTestController@store')->name('exam.store');
});
