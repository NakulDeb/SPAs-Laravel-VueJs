<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function(){


});
Route::Post('/login', 'UserAuth\LoginController@login');
Route::Post('/register', 'UserAuth\RegisterController@register');
Route::Get('/current-user', 'UserAuth\UserController@current_user');

Route::get('/login/google', 'UserAuth\LoginController@loginWithGoogle');
Route::get('/login/google/callback', 'UserAuth\LoginController@handleloginWithGoogleCallback');
Route::get('/login/google/response', 'UserAuth\LoginController@getResponseFromApi');

//Route::get('/login/google', 'UserAuth\LoginController@loginWithGoogle');
//Route::get('/login/google/callback', 'UserAuth\LoginController@handleloginWithGoogleCallback');

Route::middleware('auth:api')->group(function () {
    //
});


Route::get('/oauth/redirect', 'UserAuth\OauthController@redirect');

Route::resource('/post', 'PostController');
Route::post('/posts/search', 'PostController@searchPost');

