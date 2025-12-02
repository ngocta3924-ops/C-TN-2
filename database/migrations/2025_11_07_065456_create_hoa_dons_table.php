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
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->string('ma_hoa_don')->unique();
            $table->foreignId('khach_hang_id')
                  ->nullable()->constrained('khach_hangs')->nullOnDelete();
            $table->foreignId('nhan_vien_id')
                  ->constrained('nhan_viens')->cascadeOnDelete();
            $table->dateTime('ngay_lap');
            $table->decimal('tong_tien', 15, 2);
            $table->decimal('giam_gia', 15, 2)->default(0);
            $table->decimal('thanh_toan', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoa_dons');
    }
};
