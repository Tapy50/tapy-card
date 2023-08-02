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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('profile', [\App\Http\Controllers\Api\ProfileController::class, 'index']);
Route::get('About', [\App\Http\Controllers\Api\ProfileController::class, 'About']);
Route::get('links', [\App\Http\Controllers\Api\ProfileController::class, 'links']);
Route::get('social', [\App\Http\Controllers\Api\ProfileController::class, 'social']);
Route::get('contact', [\App\Http\Controllers\Api\ProfileController::class, 'contact']);
Route::get('images', [\App\Http\Controllers\Api\ProfileController::class, 'images']);
Route::get('videos', [\App\Http\Controllers\Api\ProfileController::class, 'videos']);
Route::get('payments', [\App\Http\Controllers\Api\ProfileController::class, 'payments']);
Route::get('appointments', [\App\Http\Controllers\Api\ProfileController::class, 'appointments']);
Route::post('store-appointment', [\App\Http\Controllers\Api\ProfileController::class, 'storeAppointments']);
Route::post('store-exchange-contact', [\App\Http\Controllers\Api\ProfileController::class, 'storeContact']);
