<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TaiKhoanSeeder::class,
            NhanVienSeeder::class,
            NhaCungCapSeeder::class,
            KhoSeeder::class,
            SanPhamSeeder::class,
            KhachHangSeeder::class,
            KhuyenMaiSeeder::class,
            PhieuNhapHangSeeder::class,
            HoaDonSeeder::class,
        ]);
    }
}
