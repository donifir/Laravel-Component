<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SuplierController;
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

Route::get('/suplier',[SuplierController::class,'index']);
Route::post('/suplier/create',[SuplierController::class,'store']);
Route::get('/suplier/{id}',[SuplierController::class,'show']);
Route::post('/suplier/edit/{id}',[SuplierController::class,'update']);
Route::delete('/suplier/delete/{id}',[SuplierController::class,'destroy']);

Route::get('/barang',[BarangController::class,'index']);
Route::post('/barang/create',[BarangController::class,'store']);
Route::get('/barang/{id}',[BarangController::class,'show']);
Route::post('/barang/edit/{id}',[BarangController::class,'update']);
Route::delete('/barang/delete/{id}',[BarangController::class,'destroy']);
