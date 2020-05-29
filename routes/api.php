<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function (): void {
    Route::get('/users', 'UserController@users');
});

Route::get('/', function () {
    echo 'OpenTransportManager API';
});

Route::fallback(function () {
    return redirect()->to('https://opentransportmanager.github.io/otm-docs/');
});

Route::post('/login', 'AuthenticationController@login');

Route::post('/paths/{path}/stations', 'PathStationController@attachStations');
Route::delete('/paths/{path}/stations', 'PathStationController@detachStations');
Route::get('/paths/{path}/stations', 'PathStationController@showAttachedStations');
Route::apiResource('stations', 'StationController');
Route::apiResource('buslines', 'BuslineController');
Route::apiResource('groups', 'GroupController');
Route::apiResource('paths', 'PathController');
Route::apiResource('courses', 'CourseController');
