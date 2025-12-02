<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    use HasFactory;
    protected $table = 'nha_cung_caps';

    protected $fillable = [
        'ma_nha_cung_cap',
        'ten_nha_cung_cap',
        'dia_chi',
        'so_dien_thoai',
        'email',
    ];

    public function sanPhams()
    {
        return $this->hasMany(SanPham::class);
    }

    public function phieuNhapHangs()
    {
        return $this->hasMany(PhieuNhapHang::class);
    }
}
