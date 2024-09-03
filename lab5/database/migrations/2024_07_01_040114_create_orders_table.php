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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->text('cart_data');
            $table->decimal('shipping_fee', 10, 2);
            $table->string('address');
            $table->string('province');
            $table->string('district');
            $table->string('ward');
            $table->string('street');
            $table->string('phone'); // Thêm cột phone vào đây
            $table->string('payment_method')->nullable(); // Thêm cột payment_method vào đây
            $table->decimal('total', 10, 2);
            $table->string('payment_status')->default('Chưa Thanh Toán'); // Thêm cột payment_status
            $table->timestamps();

            // Định nghĩa khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
