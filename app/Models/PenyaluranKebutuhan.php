<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class PenyaluranKebutuhan extends Model
{
    use HasFactory, HasUuids, SoftDeletes, Sortable;
    // Tesss Model Push,dwdw,adwawdds
    protected $fillable=[
        'id_pengajuan',
        'tanggal_salur',
        'bap',
        'foto_penyaluran',
        'sumber_dana',
        'sumber_dana_lainnya',
    ];

    public $sortable = [
        'nik',
        'nama',
        'kelurahan',
        'status_pengajuan',
        'id_jenis_kebutuhan',
    ];

    public function nik()
    {
        return $this->belongsTo('App\PengajuanKebutuhan');
    }

    // public function nikSortable($query, $nik)
    // {
    //     return $query->join('pengajuan_kebutuhans', 'pengajuan_kebutuhans.id', '=', 'penyaluran_kebutuhans.id_pengajuan')
    //                 ->orderBy('pengajuan_kebutuhans.nik', $nik)
    //                 ->select('penyaluran_kebutuhans.*');
    // }

    public function pengajuan(){
        return $this->belongsTo(PengajuanKebutuhan::class,'id_pengajuan','id');
    }
}
