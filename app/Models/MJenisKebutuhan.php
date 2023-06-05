<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MJenisKebutuhan extends Model
{
    use HasFactory, Sortable;

    protected $fillable=[
        'nama_kebutuhan',
        'is_diukur'
    ];

    public $sortable=[
        'nama_kebutuhan',
    ];

    public function Pengajuan(){
        return $this->hasMany(PengajuanKebutuhan::class,'id_jenis_kebutuhan','id');
    }
}
