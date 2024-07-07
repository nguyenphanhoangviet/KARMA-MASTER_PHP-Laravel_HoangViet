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
        Schema::create('loai', function (Blueprint $table) {

            $table->id();
            
            $table->string('ten_loai');
            
            $table->integer('thu_tu')->default(0);
            
            $table->boolean('an_hien')->default(0);
            
            $table->timestamps();
            
            });
            
            Schema::create('san_pham', function (Blueprint $table) {
            
            $table->id();
            
            $table->string('ten_sp');
            
            $table->integer('gia');
            
            $table->integer('id_loai');
            
            $table->timestamps();
            
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loai');

Schema::dropIfExists('san_pham');
    }
};
