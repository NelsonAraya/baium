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


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admision', 'AdmisionController@index')->name('admision');
Route::post('admision/crear', 'AdmisionController@store')->name('admision.store');
Route::post('admision/view', 'AdmisionController@show')->name('admision.show');

Route::get('categorizacion', 'CategorizacionController@index')->name('categorizacion');
Route::get('categorizacion/{id}/edit',[
    'uses' => 'CategorizacionController@edit',
    'as' => 'categorizacion.edit'
]);
Route::put('categorizacion/{id}',[
    'uses' => 'CategorizacionController@update',
    'as' => 'categorizacion.update'
]);

Route::get('search/alergias','SearchController@alergias');

Route::resource('atencion', 'AtencionController@index');