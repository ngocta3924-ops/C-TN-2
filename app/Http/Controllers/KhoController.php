<?php

namespace App\Http\Controllers;

use App\Models\Kho;
use Illuminate\Http\Request;

class KhoController extends Controller
{
    public function index()
    {
        $khos = Kho::paginate(20);
        return view('khos.index', compact('khos'));
    }

    public function create()
    {
        return view('khos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'ten_kho' => 'required',
            'dia_chi' => 'nullable',
        ]);

        Kho::create($data);
        return redirect()->route('khos.index');
    }

    public function edit(Kho $kho)
    {
        return view('khos.edit', compact('kho'));
    }

    public function update(Request $request, Kho $kho)
    {
        $data = $request->validate([
            'ten_kho' => 'required',
            'dia_chi' => 'nullable',
        ]);

        $kho->update($data);
        return redirect()->route('khos.index');
    }

    public function destroy(Kho $kho)
    {
        $kho->delete();
        return redirect()->route('khos.index');
    }
}
