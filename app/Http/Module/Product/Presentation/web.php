<?php

use App\Http\Module\Product\Presentation\Controller\KeranjangItemController;
use App\Http\Module\Product\Presentation\Controller\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('ping', function(){
    return csrf_token();
});

Route::post('create_product', [ProductController::class, 'createProduct'])->middleware(['auth', 'verified']);

Route::get('products', [ProductController::class, 'listProducts'])->middleware(['auth', 'verified'])->name('products');

Route::get('product/{id}', [ProductController::class, 'getProduct'])->middleware(['auth', 'verified']);

Route::put('/products/{id}', [ProductController::class, 'update'])->middleware(['auth', 'verified']);

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('product/add_to_cart', [KeranjangItemController::class, 'addToCart'])->middleware(['auth', 'verified'])->name('product/add_to_cart');

Route::get('cart', [KeranjangItemController::class, 'listKeranjangItem'])->name('cart');
