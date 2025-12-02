<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use Illuminate\Http\Request;

class KhuyenMaiController extends Controller
{
    public function index()
    {
        $khuyenMais = KhuyenMai::paginate(20);
        return view('khuyen_mais.index', compact('khuyenMais'));
    }

    public function create()
    {
        return view('khuyen_mais.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_khuyen_mai' => 'required|unique:khuyen_mais,ma_khuyen_mai',
            'ten_khuyen_mai' => 'required',
            'muc_khuyen_mai' => 'required|numeric|min:0',
        ]);

        KhuyenMai::create($data);
        return redirect()->route('khuyen_mais.index');
    }

    public function edit(KhuyenMai $khuyen_mai)
    {
        return view('khuyen_mais.edit', ['khuyenMai' => $khuyen_mai]);
    }

    public function update(Request $request, KhuyenMai $khuyen_mai)
    {
        $data = $request->validate([
            'ten_khuyen_mai' => 'required',
            'muc_khuyen_mai' => 'required|numeric|min:0',
            'dang_ap_dung' => 'boolean',
        ]);

        $khuyen_mai->update($data);
        return redirect()->route('khuyen_mais.index');
    }

    public function destroy(KhuyenMai $khuyen_mai)
    {
        $khuyen_mai->delete();
        return redirect()->route('khuyen_mais.index');
    }
}
