<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiBlt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
            'id_kpm',
            'foto_pengambilan',
            'kecamatan',
            'kelurahan',
    ];

    public function kpmBlt(){
        return $this->belongsTo(KpmBlt::class,'id_kpm','id');
    }
}
