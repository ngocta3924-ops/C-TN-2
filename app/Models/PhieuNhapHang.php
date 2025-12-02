<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuNhapHang extends Model
{
    use HasFactory;
    protected $table = 'phieu_nhap_hangs';

    protected $fillable = [
        'ma_phieu_nhap',
        'nha_cung_cap_id',
        'nhan_vien_id',
        'kho_id',
        'ngay_nhap',
        'tong_tien',
    ];

    protected $dates = ['ngay_nhap'];

    public function nhaCungCap()
    {
        return $this->belongsTo(NhaCungCap::class);
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class);
    }

    public function kho()
    {
        return $this->belongsTo(Kho::class);
    }

    public function chiTietPhieuNhapHangs()
    {
        return $this->hasMany(ChiTietPhieuNhapHang::class);
    }
}
