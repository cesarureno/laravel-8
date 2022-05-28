<?php

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

Route::apiResource('companies', CompanyController::class);
Route::apiResource('contacts', ContactController::class);
Route::apiResource('contracts', ContractController::class);
Route::apiResource('corporations', CorporationController::class);
Route::apiResource('documents', DocumentController::class);
Route::apiResource('users', UserController::class);
