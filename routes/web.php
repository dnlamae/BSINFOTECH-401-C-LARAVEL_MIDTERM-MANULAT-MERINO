<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index']);

Route::get('products', [ProductController::class, 'index']);
Route::get('add-product', [ProductController::class,'create']);
Route::post('add-product', [ProductController::class,'store']);
Route::get('edit-product/{id}', [ProductController::class,'edit']);
Route::put('update-product/{id}', [ProductController::class,'update']);
Route::get('delete-product/{id}', [ProductController::class,'destroy']);