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
use App\User;
use App\Produit;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/find/{id}/user', function ($id) {
    $pro = User::find($id)->produit;
    return $pro;
});

Route::get('/find/{id}/produit', function ($id) {
    $uti = Produit::find($id)->user;
    return $uti;
});