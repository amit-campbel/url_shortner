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

Route::get('/', 'PageController@index')->name('home');

Route::post('/urls/shorten', 'UrlController@shorten');

Route::get('/urls/most_accessed', 'UrlController@getMostAccessed');

Route::get('/{hash}', 'UrlController@access')->where('hash', '[a-zA-Z0-9]+');
