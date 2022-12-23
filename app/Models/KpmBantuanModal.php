<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpmBantuanModal extends Model
{
    use HasFactory;

    protected $hidden=[
        'created_at',
        'updated_at'
    ];
    
    public function scopeFindKpm($query,$id_kpm){
        return $query->whereId($id_kpm)
        ->orWhere('nik',$id_kpm);
    }

    public function transaksi(){
        return $this->hasOne(TransaksiBantuanModal::class,'id_kpm','id');
    }
}
