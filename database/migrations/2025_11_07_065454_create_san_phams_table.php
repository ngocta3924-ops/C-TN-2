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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ma_san_pham')->unique();
            $table->string('ten_san_pham');
            $table->string('loai_san_pham')->nullable();
            $table->string('xuat_xu')->nullable();
            $table->text('mo_ta')->nullable();
            $table->foreignId('nha_cung_cap_id')
                  ->nullable()->constrained('nha_cung_caps')->nullOnDelete();
            $table->string('don_vi_tinh')->default('cai');
            $table->integer('so_luong_ton')->default(0);
            $table->decimal('gia_nhap', 15, 2)->default(0);
            $table->decimal('gia_ban', 15, 2)->default(0);
            $table->date('han_su_dung')->nullable();
            $table->boolean('dang_ban')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
