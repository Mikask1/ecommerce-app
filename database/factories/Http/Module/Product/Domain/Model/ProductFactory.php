<?php

namespace Database\Factories\Http\Module\Product\Domain\Model;

use App\Http\Module\Product\Domain\Model\Categories;
use App\Http\Module\Product\Domain\Model\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Http\Module\Product\Domain\Model\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_produk' => fake()->text(10),
            'gambar' => '/images/sample.jpg',
            'deskripsi' => fake()->realText(),
            'rating' => fake()->randomFloat(2, 0, 5),
            'harga' => fake()->numberBetween(0, 100000000),
            'kondisi' => fake()->randomElement(['Baru', 'Bekas']),
            'kategori' => fake()->randomElement(Categories::all())['nama_kategori'],
        ];
    }
}
