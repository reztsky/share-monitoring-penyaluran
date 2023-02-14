<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMonitoringCuciKendaraan extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_transaksi',
        'kendaraan_dicuci_sebulan',
        'harga_cuci',
    ];
}
