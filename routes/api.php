<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('/pickup-order', 'App\Http\Controllers\PickupOrderController@index')->name('select-order');
