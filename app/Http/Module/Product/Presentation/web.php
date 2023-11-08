<?php

use App\Http\Module\Product\Presentation\Controller\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('ping', function(){
    return csrf_token();
});

Route::post('create_product', [ProductController::class, 'createProduct'])->middleware(['auth', 'verified']);

Route::get('products', [ProductController::class, 'listProducts'])->middleware(['auth', 'verified'])->name('products');

Route::get('product/{id}', [ProductController::class, 'getProduct'])->middleware(['auth', 'verified']);
