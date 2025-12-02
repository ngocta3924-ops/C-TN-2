<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhan_viens';

    protected $fillable = [
        'tai_khoan_id',
        'ma_nhan_vien',
        'ten_nhan_vien',
        'can_cuoc',
        'so_dien_thoai',
        'email',
        'dia_chi',
        'ngay_sinh',
        'gioi_tinh',
        'chuc_vu',
        'luong_co_ban',
    ];

    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class);
    }

    public function hoaDons()
    {
        return $this->hasMany(HoaDon::class);
    }
    
    public function phieuNhapHangs()
    {
        return $this->hasMany(PhieuNhapHang::class);
    }
}
