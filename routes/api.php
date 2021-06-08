<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('formations', App\Http\Controllers\API\FormationAPIController::class);

Route::resource('partenaires', App\Http\Controllers\API\PartenaireAPIController::class);

Route::resource('projets', App\Http\Controllers\API\ProjetAPIController::class);

Route::resource('services', App\Http\Controllers\API\ServiceAPIController::class);