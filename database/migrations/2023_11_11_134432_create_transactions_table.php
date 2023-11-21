<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('total_harga');
            $table->enum('metode_bayar', ['QRIS', 'BANK', 'COD', 'PayLater']);
            $table->enum('status', ['PACKING', 'DELIVERED', 'ARRIVED'])->default('PACKING');
            $table->dateTime('tanggal_pengemasan')->nullable();
            $table->dateTime('tanggal_pengiriman')->nullable();
            $table->dateTime('tanggal_sampai')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
