<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPengaduan extends Model
{
    use HasFactory;

    protected $table = 'laporan_pengaduan';
    protected $primaryKey = 'ID_Laporan';
    public $timestamps = false; // Tidak menggunakan kolom timestamps

    protected $fillable = [
        'tanggal_laporan',
        'jenis_laporan',
        'gambar',
        'keterangan',
        'status',
        'NIK',
        'No_RW',
    ];

    // Relasi dengan model Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'NIK', 'NIK');
    }

    // Relasi dengan model RW
    public function rw()
    {
        return $this->belongsTo(RW::class, 'No_RW', 'No_RW');
    }
}
