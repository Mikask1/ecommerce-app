<?php

namespace App\Http\Module\Transaction\Application\Services;

use App\Http\Module\Transaction\Domain\Model\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UpdateTransactionStatusService
{
    public function updateStatus(Transaction $transaction, Request $request)
    {
        $status = $request->input('status');
        $date = $request->input('date', null);

        if ($status === 'PACKING') {
            return $this->updatePacking($transaction, $date);
        } elseif ($status === 'DELIVERING') {
            return $this->updateDELIVERING($transaction, $date);
        } elseif ($status === 'ARRIVED') {
            return $this->updateArrived($transaction, $date);
        } else {
            return redirect()->route('admin.transactions')->with('error', 'Invalid status provided');
        }
    }
    private function updateDELIVERING(Transaction $transaction, $date = null)
    {
        $transaction->status = 'DELIVERING';
        $transaction->tanggal_pengiriman = $date ?? Carbon::now();
        $transaction->save();

        return redirect()->route('admin.transactions')->with('status', 'Status updated to DELIVERING');
    }

    private function updateArrived(Transaction $transaction, $date = null)
    {
        $transaction->status = 'ARRIVED';
        $transaction->tanggal_sampai = $date ?? Carbon::now();
        $transaction->save();

        return redirect()->route('admin.transactions')->with('status', 'Status updated to ARRIVED');
    }

    private function updatePacking(Transaction $transaction, $date = null)
    {
        $transaction->status = 'PACKING';
        $transaction->tanggal_pengemasan = $date ?? Carbon::now();
        $transaction->save();

        return redirect()->route('admin.transactions')->with('status', 'Status updated to PACKING');
    }
}
