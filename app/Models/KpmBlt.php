<?php

namespace App\Models;

use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KpmBlt extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_urut',
        'virtual_account',
        'nik',
        'no_kk',
        'nama',
        'alamat',
        'rt',
        'rw',
        'keterangan',
        'kecamatan',
        'kelurahan',
        'status_kpm_sebagai',
        'tahun_anggaran',
        'tahap',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
    ];


    protected function statusKpmSebagai(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == 1 ? 'Buruh Rokok' : 'Masyarakat Umum'
        );
    }

    protected function nik(): Attribute
    {
        return Attribute::make(
            // get:fn($value)=>Str::mask($value,'*',-10,9)
            get: fn ($value) => $value
        );
    }

    public function transaksi()
    {
        return $this->hasOne(TransaksiBlt::class, 'id_kpm', 'id');
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
