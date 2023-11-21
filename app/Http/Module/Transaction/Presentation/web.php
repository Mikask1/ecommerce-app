<?php

use App\Http\Module\Transaction\Presentation\Controller\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('create_transaction', [TransactionController::class, 'createTransaction'])->middleware(['auth', 'verified']);

Route::get('transactions', [TransactionController::class, 'listTransactions'])->middleware(['auth', 'verified'])->name('transactions');

Route::patch('update_review', [TransactionController::class, 'updateReview'])->middleware(['auth', 'verified']);

Route::patch('/transactions/{transactionId}/update-status', [TransactionController::class, 'updateStatus'])->middleware(['auth', 'verified']);