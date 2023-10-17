<?php

use Illuminate\Support\Facades\Route;

Route::get('ping', function(){
    return csrf_token();
});

Route::post('create_product', [\App\Http\Module\Product\Presentation\Controller\ProductController::class, 'createProduct']);
