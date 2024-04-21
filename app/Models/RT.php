<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RT extends Model
{
    use HasFactory;

    protected $table = 'data_rt';
    protected $primaryKey = 'No_RT';
    public $incrementing = false;
    public $timestamps = false;
     // Karena primary key bukan auto-increment
    protected $fillable = [
        'No_RT',
        'NIK',
        'nama',
        'username',
        'password',
        'alamat',
        'periode_jabatan',
        'No_RW',
    ];

        public function rw()
    {
        return $this->belongsTo(RW::class, 'No_RW', 'No_RW');
    }
}
