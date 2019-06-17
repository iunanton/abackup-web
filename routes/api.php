<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('defaultTimeslot', 'Api\DefaultTimeslotController')->only(['index']);

Route::apiResource('timeslot', 'Api\TimeslotController')->only(['index']);

Route::apiResource('appointment', 'Api\AppointmentController')->only(['index']);

Route::get('availableTimeslot', function() {
  $availableTimeslots = App\Timeslot::doesntHave('appointments')->get();
  return response($availableTimeslots);
});
