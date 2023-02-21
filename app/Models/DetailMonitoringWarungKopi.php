<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMonitoringWarungKopi extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_transaksi',
        'nama_barang',
        'jumlah_awal',
        'jumlah_saat_ini',
        'harga',
        'catatan',
    ];

    protected $casts=[
        'nama_barang'=>'array',
        'jumlah_awal'=>'array',
        'jumlah_saat_ini'=>'array',
        'harga'=>'array'
    ];
}
