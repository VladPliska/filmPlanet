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

Route::get('register','UserController@showReg')->name('register');
Route::get('login','UserController@showSignIn')->name('signin');
Route::post('createUser','UserController@create')->name('login');
Route::post('checkVar','UserController@verification')->name('checkVar');

Route::post('checkLog','UserController@auth')->name('checkLog');

Route::get('editInfoPage','EditPageController@index')->name('editInfoPage');

Route::post('editMainInfo','EditPageController@editMainInfo')->name('editMainInfo');
Route::post('editPass','EditPageController@editPass')->name('editMainPass');

Route::get('film/{nameFilm}','FilmController@index')->name('film');

Route::get('setLike/{nameFilm}/','FilmController@addfavourite')->name('addFavourite');

Route::get('showLikeFilm','FilmController@showFavourite')->name('showFavourite');

Route::get('selectCategor/{nameCategor}/','FilmController@selectCategor')->name('selectCategor');

Route::any('exit','UserController@exit')->name('exit');

Route::get('delete/{user}/{nameFilm}','FilmController@deleteFav')->name('deleteFav');
