<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_hoa_dons';

    protected $fillable = [
        'hoa_don_id',
        'san_pham_id',
        'so_luong',
        'don_gia_ban',
        'thanh_tien',
    ];

    public function hoaDon()
    {
        return $this->belongsTo(HoaDon::class);
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class);
    }
}
