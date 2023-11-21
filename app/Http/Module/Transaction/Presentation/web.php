<?php

use App\Http\Module\Transaction\Presentation\Controller\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('create_transaction', [TransactionController::class, 'createTransaction'])->middleware(['auth', 'verified']);

Route::get('transactions', [TransactionController::class, 'listTransactions'])->middleware(['auth', 'verified'])->name('transactions');