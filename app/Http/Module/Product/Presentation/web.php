<?php

use App\Http\Module\Product\Presentation\Controller\KeranjangItemController;
use App\Http\Module\Product\Presentation\Controller\ProductController;
use App\Http\Module\Product\Presentation\Controller\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('ping', function(){
    return csrf_token();
});

Route::post('create_product', [ProductController::class, 'createProduct'])->middleware(['auth', 'verified'])->name('product.create');

Route::get('products', [ProductController::class, 'listProducts'])->middleware(['auth', 'verified'])->name('products');

Route::get('/product/{id}', [ProductController::class, 'getProduct'])->middleware(['auth', 'verified']);

Route::put('/products/{id}', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('product.update');

Route::delete('/product/{id}', [ProductController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('product/add_to_cart', [KeranjangItemController::class, 'addToCart'])->middleware(['auth', 'verified'])->name('product/add_to_cart');

Route::get('cart', [KeranjangItemController::class, 'listKeranjangItem'])->middleware(['auth', 'verified'])->name('cart');

Route::post('/checkout', [CheckoutController::class, 'index'])->middleware(['auth', 'verified'])->name('checkout');

Route::get('admin/product', [ProductController::class, 'getAdminProducts'])->middleware(['auth', 'verified']);

Route::get('admin/product/create', [ProductController::class, 'getAdminCreateProduct'])->middleware(['auth', 'verified'])->name('admin.product.create');

Route::get('admin/product/edit/{id}', [ProductController::class, 'getAdminEditProduct'])->middleware(['auth', 'verified'])->name('admin.product.edit');