<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('luongs', function (Blueprint $table) {
            $table->id();
            $table->float('muc_luong_theo_ngay');
            $table->decimal('muc_luong', 10, 2);
            $table->integer('ngay_cong');
            $table->date('ngay_hieu_luc');
            $table->timestamps();
            $table->unsignedBigInteger('id_nhan_vien');
            $table->foreign('id_nhan_vien')->references('id')->on('nhan_viens')->onDelete('cascade');
        });
        DB::table('luongs')->update([
            'muc_luong' => DB::raw('muc_luong_theo_ngay * ngay_cong')
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luongs');
    }
};
