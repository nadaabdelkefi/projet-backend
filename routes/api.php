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

Route::group(['prefix' => 'produit'], function () {
    Route::post('', 'ProductController@add');
    Route::put('/{produit_id}', 'ProductController@update');
    Route::get('','ProductController@show');
    Route::delete('/{produit_id}','ProductController@deleteProduit');
});

Route::group(['prefix' => 'utilisateur'], function () {
   
    Route::post('register','UtilisateurController@register');
    Route::post('login','UtilisateurController@login');
    Route::get('','UtilisateurController@show');
    Route::delete('/{user_id}','UtilisateurController@deleteUser');
    
});

// Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });