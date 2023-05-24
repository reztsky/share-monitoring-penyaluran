<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MKecamatan extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'kecamatan'
    ];

    public function kelurahan(){
        return $this->hasMany(MKelurahan::class,'id_kecamatan','id');
    }
}
