<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuNhapHang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_phieu_nhap_hangs';

    protected $fillable = [
        'phieu_nhap_hang_id',
        'san_pham_id',
        'so_luong',
        'don_gia_nhap',
        'thanh_tien',
    ];

    public function phieuNhapHang()
    {
        return $this->belongsTo(PhieuNhapHang::class);
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
