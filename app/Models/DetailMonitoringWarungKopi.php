<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMonitoringWarungKopi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'lebih_banyak_kopi_teh',
        'harga_jual_kopi',
        'harga_jual_teh',
    ];

    protected function lebihBanyakKopiTeh(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return $value == 1 ? 'Kopi' : 'Teh';
            }
        );
    }
}
