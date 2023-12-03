<?php

namespace App\Http\Module\Transaction\Application\Services;

use App\Http\Module\Transaction\Domain\Model\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateTransactionStatusService
{
    public function updateStatus(Transaction $transaction, Request $request)
    {
        switch ($request->input('status')) {
            case 'PACKING':
                return $this->updatePacking($transaction, $request->input('date', null));
            case 'DELIVERED':
                return $this->updateDelivered($transaction, $request->input('date', null));
            case 'ARRIVED':
                return $this->updateArrived($transaction, $request->input('date', null));
            default:
                return redirect()->back()->with('error', 'Invalid status provided');
        }
    }
    private function updateDelivered(Transaction $transaction, $date = null)
    {
        $transaction->status = 'DELIVERED';
        $transaction->tanggal_pengiriman = $date ?? Carbon::now();
        $transaction->save();

        return redirect()->back()->with('status', 'Status updated to DELIVERED');
    }

    private function updateArrived(Transaction $transaction, $date = null)
    {
        $transaction->status = 'ARRIVED';
        $transaction->tanggal_sampai = $date ?? Carbon::now();
        $transaction->save();

        return redirect()->back()->with('status', 'Status updated to ARRIVED');
    }

    private function updatePacking(Transaction $transaction, $date = null)
    {
        $transaction->status = 'PACKING';
        $transaction->tanggal_pengemasan = $date ?? Carbon::now();
        $transaction->save();

        return redirect()->back()->with('status', 'Status updated to PACKING');
    }
}
