<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KK;
use App\Models\RW;
use App\Models\RT;


class KKController extends Controller
{
    public function index()
    {
        $dataKK = KK::all();
        return view('data_kk.index', compact('dataKK'));
    }

    public function create()
    {
        $dataRW = RW::all();
        $dataRT = RT::all();
        return view('data_kk.create', compact('dataRW', 'dataRT'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'No_KK' => 'required|unique:kk',
            'kepala_keluarga' => 'nullable',
            'No_RT' => 'nullable',
            'No_RW' => 'nullable',
        ]);

        KK::create($request->all());
        return redirect()->route('data_kk.index')->with('success', 'Data KK berhasil ditambahkan');
    }

    public function edit($No_KK)
    {
        $dataKK = KK::findOrFail($No_KK);
        $dataRW = RW::all();
        $dataRT = RT::all();
        return view('data_kk.edit', compact('dataKK','dataRW','dataRT'));
    }

    public function update(Request $request, $No_KK)
    {
        $dataKK = KK::findOrFail($No_KK);

        $request->validate([
            'kepala_keluarga' => 'nullable',
            'No_RT' => 'nullable',
            'No_RW' => 'nullable',
        ]);

        $dataKK->update($request->all());
        return redirect()->route('data_kk.index')->with('success', 'Data KK berhasil diperbarui');
    }

    public function destroy($No_KK)
    {
        $dataKK = KK::findOrFail($No_KK);
        $dataKK->delete();
        return redirect()->route('data_kk.index')->with('success', 'Data KK berhasil dihapus');
    }
}
