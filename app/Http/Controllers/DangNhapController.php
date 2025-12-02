<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Hash;

class DangNhapController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.dang_nhap');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'ten_dang_nhap' => 'required',
            'mat_khau' => 'required',
        ]);

        $taiKhoan = TaiKhoan::where('ten_dang_nhap', $data['ten_dang_nhap'])
            ->where('trang_thai', true)
            ->first();

        if (!$taiKhoan || !Hash::check($data['mat_khau'], $taiKhoan->mat_khau)) {
            return back()->withErrors(['ten_dang_nhap' => 'Sai tài khoản hoặc mật khẩu']);
        }

        $request->session()->put('tai_khoan_id', $taiKhoan->id);
        $request->session()->put('vai_tro', $taiKhoan->vai_tro);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('dang_nhap.form');
    }
}
