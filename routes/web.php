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

Route::get('/post/search', 'PostController@searchPostWeb')->name('post.search');

Route::get('/login/google', 'UserAuth\LoginController@loginWithGoogle');
Route::get('/login/google/callback', 'UserAuth\LoginController@handleloginWithGoogleCallback');


Route::get('/oauth/redirect', 'UserAuth\OauthController@redirect');
Route::get('/oauth/callback', 'UserAuth\OauthController@callBack');


Route::get('/{any}', 'HomeController@index')->where('any','.*');
//Route::get('/login/google', 'UserAuth\LoginController@loginWithGoogle');
//Route::get('login/google/callback', 'UserAuth\LoginController@handleloginWithGoogleCallback');

//Route::get('login/google', 'UserAuth\LoginWithGoogleController@redirectToProvider');
//Route::get('login/google/callback', 'UserAuth\LoginWithGoogleController@handleProviderCallback');

