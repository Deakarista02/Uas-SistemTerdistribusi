<?php

use App\Http\Controllers\Api\PackagesController;
use App\Http\Controllers\Api\AuthController;
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

Route::get('package', [PackagesController::class, 'index']);
Route::get('package/{package_id}', [PackagesController::class, 'show']);
Route::post('package', [PackagesController::class, 'store']);
Route::put('package/{package_id}', [PackagesController::class, 'update']);
Route::delete('package/{package_id}', [PackagesController::class, 'destroy']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
