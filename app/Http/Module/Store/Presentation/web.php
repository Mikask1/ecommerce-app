<?php

use Illuminate\Support\Facades\Route;

Route::get('ping', function(){
    return csrf_token();
});

Route::post('create_store', [\App\Http\Module\Store\Presentation\Controller\StoreController::class, 'createStore']);
