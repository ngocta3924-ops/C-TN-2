<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\PhieuNhapHangController;
use App\Http\Controllers\HoaDonController;
use App\Http\Controllers\KhoController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\NhanVienController;

// Trang chủ -> nếu chưa đăng nhập thì về login
Route::get('/', function () {
    return redirect()->route('dang_nhap.form');
});

// Đăng nhập / đăng xuất
Route::get('/dang-nhap', [DangNhapController::class, 'showLoginForm'])->name('dang_nhap.form');
Route::post('/dang-nhap', [DangNhapController::class, 'login'])->name('dang_nhap.submit');
Route::post('/dang-xuat', [DangNhapController::class, 'logout'])->name('dang_xuat');

// Nhóm cần đăng nhập
Route::middleware('auth.tai_khoan')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('san_phams', SanPhamController::class);
    Route::resource('khach_hangs', KhachHangController::class);
    Route::resource('nha_cung_caps', NhaCungCapController::class);
    Route::resource('nhan_viens', NhanVienController::class)->except(['show']);
    Route::resource('khos', KhoController::class)->except(['show']);
    Route::resource('khuyen_mais', KhuyenMaiController::class)->except(['show']);

    // Phiếu nhập hàng
    Route::get('phieu_nhap_hangs', [PhieuNhapHangController::class, 'index'])->name('phieu_nhap_hangs.index');
    Route::get('phieu_nhap_hangs/create', [PhieuNhapHangController::class, 'create'])->name('phieu_nhap_hangs.create');
    Route::post('phieu_nhap_hangs', [PhieuNhapHangController::class, 'store'])->name('phieu_nhap_hangs.store');

    // Hóa đơn bán hàng
    Route::get('hoa_dons', [HoaDonController::class, 'index'])->name('hoa_dons.index');
    Route::get('hoa_dons/create', [HoaDonController::class, 'create'])->name('hoa_dons.create');
    Route::post('hoa_dons', [HoaDonController::class, 'store'])->name('hoa_dons.store');
    Route::get('hoa_dons/{hoaDon}', [HoaDonController::class, 'show'])->name('hoa_dons.show');
});
