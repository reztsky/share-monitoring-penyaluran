<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengajuanKebutuhan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable=[
        'nik',
        'no_kk',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'kecamatan',
        'kelurahan',
        'rw',
        'rt',
        'alamat',
        'no_hp',
        'id_jenis_kebutuhan',
        'status_pengajuan',
    ];

    protected function statusPengajuan() : Attribute{
        return Attribute::make(
            get : function ($value){
                if($value==1) return 'Disetujui';
                if($value==2) return 'Ditolak';
                return 'Menunggu Konfirmasi';
            }
        );
    }

    protected function jenisKelamin() : Attribute {
        return Attribute::make(
            get : fn($value)=>$value=='P' ? 'Perempuan' : 'Laki-Laki'
        );
    }

    public function kebutuhan(){
        return $this->belongsTo(MJenisKebutuhan::class, 'id_jenis_kebutuhan', 'id');
    }

    public function scopeSearch($query,$request){
        return $query->when($request->filled('keyword'),function($q) use ($request){
            return $q->where(function($que) use ($request){
                return $que->where('nik',$request->keyword)
                ->orWhere('nama','like',"%{$request->keyword}%")
                ->orWhere('kelurahan',$request->kelurahan);
            });
        });
    }

    public function scopeFilterJenisKebutuhan($query,$request){
        return $query->when($request->filled('id_jenis_kebutuhan'),function($q) use($request){
            return $q->where('id_jenis_kebutuhan',$request->id_jenis_kebutuhan);
        });
    }
    
}
