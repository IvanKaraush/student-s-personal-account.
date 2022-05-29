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

Route::get('/', function () {
    return view('sign_up');
})->name('sign_up');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/profile',
 function () {
    return view('profile');
})->name('profile');

Route::post('/','App\Http\Controllers\sign_upController@all_data')->name('sign');
Route::post('/registration','App\Http\Controllers\RegistrationController@send_to_db')->name('reg');
Route::post('/settings','App\Http\Controllers\SettingsController@update')->name('update');
Route::post('/profile','App\Http\Controllers\ProfileController@about')->name('about');
