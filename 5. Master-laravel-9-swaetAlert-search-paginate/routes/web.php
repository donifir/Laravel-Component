<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SuplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/',  [BarangController::class,'index']);


 Route::get('/barang',  [BarangController::class,'index']);
 Route::get('/barang/search',  [BarangController::class,'index2']);
 Route::get('/barang/create',  [BarangController::class,'create']);
 Route::post('/barang/create',  [BarangController::class,'store']);
 Route::get('/barang/{id}',  [BarangController::class,'show']);
 Route::get('/barang/edit/{id}',  [BarangController::class,'edit']);
 Route::put('/barang/edit/{id}',  [BarangController::class,'update']);
 Route::delete('/barang/{id}',  [BarangController::class,'destroy']);




 Route::get('/suplier',  [SuplierController::class,'index']);
 Route::get('/suplier/create',  [SuplierController::class,'create']);
 Route::post('/suplier/create',  [SuplierController::class,'store']);
 Route::get('/suplier/edit/{id}',  [SuplierController::class,'edit']);
 Route::put('/suplier/edit/{id}',  [SuplierController::class,'update']);
 Route::delete('/suplier/{id}',  [SuplierController::class,'destroy']);