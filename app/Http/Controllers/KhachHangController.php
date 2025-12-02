<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    public function index()
    {
        $khachHangs = KhachHang::paginate(20);
        return view('khach_hangs.index', compact('khachHangs'));
    }

    public function create()
    {
        return view('khach_hangs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_khach_hang' => 'required|unique:khach_hangs,ma_khach_hang',
            'ten_khach_hang' => 'required',
            'so_dien_thoai' => 'nullable',
            'dia_chi' => 'nullable',
            'email' => 'nullable|email',
        ]);

        KhachHang::create($data);
        return redirect()->route('khach_hangs.index');
    }

    public function edit(KhachHang $khach_hang)
    {
        return view('khach_hangs.edit', ['khachHang' => $khach_hang]);
    }

    public function update(Request $request, KhachHang $khach_hang)
    {
        $data = $request->validate([
            'ten_khach_hang' => 'required',
            'so_dien_thoai' => 'nullable',
            'dia_chi' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $khach_hang->update($data);
        return redirect()->route('khach_hangs.index');
    }

    public function destroy(KhachHang $khach_hang)
    {
        $khach_hang->delete();
        return redirect()->route('khach_hangs.index');
    }
}
