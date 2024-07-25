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
        Schema::create('thanh_viens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('phan_viec');
            $table->unsignedBigInteger('nhan_vien_id')->nullable();
            $table->unsignedBigInteger('nhom_nhan_vien_id')->nullable(); // Tạo cột id_phong_ban là khóa ngoại
            $table->foreign('nhan_vien_id')->references('id')->on('nhan_viens')->onDelete('set null');
            $table->foreign('nhom_nhan_vien_id')->references('id')->on('nhom_nhan_viens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_viens');
    }
};
