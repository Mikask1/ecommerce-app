<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Module\Product\Domain\Model\Product;

class UpdateStock extends Command
{
    protected $signature = 'update:stock';
    protected $description = 'Update stock for products if less than 100 based on rating';

    public function handle()
    {
        Product::where('stok', '<', 100)
            ->where('rating', '>=', 4)
            ->update(['stok' => \DB::raw('stok + 10')]);

        Product::where('stok', '<', 100)
            ->where('rating', '>', 3)
            ->where('rating', '<', 4)
            ->update(['stok' => \DB::raw('stok + 5')]);

        Product::where('stok', '<', 100)
            ->where('rating', '<=', 3)
            ->update(['stok' => \DB::raw('stok + 2')]);

        $this->info('Stock updated successfully!');
    }
}

