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
        Schema::create('ky_luats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nhan_vien')->nullable();
            $table->unsignedBigInteger('id_nguoi_thuc_hien')->nullable();
            $table->date('ngay_ky_luat');
            $table->text('noi_dung');
            $table->timestamps();

            $table->foreign('id_nhan_vien')->references('id')->on('nhan_viens')->onDelete('set null');
            $table->foreign('id_nguoi_thuc_hien')->references('id')->on('nhan_viens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ky_luats');
    }
};
