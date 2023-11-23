<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Module\Product\Domain\Model\Product;

class TambahStokProduk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * 
     * @var string
     */
    protected $signature = 'stok:tambah';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menambahkan stok produk setiap hari Rabu jam 10 pagi';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::where('kondisi', 'baru')->get();

        foreach ($products as $product) {
            $rating = $product->rating;
            
            // Tambah stok berdasarkan rating
            if ($rating >= 4) {
                $product->stok += 20;
            } elseif ($rating >= 3) {
                $product->stok += 15;
            } else {
                $product->stok += 10;
            }

            // Simpan perubahan stok ke dalam database
            $product->save();
        }

        $this->info('Stok produk baru telah ditambahkan.');
    }
}
