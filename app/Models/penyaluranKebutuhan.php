<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenyaluranKebutuhan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable=[
        'id_pengajuan',
        'bap',
        'foto_penyaluran',
    ];

    public function pengajuan(){
        return $this->belongsTo(PengajuanKebutuhan::class,'id_pengajuan','id');
    }
}
