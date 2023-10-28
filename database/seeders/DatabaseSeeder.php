<?php

namespace Database\Seeders;

use App\Http\Module\Product\Domain\Model\Product;
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
        User::factory(10)->create();
        DB::table('categories')->insert([
            ['nama_kategori' => 'Electronics'],
            ['nama_kategori' => 'Fashion'],
            ['nama_kategori' => 'Home & Furniture'],
            ['nama_kategori' => 'Beauty & Personal Care'],
            ['nama_kategori' => 'Sports & Outdoors'],
            ['nama_kategori' => 'Books'],
            ['nama_kategori' => 'Health & Wellness'],
        ]);
        Product::factory(20)->create();
    }
}
