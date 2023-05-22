<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKebutuhan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable=[
        'nik',
        'no_kk',
        'nama',
        'kecamatan',
        'kelurahan',
        'alamat',
        'id_jenis_kebutuhan',
    ];

    
}
