<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('/pickup-order', 'App\Http\Controllers\PickupOrderController@index')->name('select-order');
Route::get('/city', 'App\Http\Controllers\PickupOrderController@getCity')->name('city');
Route::get('/service', 'App\Http\Controllers\PickupOrderController@getService')->name('Service');
Route::post('/add-pickup-order', 'App\Http\Controllers\PickupOrderController@insert')->name('add-pickup-order');
