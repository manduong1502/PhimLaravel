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
        Schema::create('phim', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mota')->nullable();
            $table->string('daodien');
            $table->double('gia');
            $table->string('anh')->nullable();
            $table->string('video')->nullable();
            $table->string('thoiluong');
            $table->date('ngaybd');
            $table->date('ngaykt');
            $table->string('quocgia');
            $table->string('hangphim');
            $table->string('phienban');
            $table->string('theloai');
            $table->string('trangthai');
            $table->timestamps();
            $table->integer('luotxem');
            $table->integer('danhgia');
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
