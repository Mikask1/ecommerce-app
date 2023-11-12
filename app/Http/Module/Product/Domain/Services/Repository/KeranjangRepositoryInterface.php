<?php

namespace App\Http\Module\Product\Domain\Services\Repository;

use App\Http\Module\Product\Application\Services\CreateKeranjangItems\CreateKeranjangItemsRequest;

interface KeranjangRepositoryInterface
{
    public function save(CreateKeranjangItemsRequest $keranjang);
}
