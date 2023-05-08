<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiMonitoring extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'inserted_by',
        'id_kpm_modal',
        'alamat_tempat_usaha',
        'jenis_bantuan_modal',
        'no_hp',
        // Pengelolaan Usaha
        'status_penggunaan_bantuan',
        'pengelolaan_usaha',
        'bentuk_usaha',
        'penggunaan_bantuan',
        'alasan_penggunaan_bantuan',
        // Hasil Usaha
        'penghasilan_sebulan',
        'kegunaan_hasil_usaha',
        // Lain Lain
        'kendala',
        'harapan',
        'dokumentasi',
        'periode_monitoring',
        'tahun_monitoring',
    ];

    protected $casts = [
        'kegunaan_hasil_usaha' => 'array',
    ];

    public function kpm()
    {
        return $this->belongsTo(KpmBantuanModal::class, 'id_kpm_modal', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'inserted_by', 'id');
    }

    public function detail($jenis_bantuan_modal)
    {
        if ($jenis_bantuan_modal == 'MENJAHIT') {
            return $this->hasOne(DetailMonitoringMenjahit::class, 'id_transaksi', 'id');
        }

        if ($jenis_bantuan_modal == 'CUCI KENDARAAN') {
            return $this->hasOne(DetailMonitoringCuciKendaraan::class, 'id_transaksi', 'id');
        }

        if ($jenis_bantuan_modal == 'KOPI KELILING') {
            return $this->hasOne(DetailMonitoringStarling::class, 'id_transaksi', 'id');
        }

        if ($jenis_bantuan_modal == 'LAUNDRY') {
            return $this->hasOne(DetailMonitoringLaundry::class, 'id_transaksi', 'id');
        }

        if ($jenis_bantuan_modal == 'TOKO KELONTONG') {
            return $this->hasOne(DetailMonitoringTokel::class, 'id_transaksi', 'id');
        }

        if ($jenis_bantuan_modal == 'WARUNG KOPI') {
            return $this->hasOne(DetailMonitoringWarungKopi::class, 'id_transaksi', 'id');
        }

        return null;
    }

    public function scopeSearch($query, $request)
    {
        return $query->when($request->filled('keyword'), function ($q) use ($request) {
            return $q->whereHas('kpm', function ($que) use ($request) {
                return $que->where('nama', 'like', "%{$request->keyword}%")
                    ->orWhere('nik', $request->keyword)
                    ->orWhere('jenis_bantuan_modal', 'like', "%{$request->keyword}%");
            })->orWhereHas('user', function ($que) use ($request) {
                return $que->where('users.name', 'like', "%{$request->keyword}%");
            });
        });
    }

    

    public function scopeMonth($query, $request)
    {
        return $query->when($request->filled('periode_monitoring'),function($q) use ($request){
            return $q->where('periode_monitoring',$request->periode_monitoring)
            ->where('tahun_monitoring',date("Y"));
        });
    }

    public function scopeInsertBy($query, $user)
    {
        return $query->when($user->getRoleNames()->first() != 'Super Admin', function ($q) use ($user) {
            return $q->where('inserted_by', $user->id);
        });
    }

    public function scopeSortBy($query,$request){
        return $query->when($request->filled('sort_by'),function($q) use ($request){
            $orderBy=explode(',',$request->sort_by);
            return $q->orderBy($orderBy[0],$orderBy[1]);
        });
    }

    protected function statusPenggunaanBantuan(): Attribute
    {
        return Attribute::make(
            get:function($value){
                if($value==1) return 'Sudah Digunakan';
                if($value==2) return 'Belum Digunakan';
                return '-';
            }
        );
    }

    protected function pengelolaanUsaha(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value == 1) return 'Usaha Perorangan';
                if ($value == 2) return 'Usaha Kelompok';
                return '-';
            }
        );
    }

    protected function bentukUsaha(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value == 1) return 'Usaha Utama';
                if ($value == 2) return 'Usaha Sampingan';
                return '-';
            }
        );
    }

    protected function penggunaanBantuan(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value == 1) return 'Mengawali Kegiatan Usaha';
                if ($value == 2) return 'Tambahan Modal Usaha';
                return '-';
            }
        );
    }

    protected function penghasilanSebulan(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value == 1) return 'Rp. 0';
                if ($value == 2) return 'Rp. 1 - Rp. 299.999';
                if ($value == 3) return 'Rp. 300.000 - Rp. 599.999';
                if ($value == 4) return 'Rp. 600.000 - Rp. 999.999';
                if ($value == 5) return 'Rp. 1.000.000 - Rp. 1.499.999';
                if ($value == 6) return '>= Rp. 1.500.000';
                return 'Belum Digunakan';
            }
        );
    }
}
