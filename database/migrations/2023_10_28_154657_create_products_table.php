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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('gambar');
            $table->string('deskripsi');
            $table->decimal('rating', 12, 2);
            $table->decimal('harga', 12, 0);
            $table->enum('kondisi', ['Baru', 'Bekas',])->default('Baru');
            $table->integer('stok')->default(0);
            $table->string('kategori');
            $table->foreign('kategori')->references('nama_kategori')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
