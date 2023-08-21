<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKpmBanmodAll extends Model
{
    use HasFactory;

    protected $fillable=[
        'nik',
        'no_kk',
        'nama',
        'alamat',
        'kelurahan',
        'kecamatan',
        'status_aktif',
        'jenis_bantuan_modal',
        'tahun_anggaran',
    ];

    public function scopeCekData($query,$request){
        return $query->where(function($q) use ($request){
            return $q->where('nik',$request->nik)
            ->orWhere('no_kk',$request->no_kk);
        });
    }
}
