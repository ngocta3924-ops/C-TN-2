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
        Schema::create('nha_cung_caps', function (Blueprint $table) {
            $table->id();
            $table->string('ma_nha_cung_cap')->unique();
            $table->string('ten_nha_cung_cap');
            $table->string('dia_chi')->nullable();
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_cung_caps');
    }
};
