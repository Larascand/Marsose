<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KK extends Model
{
    use HasFactory;

    protected $table = 'kk';
    protected $primaryKey = 'No_KK';
    public $timestamps = false;
    public $incrementing = false;


    protected $fillable = [
        'No_KK',
        'kepala_keluarga',
        'No_RT',
        'No_RW',
    ];

    public function rt()
    {
        return $this->belongsTo(RT::class, 'No_RT', 'No_RT');
    }

    public function rw()
    {
        return $this->belongsTo(RW::class, 'No_RW', 'No_RW');
    }
}
