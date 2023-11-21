<?php

namespace App\Http\Module\Transaction\Presentation\Controller;

use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Transaction\Domain\Model\Transaction;
use App\Http\Module\Transaction\Domain\Model\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController
{
    public function createTransaction(Request $request)
    {
        $request->validate([
            'metode_bayar' => 'required|string',
            'product' => 'required|array',
            'product.*.product_id' => 'required|integer|exists:products,id',
            'product.*.quantity' => 'required|integer|min:1',
        ]);

        $productsData = $request->input('product');
        $productIds = collect($productsData)->pluck('product_id');

        $products = Product::whereIn('id', $productIds)->get();

        $totalPrice = 0;
        foreach ($products as $product) {
            $quantity = collect($productsData)->firstWhere('product_id', $product->id)['quantity'];
            Log::info($product->harga);
            $totalPrice += $product->harga * $quantity;
        }

        $data = [
            'total_harga' => $totalPrice,
            'metode_bayar' => $request->input('metode_bayar'),
            'user_id' => auth()->user()->id,
        ];

        $transaction = Transaction::create($data);

        foreach ($productsData as $productData) {
            $productId = $productData['product_id'];
            $quantity = $productData['quantity'];

            $transactionDetailData = [
                'kuantitas' => $quantity,
                'produk_id' => $productId,
                'transaction_id' => $transaction->id,
            ];

            TransactionDetail::create($transactionDetailData);
        }

        return response()->json(['message' => 'Transaction created successfully']);
    }

    public function listTransactions()
    {
        $user = auth()->user();

        $transactions = Transaction::with('details.product')
            ->where('user_id', $user->id)
            ->get();

        return view('transactions', ['transactions' => $transactions]);
    }

    public function updateReview(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'transaction_detail_id' => 'required|integer|exists:transaction_details,id',
            'review' => 'required|string',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $transactionDetailId = $request->input('transaction_detail_id');

        $transactionDetail = TransactionDetail::find($transactionDetailId);

        $transactionDetail->update([
            'review' => $request->input('review'),
            'rating' => $request->input('rating'),
        ]);

        return response()->json(['message' => 'Review updated successfully']);
    }

}
