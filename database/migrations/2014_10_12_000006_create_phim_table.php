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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('status');
            $table->string('daodien')->nullable();
            $table->double('gia')->nullable();
            $table->string('anh')->nullable();
            $table->string('video')->nullable();
            $table->string('thoiluong')->nullable();
            $table->date('ngaybd')->nullable();
            $table->date('ngaykt')->nullable();
            $table->string('quocgia')->nullable();
            $table->string('hangphim')->nullable();
            $table->string('phienban')->nullable();
            $table->string('theloai')->nullable();
            $table->string('trangthai')->nullable();
            $table->timestamps();
            $table->integer('luotxem')->nullable();
            $table->integer('danhgia')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phim');
    }
};
