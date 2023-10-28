<?php

use App\Http\Module\Product\Presentation\Controller\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('ping', function(){
    return csrf_token();
});

Route::post('create_product', [ProductController::class, 'createProduct']);
