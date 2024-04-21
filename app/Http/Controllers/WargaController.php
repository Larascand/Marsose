<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class WargaController extends Controller
{
    public function index()
    {
        $warga = Warga::all();
        return view('warga.index', compact('warga'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NIK' => 'required|unique:warga',
            'username' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_telp' => 'required',
            'No_KK' => 'required',
        ]);

        Warga::create($request->all());
        return redirect()->route('warga.index')->with('success', 'Warga berhasil ditambahkan');
    }

    public function edit($NIK)
    {
        $warga = Warga::findOrFail($NIK);
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, $NIK)
    {
        $warga = Warga::findOrFail($NIK);

        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'no_telp' => 'required',
            'No_KK' => 'required',
        ]);

        $warga->update($request->all());
        return redirect()->route('warga.index')->with('success', 'Warga berhasil diperbarui');
    }

    public function destroy($NIK)
    {
        $warga = Warga::findOrFail($NIK);
        $warga->delete();
        return redirect()->route('warga.index')->with('success', 'Warga berhasil dihapus');
    }
}
