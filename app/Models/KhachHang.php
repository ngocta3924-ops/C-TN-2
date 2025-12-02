<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table = 'khach_hangs';

    protected $fillable = [
        'ma_khach_hang',
        'ten_khach_hang',
        'dia_chi',
        'can_cuoc',
        'so_dien_thoai',
        'email',
        'ma_khuyen_mai',
    ];

    public function hoaDons()
    {
        return $this->hasMany(HoaDon::class);
    }
}
