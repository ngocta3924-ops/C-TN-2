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
            $table->id();
            $table->foreignId('tai_khoan_id')->nullable()
                  ->constrained('tai_khoans')->nullOnDelete();
            $table->string('ma_nhan_vien')->unique();
            $table->string('ten_nhan_vien');
            $table->string('can_cuoc', 20)->nullable();
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('dia_chi')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->string('gioi_tinh', 10)->nullable();
            $table->string('chuc_vu')->nullable();
            $table->decimal('luong_co_ban', 15, 2)->nullable();
            $table->timestamps();
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
