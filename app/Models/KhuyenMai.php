<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $table = 'khuyen_mais';

    protected $fillable = [
        'ma_khuyen_mai',
        'ten_khuyen_mai',
        'muc_khuyen_mai',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'dang_ap_dung',
    ];
}
