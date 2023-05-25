<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PemeriksaanKebutuhan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable=[
        'id_pengajuan',
        'bap',
        'verifikasi',
    ];

    public function pengajuan(){
        return $this->belongsTo(PengajuanKebutuhan::class,'id_pengajuan','id');
    }

    protected function verifikasi() : Attribute{
        return Attribute::make(
            get:function($value){
                if($value==1)return 'Setuju';
                if($value==2)return 'Tolak';
                return 'Belum Diperiksa / Masih Proses Pengukuran';
            }
        );
    }

}
