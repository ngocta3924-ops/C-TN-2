<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\KhachHang;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KhachHang::create([
            'ma_khach_hang'   => 'KH001',
            'ten_khach_hang'  => 'Nguyễn Văn A',
            'so_dien_thoai'   => '0909000003',
        ]);

        KhachHang::create([
            'ma_khach_hang'   => 'KH002',
            'ten_khach_hang'  => 'Trần Thị B',
        ]);
    }
}
