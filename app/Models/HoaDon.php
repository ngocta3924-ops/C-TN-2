<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoa_dons';

    protected $fillable = [
        'ma_hoa_don',
        'khach_hang_id',
        'nhan_vien_id',
        'ngay_lap',
        'tong_tien',
        'giam_gia',
        'thanh_toan',
    ];

    protected $dates = ['ngay_lap'];

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class);
    }

    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class);
    }

    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDon::class);
    }
}
