<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class PengajuanKebutuhan extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Sortable;

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
        'tanggal_pengajuan',
        'dokumentasi',
    ];

    public $sortable=[
        'nik',
        'nama',
        'kelurahan',
        'status_pengajuan',
        'id_jenis_kebutuhan',
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

    public function scopeSelectCustom($query){
        return $query->select([
            'id',
            'nik',
            'nama',
            'kelurahan',
            'status_pengajuan',
            'id_jenis_kebutuhan'
        ]);
    }

    public function kebutuhan(){
        return $this->belongsTo(MJenisKebutuhan::class, 'id_jenis_kebutuhan', 'id');
    }

    public function pemeriksaan(){
        return $this->hasOne(PemeriksaanKebutuhan::class,'id_pengajuan','id');
    }

    public function penyaluran(){
        return $this->hasOne(PenyaluranKebutuhan::class,'id_pengajuan','id');
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

    public function scopeDiterima($query){
        return $query->where('status_pengajuan',1);
    }

    public function scopeIsDiukur($query,$is_diukur){
        return $query->whereHas('kebutuhan',function($que) use ($is_diukur){
            return $que->where('is_diukur',$is_diukur);
        });
    }

    public function scopeStatusPenyaluran($query,$request){
        return $query->when($request->filled('status_penyaluran'),function ($que) use ($request){
            $status_penyaluran=$request->status_penyaluran;
            if($status_penyaluran==1) return $que->has('penyaluran');
            return $que->doesntHave('penyaluran');
        });
    }
    
}
