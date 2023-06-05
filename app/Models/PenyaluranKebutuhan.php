<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenyaluranKebutuhan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    // Tesss Model Push,dwdw,adwawdds
    protected $fillable=[
        'id_pengajuan',
        'tanggal_salur',
        'bap',
        'foto_penyaluran',
        'sumber_dana',
        'sumber_dana_lainnya',
    ];

    public function pengajuan(){
        return $this->belongsTo(PengajuanKebutuhan::class,'id_pengajuan','id');
    }
}
