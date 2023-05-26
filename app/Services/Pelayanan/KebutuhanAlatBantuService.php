<?php
namespace App\Services\Home;

use Illuminate\Support\Facades\DB;

class KebutuhanAlatBantuService{
    public function rekap(){

        $tersalur=$this->tersalur();
        $total=$this->jumlahBuruh();
        $result=collect([]);

        $total->each(function($item,$key) use($result,$tersalur){
            $dataSalur=$tersalur->firstWhere('keterangan',$item->keterangan);

            $result->push([
                'pabrik'=>$item->keterangan,
                'total_data'=>$item->jumlah,
                'tersalur'=> (is_null($dataSalur)) ?  0 : $dataSalur->tersalur,
                'sisa'=> (is_null($dataSalur)) ?  $item->jumlah : $item->jumlah-$dataSalur->tersalur,
            ]);
            
        });

        return $result->toArray();
    }

    private function jumlahBuruh(){
        return DB::table('kpm_blts')
        ->select('keterangan')
        ->selectRaw('count(id) as jumlah')
        ->where('status_kpm_sebagai',1)
        ->groupBy('keterangan')
        ->get();
    }

    private function tersalur(){
        return DB::table('kpm_blts as a')
            ->select('a.keterangan')
            ->selectRaw('count(a.id) as tersalur')
            ->groupBy('a.keterangan')
            ->join('transaksi_blts as b','a.id','=','b.id_kpm')
            ->where('b.deleted_at',null)
            ->where('a.status_kpm_sebagai',1)
            ->get();
    }
}