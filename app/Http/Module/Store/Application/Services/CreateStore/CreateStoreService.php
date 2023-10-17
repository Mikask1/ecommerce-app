<?php

namespace App\Http\Module\Store\Application\Services\CreateStore;

use App\Http\Module\Store\Domain\Model\Store;
use App\Http\Module\Store\Infrastructure\Repository\StoreRepository;

class CreateStoreService
{

    public function __construct(
        private StoreRepository $store_repository
    )
    {
    }

    public function execute(CreateStoreRequest $request){
        $store = new Store(
            $request->nama,
            $request->type,
            $request->description,
            $request->rating,
        );

        return $this->store_repository->save($store);
    }
}
