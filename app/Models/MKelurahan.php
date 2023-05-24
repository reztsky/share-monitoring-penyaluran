<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MKelurahan extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'id_kecamatan',
        'kelurahan'
    ];

    public function kecamatan(){
        return $this->belongsTo(MKecamatan::class,'id_kecamatan','id');
    }

    public function scopeByKecamatan($query,$id_kecamatan){
        return $query->where('id_kecamatan',$id_kecamatan);
    }
}
