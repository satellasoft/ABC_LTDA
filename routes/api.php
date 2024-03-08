<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
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

Route::prefix('product')->group(function () {
    Route::get('/list', [ProductController::class, 'filter'])->name('product.filter');
});

Route::prefix('sales')->group(function () {
    Route::get('/list', [SalesController::class, 'filter'])->name('sales.filter');
    Route::post('/', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/{id}', [SalesController::class, 'show'])->name('sales.show')->whereNumber('id');
    Route::put('/{sales_id}/cancel', [SalesController::class, 'cancel'])->name('sales.cancel')->whereNumber('sales_id');
    Route::post('/{sales_id}/add', [SalesController::class, 'add'])->name('sales.add')->whereNumber('sales_id');
});
