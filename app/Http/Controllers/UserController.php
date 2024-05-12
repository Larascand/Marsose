<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function laporan()
    {
        return view('user.laporan');
    }

    public function surat_keterangan()
    {
        return view('user.surat_keterangan');
    }

    public function surat_pengantar()
    {
        return view('user.surat_pengantar');
    }
}
