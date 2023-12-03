<?php

namespace App\Http\Module\Transaction\Presentation\Controller;

use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Transaction\Domain\Model\Transaction;
use App\Http\Module\Transaction\Domain\Model\TransactionDetail;
use App\Http\Module\Transaction\Application\Services\UpdateTransactionStatusService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TransactionController
{
    public function __construct(
        private UpdateTransactionStatusService $update_transaction_status_service
    ) {
    }

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

        return redirect()->back()->with('status', 'Product bought successfully');
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

        return redirect()->back()->with('status', 'Review updated successfully');
    }

    public function listAdminTransactions()
    {
        $transactions = Transaction::with('details.product')->get();

        return view('admin.admin-transactions', ['transactions' => $transactions]);
    }

    public function transactionDetail($id)
    {
        $transaction = Transaction::with('details.product')->find($id);

        if (!$transaction) {
            return redirect()->back()->with('error', 'No transaction with that ID found');
        }

        return view('transaction-detail', ['transaction' => $transaction]);
    }

    public function updateStatus(Request $request, $transactionId)
    {
        Log::info($transactionId);
        $transaction = Transaction::find($transactionId);

        if (!$transaction) {
            return redirect()->route('admin.transactions')->with('error', 'No transaction with that ID found');
        }

        return $this->update_transaction_status_service->updateStatus($transaction, $request);
    }

    public function destroy($id)
    {
        try {
            $transaction = Transaction::find($id);
            $transaction->delete();

            return redirect()->back()->with('status', 'Transaction deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting transaction: ' . $e->getMessage());
        }
    }

    public function getAdminUpdateTransactionStatus($transactionId)
    {
        $transaction = Transaction::find($transactionId);
        return view('admin.update-status', compact('transaction'));
    }
}
