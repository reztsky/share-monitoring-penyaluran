<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiMonitoring extends Model
{
    use HasFactory;

    protected $fillable = [
        'inserted_by',
        'id_kpm_modal',
        'alamat_tempat_usaha',
        'jenis_bantuan_modal',
        'no_hp',
        // Pengelolaan Usaha
        'pengelolaan_usaha',
        'bentuk_usaha',
        'penggunaan_bantuan',
        'alasan_pengunaan_bantuan',
        // Hasil Usaha
        'penghasilan_sebulan',
        'kegunaan_hasil_usaha',
        // Lain Lain
        'kendala',
        'harapan',
    ];

    public function kpm(){
        return $this->belongsTo(KpmBantuanModal::class,'id_kpm_modal','id');
    }

    public function scopeInsertBy($query,$idUser){
        return $query->where('inserted_by',$idUser);
    }

    protected function pengeloalaanUsaha(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return $value == 1 ? 'Usaha Perorangan' : 'Usaha Kelompok';
            }
        );
    }

    protected function bentukUsaha(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return $value == 1 ? 'Usaha Utama' : 'Usaha Sampingan';
            }
        );
    }

    protected function penggunaanBantuan(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value == 1) return 'Mengawali Kegiatan Usaha';
                if ($value == 2) return 'Tambahan Modal Usaha';
                return 'Belum Digunakan';
            }
        );
    }
}
