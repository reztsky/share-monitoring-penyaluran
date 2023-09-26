<?php

namespace App\Models;

use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpmBantuanModal extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_urut',
        'nama',
        'nik',
        'alamat',
        'kelurahan',
        'kecamatan',
        'jenis_bantuan_modal',
        'status_aktif',
        'tahun_anggaran',
        'tahap'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function scopeFindKpm($query, $id_kpm)
    {
        return $query->whereId($id_kpm)
            ->orWhere('nik', $id_kpm);
    }

    public function transaksi()
    {
        return $this->hasOne(TransaksiBantuanModal::class, 'id_kpm', 'id');
    }

    public function scopeCekData($query, $request)
    {
        return $query->where('nik', $request->nik)
            ->orWhere('no_kk', $request->no_kk);
    }

    public function scopeTahunAktif($query)
    {
        return $query->where('tahun_anggaran', TahunAnggaranServices::tahunAnggaranAktif());
    }

    public function scopeSearch($query, $keywords)
    {
        return $query->whereTahunAnggaran($keywords['tahun_anggaran'])
            ->whereTahap($keywords['tahap'])
            ->where(function ($q) use ($keywords) {
                return $q->where('no_urut', $keywords['key'])
                    ->orWhere('nik', $keywords['key']);
            });
    }
}
