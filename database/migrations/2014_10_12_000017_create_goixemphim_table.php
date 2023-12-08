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
        Schema::create('goixemphim', function (Blueprint $table) {
            $table->id();
            $table->integer('thoiluong');
            $table->double('tonggia');
            $table->date('ngay');
            $table->integer('gio');
            $table->integer('phut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goixemphim');
    }
};
