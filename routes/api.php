<?php

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

Route::get('/', function () {
    echo 'OpenTransportManager API';
});

Route::fallback(function () {
    return redirect()->to('https://opentransportmanager.github.io/otm-docs/');
});

Route::resource('stations', 'StationController')->except(['edit', 'create']);
Route::resource('buslines', 'BuslineController')->except(['edit', 'create']);
Route::resource('groups', 'GroupController')->except(['edit', 'create']);
