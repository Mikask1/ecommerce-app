<?php

namespace App\Http\Module\Transaction\Domain\Model;

use App\Http\Module\Product\Domain\Model\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TransactionDetail extends Model
{
    use Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'review',
        'rating',
        'kuantitas',
        'produk_id',
        'transaction_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
