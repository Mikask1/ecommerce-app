<?php

namespace Database\Factories\Http\Module\Transaction\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Module\Product\Domain\Model\Product;
use App\Http\Module\Transaction\Domain\Model\Transaction;
use App\Http\Module\Transaction\Domain\Model\TransactionDetail;

class TransactionDetailFactory extends Factory
{
    protected $model = TransactionDetail::class;

    public function definition()
    {
        return [
            'rating' => $this->faker->randomFloat(2, 1, 5),
            'review' => $this->faker->text,
            'kuantitas' => $this->faker->numberBetween(1, 10),
            'produk_id' => Product::inRandomOrder()->first()->id,
            'transaction_id' => Transaction::inRandomOrder()->first()->id,
        ];
    }
}
