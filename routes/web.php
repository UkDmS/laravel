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
Route::get('list', 'ListController@printList')->name('list');
Route::get('add', 'AddController@show');
Route::post('add/submit', 'UploadController@imageUploadPost')->name('savePost');
Route::delete('postDelete/{id}', 'ListController@del')->name('postDelete');
Route::post('postEdit/{id}', 'ListController@editPost')->name('postEdit');
Route::post('saveChange/{id}', 'ListController@saveChange')->name('saveChange');
Route::post('saveTag', 'AddController@saveTag');
 //