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
        Schema::create('phieu_nhap_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phieu_nhap')->unique();
            $table->foreignId('nha_cung_cap_id')
                  ->constrained('nha_cung_caps')->cascadeOnDelete();
            $table->foreignId('nhan_vien_id')
                  ->constrained('nhan_viens')->cascadeOnDelete();
            $table->foreignId('kho_id')
                  ->nullable()->constrained('khos')->nullOnDelete();
            $table->dateTime('ngay_nhap');
            $table->decimal('tong_tien', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_nhap_hangs');
    }
};
