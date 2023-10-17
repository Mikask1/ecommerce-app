<?php

namespace App\Http\Module\Store\Presentation\Controller;

use App\Http\Module\Store\Application\Services\CreateStore\CreateStoreRequest;
use App\Http\Module\Store\Application\Services\CreateStore\CreateStoreService;
use Illuminate\Http\Request;

class StoreController
{
    public function __construct(
        private CreateStoreService $create_store_service
    )
    {
    }

    public function createStore(Request $request){
        // dd($request);
        $request = new CreateStoreRequest(
            $request->input('nama'),
            $request->input('type'),
            $request->input('description'),
            floatval($request->input('rating')),
        );

        return $this->create_store_service->execute($request);
    }
}
