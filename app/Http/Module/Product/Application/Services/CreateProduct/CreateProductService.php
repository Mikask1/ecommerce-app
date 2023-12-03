<?php

namespace App\Http\Module\Product\Application\Services\CreateProduct;

use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Product\Infrastructure\Repository\ProductRepository;
use Illuminate\Support\Facades\Log;
class CreateProductService
{

    public function __construct(
        private ProductRepository $product_repository
    ) {}

    public function execute(CreateProductRequest $request)
    {
        $product = new Product([
            'nama_produk' => $request->nama_produk,
            'gambar' => $request->gambar,
            'deskripsi' => $request->deskripsi,
            'rating' => $request->rating,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kondisi' => $request->kondisi,
            'kategori' => $request->kategori
        ]);

        return $this->product_repository->save($product);
    }
}
