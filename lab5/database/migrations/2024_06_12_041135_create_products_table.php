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
            $table->id();
            $table->string('name'); // Tên của sản phẩm
            $table->text('description')->nullable(); // Mô tả sản phẩm
            $table->decimal('price', 15, 3); // Giá của sản phẩm với 3 chữ số thập phân
            $table->string('img')->nullable(); // Hình ảnh sản phẩm
            $table->unsignedBigInteger('category_id'); // Khóa ngoại liên kết với bảng categories
            $table->unsignedBigInteger('color_id')->nullable(); // Khóa ngoại liên kết với bảng colors
            $table->unsignedBigInteger('brand_id'); // Khóa ngoại liên kết với bảng brands
            $table->timestamps();

            // Định nghĩa khóa ngoại
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
