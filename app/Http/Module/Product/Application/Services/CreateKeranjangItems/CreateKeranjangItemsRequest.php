<?php

namespace App\Http\Module\Product\Application\Services\CreateKeranjangItems;

class CreateKeranjangItemsRequest
{
    public function __construct(
        public string $quantity,
        public string $user_id,
        public string $product_id,
    ) {
    }
}
