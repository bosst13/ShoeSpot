<?php

// use App\Http\Controllers\Admin\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\IndivProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;

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
Route::apiResource('brand', BrandController::class);
Route::apiResource('stock', StockController::class);
Route::apiResource('product', ProductController::class);
Route::get('/api/brands', [ProductController::class, 'getBrands']);

Route::apiResource('availableProduct', IndivProductController::class)->only(['index']);
Route::apiResource('brands', BrandController::class)->only(['index']);
