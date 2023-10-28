<?php

namespace App\Http\Module\Product\Presentation\Controller;

use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductRequest;
use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController
{
    public function __construct(
        private CreateProductService $create_product_service
    ) {
    }

    public function createProduct(Request $request)
    {
        $request = new CreateProductRequest(
            $request->input('nama_produk'),
            $request->input('gambar'),
            $request->input('deskripsi'),
            $request->input('rating'),
            $request->input('harga'),
            $request->input('kondisi'),
            $request->input('kategori')
        );


        return $this->create_product_service->execute($request);
    }
}
