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
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_khach_hang')->unique();
            $table->string('ten_khach_hang');
            $table->string('dia_chi')->nullable();
            $table->string('can_cuoc', 20)->nullable();
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('ma_khuyen_mai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khach_hangs');
    }
};
