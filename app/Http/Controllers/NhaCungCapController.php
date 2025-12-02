<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use Illuminate\Http\Request;

class NhaCungCapController extends Controller
{
    public function index()
    {
        $nhaCungCaps = NhaCungCap::paginate(20);
        return view('nha_cung_caps.index', compact('nhaCungCaps'));
    }

    public function create()
    {
        return view('nha_cung_caps.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_nha_cung_cap' => 'required|unique:nha_cung_caps,ma_nha_cung_cap',
            'ten_nha_cung_cap' => 'required',
            'so_dien_thoai' => 'nullable',
            'email' => 'nullable|email',
            'dia_chi' => 'nullable',
        ]);

        NhaCungCap::create($data);
        return redirect()->route('nha_cung_caps.index');
    }

    public function edit(NhaCungCap $nha_cung_cap)
    {
        return view('nha_cung_caps.edit', ['nhaCungCap' => $nha_cung_cap]);
    }

    public function update(Request $request, NhaCungCap $nha_cung_cap)
    {
        $data = $request->validate([
            'ten_nha_cung_cap' => 'required',
            'so_dien_thoai' => 'nullable',
            'email' => 'nullable|email',
            'dia_chi' => 'nullable',
        ]);

        $nha_cung_cap->update($data);
        return redirect()->route('nha_cung_caps.index');
    }

    public function destroy(NhaCungCap $nha_cung_cap)
    {
        $nha_cung_cap->delete();
        return redirect()->route('nha_cung_caps.index');
    }
}
