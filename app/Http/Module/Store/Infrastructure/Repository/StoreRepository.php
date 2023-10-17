<?php

namespace App\Http\Module\Store\Infrastructure\Repository;

use App\Http\Module\Store\Domain\Model\Store;
use App\Http\Module\Store\Domain\Services\Repository\StoreRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StoreRepository implements StoreRepositoryInterface
{
    public function save(Store $store)
    {
        DB::table('store')->upsert(
            [
                'nama' => $store->nama,
                'type' => $store->type,
                'description' => $store->description,
                'rating' => $store->rating,
            ],
            uniqueBy: "nama"
        );
    }
}