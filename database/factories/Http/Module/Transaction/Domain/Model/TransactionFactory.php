<?php

namespace Database\Factories\Http\Module\Transaction\Domain\Model;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Http\Module\Transaction\Domain\Model\Transaction;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'total_harga' => $this->faker->numberBetween(100, 10000),
            'metode_bayar' => $this->faker->randomElement(['QRIS', 'BANK', 'COD', 'PayLater']),
            'status' => $this->faker->randomElement(['PACKING', 'DELIVERED', 'ARRIVED']),
            'tanggal_pengemasan' => $this->faker->dateTimeBetween('now', '+1 week'),
            'tanggal_pengiriman' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'tanggal_sampai' => $this->faker->dateTimeBetween('+2 weeks', '+3 weeks'),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
