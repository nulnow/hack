<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/update-preferences', 'HomeController@showUpdatePreferencesForm')->name('updatePreferencesForm');
Route::post('/update-preferences', 'HomeController@updatePreferences')->name('updatePreferences');
Route::get('/find-pair', 'HomeController@findPair')->name('findPair');

Route::view('/map-test', 'map');