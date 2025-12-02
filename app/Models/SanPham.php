<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';

    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'loai_san_pham',
        'xuat_xu',
        'mo_ta',
        'nha_cung_cap_id',
        'don_vi_tinh',
        'so_luong_ton',
        'gia_nhap',
        'gia_ban',
        'han_su_dung',
        'dang_ban',
    ];

    public function nhaCungCap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }

    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDon::class);
    }

    public function chiTietPhieuNhapHangs()
    {
        return $this->hasMany(ChiTietPhieuNhapHang::class);
    }
}
