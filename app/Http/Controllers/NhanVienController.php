<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NhanVienController extends Controller
{
    public function index()
    {
        $nhanViens = NhanVien::with('taiKhoan')->paginate(20);
        return view('nhan_viens.index', compact('nhanViens'));
    }

    public function create()
    {
        return view('nhan_viens.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_nhan_vien' => 'required|unique:nhan_viens,ma_nhan_vien',
            'ten_nhan_vien' => 'required',
            'ten_dang_nhap' => 'required|unique:tai_khoans,ten_dang_nhap',
            'mat_khau' => 'required|min:4',
            'vai_tro' => 'required|in:quan_ly,nhan_vien',
        ]);

        $tk = TaiKhoan::create([
            'ten_dang_nhap' => $data['ten_dang_nhap'],
            'mat_khau' => Hash::make($data['mat_khau']),
            'vai_tro' => $data['vai_tro'],
            'trang_thai' => true,
        ]);

        NhanVien::create([
            'tai_khoan_id' => $tk->id,
            'ma_nhan_vien' => $data['ma_nhan_vien'],
            'ten_nhan_vien' => $data['ten_nhan_vien'],
        ]);

        return redirect()->route('nhan_viens.index');
    }

    public function edit(NhanVien $nhan_vien)
    {
        return view('nhan_viens.edit', ['nhanVien' => $nhan_vien]);
    }

    public function update(Request $request, NhanVien $nhan_vien)
    {
        $data = $request->validate([
            'ten_nhan_vien' => 'required',
            'chuc_vu' => 'nullable',
        ]);

        $nhan_vien->update($data);
        return redirect()->route('nhan_viens.index');
    }

    public function destroy(NhanVien $nhan_vien)
    {
        if ($nhan_vien->taiKhoan) {
            $nhan_vien->taiKhoan->delete();
        }
        $nhan_vien->delete();
        return redirect()->route('nhan_viens.index');
    }
}
