<?php
namespace App\Services\BantuanModal;

use App\Models\KpmBantuanModal;
use App\Models\TransaksiBantuanModal;
use Illuminate\Support\Facades\DB;

class DashboardBantuanModalService{

    public function rekapTable(){
        $total=$this->all();
        // dd($total);
        $tersalur=$this->tersalur();
        $result=collect([]);
        
        $total->each(function($item,$key) use ($tersalur,$result){
            $filterTersalur=$tersalur->firstWhere('jenis_bantuan_modal',$item->jenis_bantuan_modal);

            $result->push([
                'jenis_bantuan_modal'=>$item->jenis_bantuan_modal,
                'total'=>$item->total,
                'tersalur'=>is_null($filterTersalur) ? 0 : $filterTersalur->tersalur,
                'sisa'=>is_null($filterTersalur) ? $item->total : $item->total-$filterTersalur->tersalur,
            ]);
        });

        return $result;

    }

    private function all(){
        return KpmBantuanModal::query()
        ->select([
            'jenis_bantuan_modal',
        ])
        ->selectRaw('count(id) as total')
        ->where('status_aktif',1)
        ->groupBy(['jenis_bantuan_modal'])
        ->get();
    }

    private function tersalur(){
        return DB::table('kpm_bantuan_modals as a')
        ->join('transaksi_bantuan_modals as b','a.id','=','b.id_kpm')
        ->select('a.jenis_bantuan_modal')
        ->selectRaw('count(a.id) as tersalur')
        ->where('b.deleted_at',null)
        ->where('status_aktif',1)
        ->groupBy('a.jenis_bantuan_modal')
        ->get();
    }

}