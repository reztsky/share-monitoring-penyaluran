<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsulanDbhcht extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'alamat',
        'rt',
        'rw',
        'kecamatan',
        'kelurahan',
        'jenis_bantuan_modal',
        'tahun_anggaran',
    ];

    public function scopeCekData($query, $request)
    {
        return $query->where('nik', $request->nik)
            ->orWhere('no_kk', $request->no_kk);
    }

    public function scopeDashboard($query){
        return $query->select('jenis_bantuan_modal')
            ->selectRaw('count(id) as jumlah')
            ->groupBy('jenis_bantuan_modal');
    }
    
    public function scopeSearch($query,$keyword){
        return $query->where(function($query) use ($keyword){
            return $query->where('nik',$keyword)
            ->orWhere('nama','like','%'.$keyword.'%')
            ->orWhere('alamat','like','%'.$keyword.'%');
        });
    }
}
