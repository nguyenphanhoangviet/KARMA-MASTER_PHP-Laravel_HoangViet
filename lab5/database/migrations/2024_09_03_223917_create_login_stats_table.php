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
        Schema::create('login_stats', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique(); // Ngày
            $table->integer('login_count')->default(0); // Số lượng đăng nhập trong ngày
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_stats');
    }
};
