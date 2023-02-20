<?php

use App\Http\Controllers\imageUploadController;
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

Route::get('data',[imageUploadController::class,'index']);
Route::post('data/create',[imageUploadController::class,'store']);
Route::get('data/{id}',[imageUploadController::class,'show']);
Route::post('data/{id}/update',[imageUploadController::class,'update']);
Route::delete('data/{id}/delete',[imageUploadController::class,'destroy']);

