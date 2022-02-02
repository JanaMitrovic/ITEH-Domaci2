<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyDeviceController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypeDeviceController;
use Illuminate\Support\Facades\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('companies', [CompanyController::class, 'index']);
Route::get('company/{id}', [CompanyController::class, 'show']);

Route::get('types', [TypeController::class, 'index']);
Route::get('type/{id}', [TypeController::class, 'show']);

Route::resource('devices', DeviceController::class)->only(['index']);

Route::resource('companies.devices', CompanyDeviceController::class)->only(['index']);
Route::resource('types.devices', TypeDeviceController::class)->only(['index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return auth()->user();
    });
    Route::resource('devices', DeviceController::class)->only(['update', 'store', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
