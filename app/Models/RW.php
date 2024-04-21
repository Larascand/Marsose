<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RW extends Model
{
    use HasFactory;

    protected $table = 'data_rw';
    protected $primaryKey = 'No_RW';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'No_RW',
        'NIK',
        'nama',
        'username', 
        'password',
        'alamat',
        'periode_jabatan', 
    ];

}
