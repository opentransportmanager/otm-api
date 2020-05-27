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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', 'UserController@show');
    Route::get('/users', 'UserController@index');
});

Route::get('/', function () {
    echo 'OpenTransportManager API';
});

Route::fallback(function () {
    return redirect()->to('https://opentransportmanager.github.io/otm-docs/');
});

Route::resource('stations', 'StationController')->except(['edit', 'create']);
Route::resource('buslines', 'BuslineController')->except(['edit', 'create']);
Route::resource('groups', 'GroupController')->except(['edit', 'create']);
