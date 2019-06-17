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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect(config('app.fallback_locale'));
});

Route::group(['prefix' => '{locale}', 'where' => ['locale' => 'en|zh']], function() {
    Route::get('/', function ($locale) {
        return redirect(route('rapid-test', $locale));
    });

    Route::get('news', 'ApplicationController@showNews')->name('news');

    Route::get('rapid-test', 'ApplicationController@showRapidTest')->name('rapid-test');

    Route::get('test-booking', 'AppointmentController@create')->name('test-booking');

    Route::post('test-booking', 'AppointmentController@store')->name('appointment.store');

    Route::get('free-condom', 'ApplicationController@showFreeCondom')->name('free-condom');

    Route::get('videos', 'ApplicationController@showVideos')->name('videos');

    Route::get('hiv-positive', 'ApplicationController@showHivPositive')->name('hiv-positive');

    Route::get('join-us', 'ApplicationController@showJoinUs')->name('join-us');

    Route::get('about-us', 'ApplicationController@showAboutUs')->name('about-us');
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth', 'prefix' => 'staff'], function() {
    Route::resource('news', 'NewsPostController')->only(['index', 'create', 'store']);

    Route::resource('timeslot', 'TimeslotController')->only(['index', 'create', 'store']);

    Route::get('appointment', 'AppointmentController@index')->name('appointment.index');
});

//Route::get('/calendar', 'HomeController@calendar')->name('calendar');


