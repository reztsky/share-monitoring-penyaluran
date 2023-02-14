<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMonitoringMenjahit extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_transaksi',
        'jahitan_dalam_sebulan'
    ];
}
