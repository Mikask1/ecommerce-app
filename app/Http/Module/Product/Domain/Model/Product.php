<?php

namespace App\Http\Module\Product\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_produk',
        'gambar',
        'deskripsi',
        'rating',
        'harga',
        'kondisi',
        'kategori'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function kategori()
    {
        return $this->belongsTo(Categories::class);
    }
}
