<?php

namespace App\Http\Module\Store\Application\Services\CreateStore;

class CreateStoreRequest
{
    public function __construct(
        public string $nama,
        public string $type,
        public string $description,
        public float $rating,
    )
    {
    }
}
