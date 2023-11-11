<?php

namespace App\Http\Module\Product\Infrastructure\Repository;

use App\Http\Module\Product\Application\Services\CreateKeranjangItems\CreateKeranjangItemsRequest;
use App\Http\Module\Product\Domain\Model\KeranjangItem;
use App\Http\Module\Product\Domain\Services\Repository\KeranjangRepositoryInterface;
use DB;

class KeranjangRepository implements KeranjangRepositoryInterface
{
    public function save(CreateKeranjangItemsRequest $keranjang)
    {
        return KeranjangItem::updateOrInsert(
            ['user_id' => $keranjang->user_id, 'product_id' => $keranjang->product_id],
            ['quantity' => DB::raw("quantity + $keranjang->quantity")]
        );
    }
}