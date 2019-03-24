<?php


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('welcome');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/update-preferences', 'HomeController@showUpdatePreferencesForm')->name('updatePreferencesForm');
Route::post('/update-preferences', 'HomeController@updatePreferences')->name('updatePreferences');

Route::get('/find-pair', 'HomeController@findPair')->name('findPair');

Route::get('/invites', 'HomeController@invites')->name('invites');
Route::get('/invites/{invite}', 'HomeController@invite')->name('invite');

Route::get('/send-invite/{userGettingInvite}', 'HomeController@sendInvite')->name('sendInvite');

Route::get('/accept-invite/{invite}', 'HomeController@acceptInvite')->name('acceptInvite');
Route::get('/reject-invite/{invite}', 'HomeController@rejectInvite')->name('rejectInvite');

Route::view('/map-test', 'map');
