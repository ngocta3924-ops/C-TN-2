<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'tai_khoans';

    protected $fillable = [
        'ten_dang_nhap',
        'mat_khau',
        'vai_tro',
        'trang_thai',
    ];

    protected $hidden = ['mat_khau'];

    public function nhanVien()
    {
        return $this->hasOne(NhanVien::class);
    }
}
