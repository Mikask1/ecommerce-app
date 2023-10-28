<?php

namespace App\Http\Module\Product\Application\Services\CreateProduct;

class CreateProductRequest
{
    public function __construct(
        public string $nama_produk,
        public string $gambar,
        public string $deskripsi,
        public string $rating,
        public float $harga,
        public string $kondisi,
        public string $kategori
    ) {
    }

}
