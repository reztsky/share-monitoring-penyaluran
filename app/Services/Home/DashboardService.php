<?php
namespace App\Services\Home;

use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Support\Facades\DB;

class DashboardService{

    public function chartTersalur(){
        $tersalur=$this->getTersalurCount();
        $dataAWal=$this->getTotalDataCount();
        $sisaSalur=$dataAWal->first()->total_data-$tersalur->first()->tersalur;

        return [
            $tersalur->first()->tersalur,
            $sisaSalur,
        ];
    }

    private function getTersalurCount(){
        return DB::table('kpm_blts as a')
            ->selectRaw('count(a.id) as tersalur')
            ->join('transaksi_blts as b','a.id','=','b.id_kpm')
            ->where('tahun_anggaran',TahunAnggaranServices::tahunAnggaranAktif())
            ->where('b.deleted_at',null)
            ->get();
    }

    private function getTotalDataCount(){
        return DB::table('kpm_blts as a')
            ->selectRaw('count(a.id) as total_data')
            ->where('tahun_anggaran',TahunAnggaranServices::tahunAnggaranAktif())
            ->get();
    }

   
}
