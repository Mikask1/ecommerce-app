<?php

namespace Database\Seeders;

use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Transaction\Domain\Model\Transaction;
use App\Http\Module\Transaction\Domain\Model\TransactionDetail;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['nama_kategori' => 'Electronics', 'slug' => 'electronics'],
            ['nama_kategori' => 'Fashion', 'slug' => 'fashion'],
            ['nama_kategori' => 'Home & Furniture', 'slug' => 'home-furniture'],
            ['nama_kategori' => 'Beauty & Personal Care', 'slug' => 'beauty-personal-care'],
            ['nama_kategori' => 'Sports & Outdoors', 'slug' => 'sports-outdoors'],
            ['nama_kategori' => 'Books', 'slug' => 'books'],
            ['nama_kategori' => 'Health & Wellness', 'slug' => 'health-wellness'],
        ]);
        Product::factory(20)->create();

        User::factory(10)->create()->each(function (User $user) {
            // Seed transactions for each user
            Transaction::factory(10)->create(['user_id' => $user->id])->each(function ($transaction) {
                // Seed transaction details for each transaction
                TransactionDetail::factory(rand(2, 10))->create([
                    'transaction_id' => $transaction->id,
                ]);
            });
        });
    }
}
