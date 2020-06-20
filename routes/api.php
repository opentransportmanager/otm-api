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

Route::post('/login', 'AuthenticationController@login');
Route::post('/register', 'UserController@store');

Route::middleware('auth:sanctum')->group(function (): void {
    Route::apiResource('/users', 'UserController');
});

Route::get('/', function (): void {
    echo 'OpenTransportManager API';
});

Route::get('/docs', 'DocsController@docs');

Route::post('/paths/{path}/stations', 'PathStationController@attachStations');
Route::delete('/paths/{path}/stations', 'PathStationController@detachStations');
Route::get('/paths/{path}/stations', 'PathStationController@showAttachedStations');
Route::patch('/paths/{path}/stations/{station}', 'PathStationController@update');
Route::get('/stations/{station}/paths', 'StationPathController@showAttachedPaths');
Route::get('/stations/{station}/paths/{path}', 'StationPathController@showTimetable');
Route::apiResource('/stations', 'StationController');
Route::apiResource('/buslines', 'BuslineController');
Route::apiResource('/groups', 'GroupController');
Route::apiResource('/paths', 'PathController');
Route::apiResource('/courses', 'CourseController');
