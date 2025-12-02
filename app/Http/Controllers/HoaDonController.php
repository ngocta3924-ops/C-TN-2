<?php

namespace App\Http\Controllers;

use App\Models\{HoaDon, ChiTietHoaDon, SanPham, KhachHang, NhanVien};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoaDonController extends Controller
{
    public function index()
    {
        $hoaDons = HoaDon::with('khachHang', 'nhanVien')
            ->orderByDesc('ngay_lap')
            ->paginate(20);

        return view('hoa_dons.index', compact('hoaDons'));
    }

    public function create()
    {
        $sanPhams = SanPham::where('dang_ban', true)->get();
        $khachHangs = KhachHang::all();
        $nhanViens = NhanVien::all();

        return view('hoa_dons.create', compact('sanPhams', 'khachHangs', 'nhanViens'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_hoa_don'      => 'required|unique:hoa_dons,ma_hoa_don',
            'khach_hang_id'   => 'nullable|exists:khach_hangs,id',
            'nhan_vien_id'    => 'required|exists:nhan_viens,id',
            'ngay_lap'        => 'required|date',
            'san_pham_id'     => 'required|array|min:1',
            'san_pham_id.*'   => 'required|exists:san_phams,id',
            'so_luong.*'      => 'required|integer|min:1',
            'don_gia_ban.*'   => 'required|numeric|min:0',
            'giam_gia'        => 'nullable|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $tongTien = 0;

            // kiểm tra tồn kho
            foreach ($request->san_pham_id as $index => $sanPhamId) {
                $soLuong = (int)$request->so_luong[$index];
                $sanPham = SanPham::findOrFail($sanPhamId);
                if ($sanPham->so_luong_ton < $soLuong) {
                    throw new \Exception("Sản phẩm {$sanPham->ten_san_pham} không đủ tồn kho");
                }
            }

            $hoaDon = HoaDon::create([
                'ma_hoa_don'    => $request->ma_hoa_don,
                'khach_hang_id' => $request->khach_hang_id,
                'nhan_vien_id'  => $request->nhan_vien_id,
                'ngay_lap'      => $request->ngay_lap,
                'tong_tien'     => 0,
                'giam_gia'      => $request->giam_gia ?? 0,
                'thanh_toan'    => 0,
            ]);

            foreach ($request->san_pham_id as $index => $sanPhamId) {
                $soLuong = (int)$request->so_luong[$index];
                $donGia  = (float)$request->don_gia_ban[$index];
                $thanhTien = $soLuong * $donGia;
                $tongTien += $thanhTien;

                ChiTietHoaDon::create([
                    'hoa_don_id'   => $hoaDon->id,
                    'san_pham_id'  => $sanPhamId,
                    'so_luong'     => $soLuong,
                    'don_gia_ban'  => $donGia,
                    'thanh_tien'   => $thanhTien,
                ]);

                $sanPham = SanPham::findOrFail($sanPhamId);
                $sanPham->so_luong_ton -= $soLuong;
                $sanPham->save();
            }

            $hoaDon->tong_tien = $tongTien;
            $hoaDon->thanh_toan = max($tongTien - $hoaDon->giam_gia, 0);
            $hoaDon->save();
        });

        return redirect()->route('hoa_dons.index');
    }

    public function show(HoaDon $hoaDon)
    {
        $hoaDon->load('khachHang', 'nhanVien', 'chiTietHoaDons.sanPham');
        return view('hoa_dons.show', compact('hoaDon'));
    }
}
