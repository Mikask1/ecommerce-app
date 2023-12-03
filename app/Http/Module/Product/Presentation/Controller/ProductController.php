<?php

namespace App\Http\Module\Product\Presentation\Controller;

use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductRequest;
use App\Http\Module\Product\Application\Services\CreateProduct\CreateProductService;
use App\Http\Module\Product\Domain\Model\Categories;
use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Transaction\Domain\Model\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'kondisi' => 'required|string|in:Baru,Bekas',
            'kategori' => 'required|string',
            'stok' => 'required|numeric|min:0'
        ]);

        $category = Categories::where('nama_kategori', $request->input('kategori'))->first();

        if (!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }

        $imagePath = $request->file('gambar')->store('images', 'public');

        $createProductRequest = new CreateProductRequest(
            $request->input('nama_produk'),
            $imagePath, // Save the image path
            $request->input('deskripsi'),
            0,
            $request->input('harga'),
            $request->input('stok'),
            $request->input('kondisi'),
            $request->input('kategori')
        );

        $this->create_product_service->execute($createProductRequest);

        return redirect()->back()->with('status', 'Product created successfully');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'string',
            'deskripsi' => 'string',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'numeric',
            'kondisi' => 'string|in:Bekas,Baru',
            'stok' => 'numeric',
            'kategori' => 'string',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        if ($request->hasFile('gambar')) {
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }

            $gambarPath = $request->file('gambar')->store('images', 'public');
            $product->gambar = $gambarPath;
        }

        // Update other fields
        $product->nama_produk = $request->input('nama_produk') ?? $product->nama_produk;
        $product->deskripsi = $request->input('deskripsi') ?? $product->deskripsi;
        $product->harga = $request->input('harga') ?? $product->harga;
        $product->kondisi = $request->input('kondisi') ?? $product->kondisi;
        $product->kategori = $request->input('kategori') ?? $product->kategori;
        $product->stok = $request->input('stok') ?? $product->stok;

        $product->save();

        return redirect()->back()->with('status', 'Product updated successfully');
    }


    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();

            return redirect()->back()->with('status', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting product: ' . $e->getMessage());
        }
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

    public function getAdminProducts()
    {
        $products = $products = Product::all();

        return view('admin.admin-product', compact('products'));
    }

    public function getAdminCreateProduct()
    {
        $categories = Categories::all();

        $mode = 'create';

        return view('admin.create-edit-product', compact('categories', 'mode'));
    }

    public function getAdminEditProduct($id)
    {
        $product = Product::find($id);
        $categories = Categories::all();

        $mode = 'edit';
        return view('admin.create-edit-product', compact('product', 'categories', 'mode'));
    }
}
