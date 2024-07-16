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
        Schema::create('nhom_nhan_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ten_nhom');
            $table->string('cong_viec');
            $table->text('mo_ta')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('id_nhan_vien')->nullable(); // Tạo cột id_phong_ban là khóa ngoại
            $table->foreign('id_nhan_vien')->references('id')->on('nhan_viens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhom_nhan_viens');
    }
};
