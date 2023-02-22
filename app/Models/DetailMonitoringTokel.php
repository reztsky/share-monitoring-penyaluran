<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMonitoringTokel extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_transaksi',
        'nama_barang',
        'jumlah_awal',
        'jumlah_terjual',
        'harga',
    ];

    protected $casts=[
        'nama_barang'=>'array',
        'jumlah_awal'=>'array',
        'jumlah_terjual'=>'array',
        'harga'=>'array'
    ];
}
