<?php

namespace App\Http\Module\Product\Presentation\Controller;

use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductRequest;
use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductService;
use App\Http\Module\Product\Domain\Model\Categories;
use App\Http\Module\Product\Domain\Model\Product;
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

    public function listProducts(Request $request)
    {
        $category = $request->input('category');

        if ($category) {
            $category = Categories::where('slug', $category)->first();

            if ($category) {
                $products = Product::where('kategori', $category->nama_kategori)->get();
            }
            else{
                $products = Product::all();
            }
        } else {
            $products = Product::all();
        }
        $categories = Categories::all();
        return view('products', compact('products', 'categories'));
    }

    public function getProduct($id)
    {
        $product = Product::find($id);
        Log::info($product);
        return view('product', compact('product'));
    }

}
