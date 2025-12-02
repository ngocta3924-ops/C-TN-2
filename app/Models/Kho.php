<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    use HasFactory;
    protected $table = 'khos';

    protected $fillable = [
        'ten_kho',
        'dia_chi',
    ];

    public function phieuNhapHangs()
    {
        return $this->hasMany(PhieuNhapHang::class);
    }
}
