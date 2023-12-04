<?php

namespace App\Http\Module\Product\Presentation\Controller;

use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Product\Domain\Model\KeranjangItem;
use Illuminate\Http\Request;

class CheckoutController
{
    public function index(Request $request)
    {
        $selectedProductIds = $request->input('selectedProducts', []);
        $selectedProducts = Product::whereIn('id', $selectedProductIds)->get();
        $keranjangItems = KeranjangItem::whereIn('product_id', $selectedProductIds)
            ->where('user_id', auth()->user()->id)
            ->get();

        $totalQuantity = $keranjangItems->sum('quantity');
        $totalPrice = $selectedProducts->sum(function ($product) use ($keranjangItems) {
            $keranjangItem = $keranjangItems->where('product_id', $product->id)->first();
            return $product->harga * ($keranjangItem ? $keranjangItem->quantity : 0);
        });

        $checkoutData = $selectedProducts->map(function ($product) use ($keranjangItems) {
            $keranjangItem = $keranjangItems->where('product_id', $product->id)->first();
            return [
                'product' => $product,
                'quantity' => $keranjangItem ? $keranjangItem->quantity : 0,
            ];
        });

        return view('checkout', [
            'checkoutData' => $checkoutData,
            'totalQuantity' => $totalQuantity,
            'totalPrice' => $totalPrice,
        ]);
    }
}
