<?php

namespace App\Http\Module\Product\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable, HasFactory, SoftDeletes;

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
        'kategori',
        'stok'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function category()
    {
        return $this->belongsTo(Categories::class, 'kategori');
    }
}
