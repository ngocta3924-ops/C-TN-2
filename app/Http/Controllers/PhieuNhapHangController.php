<?php

namespace App\Http\Controllers;

use App\Models\{PhieuNhapHang, ChiTietPhieuNhapHang, SanPham,
NhaCungCap, Kho , NhanVien};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhieuNhapHangController extends Controller
{
    public function index()
    {
        $phieuNhaps = PhieuNhapHang::with('nhaCungCap', 'nhanVien')
            ->orderByDesc('ngay_nhap')
            ->paginate(20);

        return view('phieu_nhap_hangs.index', compact('phieuNhaps'));
    }

    public function create()
    {
        $nhaCungCaps = NhaCungCap::all();
        $sanPhams = SanPham::all();
        $khos = Kho::all();
        $nhanViens = NhanVien::all();

        return view('phieu_nhap_hangs.create', compact(
            'nhaCungCaps', 'sanPhams', 'khos', 'nhanViens'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_phieu_nhap'   => 'required|unique:phieu_nhap_hangs,ma_phieu_nhap',
            'nha_cung_cap_id' => 'required|exists:nha_cung_caps,id',
            'nhan_vien_id'    => 'required|exists:nhan_viens,id',
            'kho_id'          => 'nullable|exists:khos,id',
            'ngay_nhap'       => 'required|date',
            'san_pham_id'     => 'required|array|min:1',
            'san_pham_id.*'   => 'required|exists:san_phams,id',
            'so_luong.*'      => 'required|integer|min:1',
            'don_gia_nhap.*'  => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $tongTien = 0;

            $phieuNhap = PhieuNhapHang::create([
                'ma_phieu_nhap'   => $request->ma_phieu_nhap,
                'nha_cung_cap_id' => $request->nha_cung_cap_id,
                'nhan_vien_id'    => $request->nhan_vien_id,
                'kho_id'          => $request->kho_id,
                'ngay_nhap'       => $request->ngay_nhap,
                'tong_tien'       => 0, // cập nhật sau
            ]);

            foreach ($request->san_pham_id as $index => $sanPhamId) {
                $soLuong = (int)$request->so_luong[$index];
                $donGia  = (float)$request->don_gia_nhap[$index];
                $thanhTien = $soLuong * $donGia;
                $tongTien += $thanhTien;

                ChiTietPhieuNhapHang::create([
                    'phieu_nhap_hang_id' => $phieuNhap->id,
                    'san_pham_id'        => $sanPhamId,
                    'so_luong'           => $soLuong,
                    'don_gia_nhap'       => $donGia,
                    'thanh_tien'         => $thanhTien,
                ]);

                // Cập nhật tồn kho sản phẩm
                $sanPham = SanPham::findOrFail($sanPhamId);
                $sanPham->so_luong_ton += $soLuong;
                $sanPham->gia_nhap = $donGia; // optional
                $sanPham->save();
            }

            $phieuNhap->tong_tien = $tongTien;
            $phieuNhap->save();
        });

        return redirect()->route('phieu_nhap_hangs.index');
    }
}
