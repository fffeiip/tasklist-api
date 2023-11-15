<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('token', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->resource('/user/tasks',TaskController::class)->only(['index','store','update','destroy']);


Route::get('teste', [TaskController::class, 'teste']);
Route::get('teste2', [TaskController::class, 'teste2']);