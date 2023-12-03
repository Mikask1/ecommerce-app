<?php

use App\Http\Module\Transaction\Presentation\Controller\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('create_transaction', [TransactionController::class, 'createTransaction'])->middleware(['auth', 'verified']);

Route::get('transactions', [TransactionController::class, 'listTransactions'])->middleware(['auth', 'verified'])->name('transactions');

Route::get('transactions/{id}', [TransactionController::class, 'transactionDetail'])->middleware(['auth', 'verified']);

Route::patch('update_review', [TransactionController::class, 'updateReview'])->middleware(['auth', 'verified']);

Route::patch('transactions/{transactionId}/update-status', [TransactionController::class, 'updateStatus'])->middleware(['auth', 'verified'])->name('transactions.update-status');

Route::get('admin/transactions', [TransactionController::class, 'listAdminTransactions'])->middleware(['auth', 'verified'])->name('admin.transactions');

Route::delete('admin/transaction/delete/{id}', [TransactionController::class, 'destroy'])->middleware(['auth', 'verified'])->name('admin.transaction.delete');

Route::get('admin/transaction/update-status/{transactionId}', [TransactionController::class, 'getAdminUpdateTransactionStatus'])->middleware(['auth', 'verified'])->name('admin.transaction.update-status');

