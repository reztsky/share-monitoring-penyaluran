<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJenisKebutuhan extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama_kebutuhan',
        'is_diukur'
    ];

    public function Pengajuan(){
        return $this->hasMany(PengajuanKebutuhan::class,'id_jenis_kebutuhan','id');
    }
}
