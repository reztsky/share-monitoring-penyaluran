<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMonitoringLaundry extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_transaksi',
        'harga_cuci_kering',
        'harga_cuci_basah',
        'harga_cuci_setrika',
        'harga_setrika',
    ];
}
