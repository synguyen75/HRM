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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_nhan_vien')->nullable();
            $table->string('ten_tai_khoan');
            $table->string('mat_khau');
            $table->enum('quyen_han', ['Admin', 'User']);
            $table->boolean('trang_thai')->default(1);
            $table->string('anh_dai_dien')->default('stogate/images/avatar.png');
            $table->string('email')->unique(); // Tạo cột email và đảm bảo tính duy nhất
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_nhan_vien')->references('id')->on('nhan_viens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
