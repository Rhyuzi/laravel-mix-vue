<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('/pickup-order', 'App\Http\Controllers\PickupOrderController@index')->name('select-order');
Route::get('/city', 'App\Http\Controllers\PickupOrderController@getCity')->name('city');
Route::get('/service', 'App\Http\Controllers\PickupOrderController@getService')->name('Service');
Route::post('/add-pickup-order', 'App\Http\Controllers\PickupOrderController@insert')->name('add-pickup-order');

Route::get('/tes', 'App\Http\Controllers\PandusiwiAPI@getCoverageArea')->name('tes');
Route::get('/get-tracking', 'App\Http\Controllers\PandusiwiAPI@getTracking')->name('get-tracking');

Route::get('/get-tracking-id', 'App\Http\Controllers\TrackingController@index')->name('get-tracking-id');
Route::get('/get-resi', 'App\Http\Controllers\TrackingController@logTracking')->name('get-resi');
Route::post('/shipment-data', 'App\Http\Controllers\PandusiwiAPI@shipDataTf')->name('shipment-data');
