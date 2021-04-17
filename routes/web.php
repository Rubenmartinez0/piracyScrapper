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

Auth::routes();

Route::get('/', 'App\Http\Controllers\SearchController@index')->name('index');
Route::post('/search', 'App\Http\Controllers\SearchController@search')->name('search');

Route::get('/portals', 'App\Http\Controllers\PortalController@index')->name('portal.index');
Route::get('/portal/create', 'App\Http\Controllers\PortalController@createView')->name('portal.createView');
Route::post('/portal/create', 'App\Http\Controllers\PortalController@store')->name('portal.store');
Route::get('/portal/{portalId}', 'App\Http\Controllers\PortalController@editView')->name('portal.editView');
Route::patch('/portal/{portalId}', 'App\Http\Controllers\PortalController@update')->name('portal.update');
Route::delete('/portal/{portalId}', 'App\Http\Controllers\PortalController@delete')->name('portal.delete');