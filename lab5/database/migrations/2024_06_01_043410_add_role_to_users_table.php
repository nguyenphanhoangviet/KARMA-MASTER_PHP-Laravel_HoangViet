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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Liên kết với bảng orders
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Liên kết với bảng products
            $table->integer('quantity'); // Số lượng sản phẩm
            $table->decimal('price', 15, 3); // Giá của sản phẩm với 3 chữ số thập phân
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
