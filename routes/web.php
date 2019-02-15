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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/upload', 'Admin\FileController@storeImage')->name('upload');

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::resources([
        'illusion' => 'IllusionController',
    ]);
});
