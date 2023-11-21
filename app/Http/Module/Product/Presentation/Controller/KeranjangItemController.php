<?php

namespace App\Http\Module\Product\Presentation\Controller;

use App\Http\Module\Product\Application\Services\CreateKeranjangItems\CreateKeranjangItemsRequest;
use App\Http\Module\Product\Application\Services\CreateKeranjangItems\CreateKeranjangItemsService;
use App\Http\Module\Product\Domain\Model\KeranjangItem;
use App\Http\Module\Product\Domain\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KeranjangItemController
{
    public function __construct(
        private CreateKeranjangItemsService $create_keranjang_item_service
    ) {
    }

    public function addToCart(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer',
        ]);

        $product_id = $request->input('product_id');

        $product = Product::find($product_id);
        
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $createKeranjangItemRequest = new CreateKeranjangItemsRequest(
            $request->input('quantity'),
            $user->id,
            $request->input('product_id'),
        );

        $this->create_keranjang_item_service->execute($createKeranjangItemRequest);
        return response()->json(['message' => 'Product added to cart successfully']);
    }

    public function listKeranjangItem()
    {
        $user = auth()->user();

        $keranjangItems = KeranjangItem::where('user_id', $user->id)->get();

        $products = [];
        foreach ($keranjangItems as $keranjangItem) {
            $product = $keranjangItem->product;
            $product->keranjang_quantity = $keranjangItem->quantity;
            $products[] = $product;
        }
        return view('cart', ['products' => $products]);
    }
}
