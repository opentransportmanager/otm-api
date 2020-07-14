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

Route::get('/', function (): void {
    echo 'OpenTransportManager API';
});

Route::get('/docs', 'DocsController@docs');
Route::post('/login', 'AuthenticationController@login')->name('login');
Route::post('/register', 'AuthenticationController@register');
Route::apiResource('/stations', 'StationController')->only(['index', 'show']);
Route::apiResource('/buslines', 'BuslineController')->only(['index', 'show']);
Route::apiResource('/groups', 'GroupController')->only(['index', 'show']);
Route::apiResource('/paths', 'PathController')->only(['index', 'show']);
Route::apiResource('/courses', 'CourseController')->only(['index', 'show']);

Route::get('/paths/{path}/stations', 'PathStationController@showAttachedStations');
Route::get('/stations/{station}/paths', 'StationPathController@showAttachedPaths');
Route::get('/stations/{station}/paths/{path}', 'StationPathController@showTimetable');

Route::middleware('auth:sanctum')->group(function (): void {
    Route::apiResource('/users', 'UserController');
    Route::get('/buslines/user/subscriptions', 'BuslineUserController@userSubscribedBuslines');
    Route::post('/buslines/subscribe', 'BuslineUserController@subscribe');
    Route::delete('/buslines/unsubscribe', 'BuslineUserController@unsubscribe');

    Route::group(['middleware' => 'can:manage, App\Role'], function () {
        Route::get('/roles/assign/{user}', 'RoleController@assignRole');
        Route::delete('/roles/retract/{user}', 'RoleController@retractRole');
        Route::apiResource('/roles', 'RoleController');
    });

    Route::group(['middleware' => 'can:manage'], function () {
        Route::post('/paths/{path}/stations', 'PathStationController@attachStations');
        Route::delete('/paths/{path}/stations', 'PathStationController@detachStations');
        Route::apiResource('/stations', 'StationController')->only(['store', 'update', 'destroy']);
        Route::apiResource('/buslines', 'BuslineController')->only(['store', 'update', 'destroy']);
        Route::apiResource('/groups', 'GroupController')->only(['store', 'update', 'destroy']);
        Route::apiResource('/paths', 'PathController')->only(['store', 'update', 'destroy']);
        Route::apiResource('/courses', 'CourseController')->only(['store', 'update', 'destroy']);
        Route::post('/paths/{path}/stations', 'PathStationController@attachStations');
        Route::delete('/paths/{path}/stations', 'PathStationController@detachStations');
        Route::patch('/paths/{path}/stations/{station}', 'PathStationController@update');
    });
});
