<?php

namespace App\Http\Module\Product\Infrastructure\Repository;

use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Product\Domain\Services\Repository\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function save(Product $product)
    {
        return Product::create([
            'nama_produk' => $product->nama_produk,
            'gambar' => $product->gambar,
            'deskripsi' => $product->deskripsi,
            'rating' => $product->rating,
            'harga' => $product->harga,
            'kondisi' => $product->kondisi,
            'kategori' => $product->kategori
        ]);
    }
}