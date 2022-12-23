<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiBantuanModal extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'id_kpm',
        'foto_pemberian'
    ];

    protected $casts=[
        'foto_pemberian'=>'array'
    ];
    
    public function kpmBantuanModal(){
        return $this->belongsTo(KpmBantuanModal::class,'id_kpm','id');
    }
}
