<?php

namespace App\Http\Module\Store\Domain\Services\Repository;

use App\Http\Module\Store\Domain\Model\Store;

interface StoreRepositoryInterface
{
    public function save(Store $product);

}
