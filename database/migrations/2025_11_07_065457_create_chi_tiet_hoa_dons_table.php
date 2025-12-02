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
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hoa_don_id')
                  ->constrained('hoa_dons')->cascadeOnDelete();
            $table->foreignId('san_pham_id')
                  ->constrained('san_phams')->restrictOnDelete();
            $table->integer('so_luong');
            $table->decimal('don_gia_ban', 15, 2);
            $table->decimal('thanh_tien', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
};
