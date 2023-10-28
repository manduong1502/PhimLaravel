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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->integer('status');
            $table->string('image');
            $table->integer('category_id');
            $table->integer('genre_id');
            $table->integer('country_id');
            $table->integer('phim_hot');
            $table->string('ngay_tao')->nullable();
            $table->string('ngay_cap_nhap')->nullable();
            $table->string('nam_phim')->nullable();
            $table->string('daodien')->nullable();
            $table->double('gia')->nullable();
            $table->string('video')->nullable();
            $table->string('thoiluong')->nullable();
            $table->date('ngaybd')->nullable();
            $table->date('ngaykt')->nullable();
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
