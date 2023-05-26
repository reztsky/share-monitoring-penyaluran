<?php

namespace App\Services\Pelayanan;

use App\Models\PengajuanKebutuhan;
use App\Models\PenyaluranKebutuhan;
use Illuminate\Support\Facades\DB;

class DashboardAlatBantuService
{

    public function rekap(){
       return DB::table('m_jenis_kebutuhans as a')
       ->select(['a.id','a.nama_kebutuhan'])
       ->selectRaw('count(b.id) as pengajuan_count')
       ->selectRaw('count(c.id) as penyaluran_count')
       ->leftJoin('pengajuan_kebutuhans as b','a.id','=','b.id_jenis_kebutuhan')
       ->leftJoin('penyaluran_kebutuhans as c','b.id','=','c.id_pengajuan')
       ->groupBy(['a.nama_kebutuhan','a.id'])
        ->get();
    }
    

    private function pengajuan($enis_kebutuhan){
        
    }

    private function penyaluran($jenis_kebutuhan){
       
    }
}
