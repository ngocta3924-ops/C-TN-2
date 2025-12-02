<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\SanPham;
use App\Models\KhachHang;
use App\Models\NhanVien;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sp1 = SanPham::where('ma_san_pham', 'SP001')->first();
        $sp2 = SanPham::where('ma_san_pham', 'SP002')->first();
        $kh  = KhachHang::first();
        $nv  = NhanVien::whereHas('taiKhoan', fn($q) => $q->where('vai_tro', 'nhan_vien'))->first();

        if (!$sp1 || !$sp2 || !$kh || !$nv) return;

        DB::transaction(function () use ($sp1, $sp2, $kh, $nv) {
            $hoaDon = HoaDon::create([
                'ma_hoa_don'    => 'HD001',
                'khach_hang_id' => $kh->id,
                'nhan_vien_id'  => $nv->id,
                'ngay_lap'      => Carbon::now()->subDay(),
                'tong_tien'     => 0,
                'giam_gia'      => 0,
                'thanh_toan'    => 0,
            ]);

            $tong = 0;

            $ct1 = ChiTietHoaDon::create([
                'hoa_don_id'  => $hoaDon->id,
                'san_pham_id' => $sp1->id,
                'so_luong'    => 5,
                'don_gia_ban' => $sp1->gia_ban,
                'thanh_tien'  => 5 * $sp1->gia_ban,
            ]);
            $tong += $ct1->thanh_tien;
            $sp1->so_luong_ton -= 5; $sp1->save();

            $ct2 = ChiTietHoaDon::create([
                'hoa_don_id'  => $hoaDon->id,
                'san_pham_id' => $sp2->id,
                'so_luong'    => 2,
                'don_gia_ban' => $sp2->gia_ban,
                'thanh_tien'  => 2 * $sp2->gia_ban,
            ]);
            $tong += $ct2->thanh_tien;
            $sp2->so_luong_ton -= 2; $sp2->save();

            $hoaDon->tong_tien  = $tong;
            $hoaDon->thanh_toan = $tong;
            $hoaDon->save();
        });
    }
}
