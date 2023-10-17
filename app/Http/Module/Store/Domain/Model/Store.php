<?php

namespace App\Http\Module\Store\Domain\Model;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Store
{
    /**
     * @param string $nama
     * @param int $type
     * @param string $description
     * @param float $rating
     */
    public function __construct(
        public string $nama,
        public string $type,
        public string $description,
        public float $rating,
    )
    {
    }
}
