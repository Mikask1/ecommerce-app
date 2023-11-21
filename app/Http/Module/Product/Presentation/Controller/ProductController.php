<?php

namespace App\Http\Module\Product\Presentation\Controller;

use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductRequest;
use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductService;
use App\Http\Module\Product\Domain\Model\Categories;
use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Transaction\Domain\Model\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductController
{
    public function __construct(
        private CreateProductService $create_product_service
    ) {
    }

    public function createProduct(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'gambar' => 'required',
            'deskripsi' => 'required|string',
            'rating' => 'required|numeric|between:1,5',
            'harga' => 'required|numeric|min:0',
            'kondisi' => 'required|string|in:baru,bekas',
            'kategori' => 'required|string',
        ]);

        $category = Categories::find($request->input('kategori'));

        if ($category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $createProductRequest = new CreateProductRequest(
            $request->input('nama_produk'),
            $request->input('gambar'),
            $request->input('deskripsi'),
            $request->input('rating'),
            $request->input('harga'),
            $request->input('kondisi'),
            $request->input('kategori')
        );

        $this->create_product_service->execute($createProductRequest);

        return response()->json(['message' => 'Product created successfully']);
    }


    public function listProducts(Request $request)
    {
        $category = $request->input('category');
        $cacheKey = 'products_' . $category;

        if (Cache::has($cacheKey)) {
            $products = Cache::get($cacheKey);
        } else {
            if ($category) {
                $categoryModel = Categories::where('slug', $category)->first();

                if ($categoryModel) {
                    $products = Product::where('kategori', $categoryModel->nama_kategori)->get();
                } else {
                    $products = Product::all();
                }
            } else {
                $products = Product::all();
            }

            Cache::put($cacheKey, $products, 60);
        }

        $categories = Categories::all();

        return view('products', compact('products', 'categories'));
    }

    public function getProduct($id)
    {
        $product = Product::find($id);

        $reviews = Cache::remember('product_reviews_' . $id, 5, function () use ($id) {
            return TransactionDetail::where('produk_id', $id)
                ->whereNotNull('review')
                ->where('review', '<>', '')
                ->select('review', 'rating')
                ->get();
        });

        $product->reviews = $reviews;

        return view('product', compact('product'));
    }
}
