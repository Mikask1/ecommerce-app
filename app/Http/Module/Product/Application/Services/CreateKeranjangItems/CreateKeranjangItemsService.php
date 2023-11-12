<?php

namespace App\Http\Module\Product\Application\Services\CreateKeranjangItems;

use App\Http\Module\Product\Domain\Model\KeranjangItem;
use App\Http\Module\Product\Infrastructure\Repository\KeranjangRepository;
use Illuminate\Support\Facades\Log;

class CreateKeranjangItemsService
{

    public function __construct(
        private KeranjangRepository $keranjang_repository
    ) {
    }

    public function execute(CreateKeranjangItemsRequest $request)
    {

        return $this->keranjang_repository->save($request);
    }
}
