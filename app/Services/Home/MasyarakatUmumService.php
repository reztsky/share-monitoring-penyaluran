<?php
namespace App\Services\Home;

use Illuminate\Support\Facades\DB;

class MasyarakatUmumService{
    public function rekap(){
        $tersalur=$this->getTersalur();
        $total=$this->getTotal();
        $result=collect([]);

        $total->each(function($item,$key) use($result,$tersalur){
            $dataSalur=$tersalur->firstWhere('kecamatan',$item->kecamatan);

            $result->push([
                'x'=>$item->kecamatan,
                'total_data'=>$item->total_data,
                'tersalur'=> (is_null($dataSalur)) ?  0 : $dataSalur->tersalur,
                'sisa'=> (is_null($dataSalur)) ?  $item->total_data : $item->total_data-$dataSalur->tersalur,
            ]);
            
        });

        return $result->toArray();
    }

    private function getTersalur(){
        return DB::table('kpm_blts as a')
            ->select('a.kecamatan')
            ->selectRaw('count(a.id) as tersalur')
            ->groupBy('a.kecamatan')
            ->join('transaksi_blts as b','a.id','=','b.id_kpm')
            ->where('b.deleted_at',null)
            ->where('a.status_kpm_sebagai',2)
            ->get();
    }

    private function getTotal(){
        return DB::table('kpm_blts')
            ->select('kecamatan')
            ->selectRaw('count(id) as total_data')
            ->where('status_kpm_sebagai',2)
            ->groupBy('kecamatan')
            ->get();
    }
}