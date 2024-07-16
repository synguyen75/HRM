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
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id(); // Tạo cột id là khóa chính
            $table->string('ho_ten'); // Tạo cột tên
            $table->enum('bang_cap', ['THCS', 'THPT', 'Cao Đẳng', 'Đại Học', 'Thạc Sĩ']); // Tạo cột bằng cấp
            $table->string('so_dien_thoai'); // Tạo cột số điện thoại
            $table->string('dia_chi'); // Tạo cột địa chỉ
            $table->unsignedBigInteger('id_phong_ban')->nullable(); // Tạo cột id_phong_ban là khóa ngoại
            $table->unsignedBigInteger('id_chuc_vus')->nullable(); // Tạo cột id_phong_ban là khóa ngoại
            $table->boolean('trang_thai')->default(1);
            $table->timestamps(); // Tạo cột created_at và updated_at

            // Thiết lập khóa ngoại
            $table->foreign('id_chuc_vus')->references('id')->on('chuc_vus')->onDelete('set null');
            $table->foreign('id_phong_ban')->references('id')->on('phong_bans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
