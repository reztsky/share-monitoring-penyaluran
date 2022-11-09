<?php
namespace App\Services\Home;

use Illuminate\Support\Facades\DB;

class DetailService{

    public function __construct(public $kecamatan,public $jenis){}

    public function detail(){
        $result=[];

        if(!in_array($this->jenis,['TERSALUR','TOTAL','SISA'])) return abort(404,'Not Found');

        if($this->jenis=='TERSALUR') $result=$this->tersalur();
        if($this->jenis=='TOTAL') $result=$this->totalData();
        if($this->jenis=='SISA') $result=$this->sisa();

        $result->appends([
            'kecamatan'=>$this->kecamatan,
            'jenis'=>$this->jenis,
        ]);

        return $result;
    }

    private function tersalur(){
        return DB::table('kpm_blts as a')
            ->select('a.*')
            ->join('transaksi_blts as b','a.id','=','b.id_kpm')
            ->where('b.deleted_at',null)
            ->where('a.kecamatan',$this->kecamatan)
            ->when($this->jenis=='SISA',function($q){
                return $q->get();
            }, function($q){
                return $q->paginate(15);
            });
            
    }

    private function totalData(){
        return DB::table('kpm_blts as a')
            ->select(['a.*'])
            ->where('a.kecamatan',$this->kecamatan)
            ->paginate(15);
    }

    private function sisa(){
        $tesalur=$this->tersalur();
        // dd($tesalur);
        // dd($tesalur->pluck('id')->toArray());
        return DB::table('kpm_blts as a')
            ->select(['a.*'])
            ->whereNotIn('id',$tesalur->pluck('id')->toArray())
            ->where('a.kecamatan',$this->kecamatan)
            ->paginate(15);
    }

}