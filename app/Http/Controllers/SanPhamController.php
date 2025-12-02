<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function index()
    {
        $sanPhams = SanPham::with('nhaCungCap')->paginate(20);
        return view('san_phams.index', compact('sanPhams'));
    }

    public function create()
    {
        $nhaCungCaps = NhaCungCap::all();
        return view('san_phams.create', compact('nhaCungCaps'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_san_pham' => 'required|unique:san_phams,ma_san_pham',
            'ten_san_pham' => 'required',
            'nha_cung_cap_id' => 'nullable|exists:nha_cung_caps,id',
            'don_vi_tinh' => 'required',
            'so_luong_ton' => 'required|integer|min:0',
            'gia_nhap' => 'required|numeric|min:0',
            'gia_ban' => 'required|numeric|min:0',
        ]);

        SanPham::create($data);

        return redirect()->route('san_phams.index');
    }

    public function edit(SanPham $san_pham)
    {
        $nhaCungCaps = NhaCungCap::all();
        return view('san_phams.edit', [
            'sanPham' => $san_pham,
            'nhaCungCaps' => $nhaCungCaps,
        ]);
    }

    public function update(Request $request, SanPham $san_pham)
    {
        $data = $request->validate([
            'ten_san_pham' => 'required',
            'nha_cung_cap_id' => 'nullable|exists:nha_cung_caps,id',
            'don_vi_tinh' => 'required',
            'so_luong_ton' => 'required|integer|min:0',
            'gia_nhap' => 'required|numeric|min:0',
            'gia_ban' => 'required|numeric|min:0',
            'dang_ban' => 'boolean',
        ]);

        $san_pham->update($data);

        return redirect()->route('san_phams.index');
    }

    public function destroy(SanPham $san_pham)
    {
        $san_pham->delete();
        return redirect()->route('san_phams.index');
    }
}
