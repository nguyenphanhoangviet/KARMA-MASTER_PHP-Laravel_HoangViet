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
    $table->unsignedBigInteger('order_id');
    $table->unsignedBigInteger('product_id'); // Ensure this matches the column in the products table
    $table->string('product_name');
    $table->integer('quantity');
    $table->decimal('price', 10, 2);
    $table->string('image', 255)->nullable();
    $table->string('size', 100)->nullable();
    $table->timestamps();

    // Add foreign key constraints
    $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
