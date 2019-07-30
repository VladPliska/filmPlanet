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

Route::get('/','PostController@index')->name('index');

Route::get('register','PostController@showReg')->name('register');
Route::get('login','PostController@showSignIn')->name('signin');

Route::post('verificationMail','PostController@insertData')->name('login');

Route::post('checkVar','PostController@checkVar')->name('checkVar');
Route::post('checkLog','PostController@logining')->name('checkLog');

Route::get('editInfoPage','PostController@editPage')->name('editInfoPage');

Route::post('editMainInfo','PostController@editMainInfo')->name('editMainInfo');
Route::post('editPass','PostController@editPass')->name('editMainPass');

Route::get('main','PostController@mainPage')->name('mainPage');

Route::get('film/{nameFilm}','PostController@filmPage')->name('film');

Route::get('setLike/{nameFilm}/','PostController@addfavourite')->name('addFavourite');

Route::get('selectCategor/{nameCategor}/','PostController@selectCategor')->name('selectCategor');
