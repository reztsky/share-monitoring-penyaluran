<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuotaKelurahan extends Model
{
    use HasFactory;

    protected $fillable=[
        'kelurahan',
        'kecamatan',
        'kuota_awal',
        'kuota_sisa',
    ];
}
