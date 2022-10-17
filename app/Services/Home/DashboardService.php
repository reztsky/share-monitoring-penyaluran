<?php
namespace App\Services\Home;

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
            ->get();
    }

    private function getTotalDataCount(){
        return DB::table('kpm_blts as a')
            ->selectRaw('count(a.id) as total_data')
            ->get();
    }

    public function chartByKecamatan(){
        $tersalur=$this->getTersalurByKecamatan();
        $total=$this->getTotalByKecamatan();
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

    private function getTersalurByKecamatan(){
        return DB::table('kpm_blts as a')
            ->select('a.kecamatan')
            ->selectRaw('count(a.id) as tersalur')
            ->groupBy('a.kecamatan')
            ->join('transaksi_blts as b','a.id','=','b.id_kpm')
            ->get();
    }

    private function getTotalByKecamatan(){
        return DB::table('kpm_blts')
            ->select('kecamatan')
            ->selectRaw('count(id) as total_data')
            ->groupBy('kecamatan')
            ->get();
    }
}
