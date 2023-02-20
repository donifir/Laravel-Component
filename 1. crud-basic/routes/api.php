<?php

use App\Http\Controllers\CrudController;
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

Route::get('/data', [CrudController::class,'index']);
Route::get('/data/{id}', [CrudController::class,'show']);
Route::post('/data/create', [CrudController::class,'store']);
Route::post('/data/{id}/update', [CrudController::class,'update']);
Route::delete('/data/{id}/delete', [CrudController::class,'destroy']);
