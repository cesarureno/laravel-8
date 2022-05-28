<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CorporationController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;

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
Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::apiResource('companies', CompanyController::class)
        ->middleware(['scope:companies']);

    Route::apiResource('contacts', ContactController::class)
        ->middleware(['scope:contacts']);

    Route::apiResource('contracts', ContractController::class)
        ->middleware(['scope:contracts']);

    Route::apiResource('corporations', CorporationController::class)
        ->middleware(['scope:corporations']);

    Route::apiResource('documents', DocumentController::class)
        ->middleware(['scope:documents']);

    Route::apiResource('users', UserController::class)
        ->middleware(['scope:users']);

    Route::post('database/backup', [UserController::class, 'backupDatabase']);
});
