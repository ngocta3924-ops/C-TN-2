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
        Schema::create('chi_tiet_phieu_nhap_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phieu_nhap_hang_id')
                  ->constrained('phieu_nhap_hangs')->cascadeOnDelete();
            $table->foreignId('san_pham_id')
                  ->constrained('san_phams')->restrictOnDelete();
            $table->integer('so_luong');
            $table->decimal('don_gia_nhap', 15, 2);
            $table->decimal('thanh_tien', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phieu_nhap_hangs');
    }
};
