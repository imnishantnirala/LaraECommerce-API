<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\MerchantAccountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\CategoriesController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// User
Route::post('/register', [RegisterController::class, 'create']);
Route::get('/users', [RegisterController::class, 'index']);
Route::get('/users/{id}', [RegisterController::class, 'show']);

//Password Reset
Route::post('/passwordReset', [RegisterController::class, 'passwordReset']);

// Create product
Route::post('/product', [ProductController::class, 'create']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

// product image
Route::post('/productImages', [ProductImageController::class, 'store']);
Route::get('/productImages', [ProductImageController::class, 'index']);
Route::get('/productImages/{id}', [ProductImageController::class, 'show']);
Route::put('/productImages/{id}', [ProductImageController::class, 'update']);
Route::delete('/productImages/{id}', [ProductImageController::class, 'destroy']);

// merchant accounts
Route::post('/merchantAccounts', [MerchantAccountController::class, 'store']);
Route::get('/merchantAccounts', [MerchantAccountController::class, 'index']);
Route::get('/merchantAccounts/{id}', [MerchantAccountController::class, 'show']);
Route::put('/merchantAccounts/{id}', [MerchantAccountController::class, 'update']);
Route::delete('/merchantAccounts/{id}', [MerchantAccountController::class, 'destroy']);


// Order
Route::get('orders/invoice/{invoice_number}', [OrderController::class, 'findByInvoiceNumber']);
Route::get('orders', [OrderController::class, 'index']);
Route::post('orders', [OrderController::class, 'store']);
Route::get('orders/{id}', [OrderController::class, 'show']);
Route::put('orders/{id}', [OrderController::class, 'update']);
Route::delete('orders/{id}', [OrderController::class, 'destroy']);

// finances
Route::get('finances', [FinanceController::class, 'index']);
Route::get('finances/type/{type}', [FinanceController::class, 'showByType']);
Route::get('finances/status/{status}', [FinanceController::class, 'showByStatus']);
Route::post('finances', [FinanceController::class, 'store']);
Route::put('finances/{id}', [FinanceController::class, 'update']);

// categories
Route::post('/categories', [CategoriesController::class, 'createCategory']);
Route::get('/categories', [CategoriesController::class, 'getAllCategories']);
Route::get('/categories/{id}', [CategoriesController::class, 'updateCategory']);
Route::delete('/categories/{id}', [CategoriesController::class, 'deleteCategory']);


