<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id')->primaryKey(); // Membuat Primary Key product_id
            $table->unsignedBigInteger('category_id'); // Menyiapkan kolom Foreign Key

            // Membuat relasi Foreign Key ke tabel categories
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');

            $table->string('product_name'); // Kolom nama produk
            $table->integer('product_price'); // Kolom harga
            $table->integer('product_stock'); // Kolom stok
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
