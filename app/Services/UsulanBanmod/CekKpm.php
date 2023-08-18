<?php
namespace App\Services\UsulanBanmod;

use App\Models\UsulanDbhcht;
use Illuminate\Support\Facades\Http;

class CekKpm{

    public $access_key,$access_id;

    public function __construct()
    {
        $this->access_key='9,mY8Qz8qbsvmBfFLpXFsmhcPuvfmN1OHvC9T98Vkg';
        $this->access_id='9,L304Vvy0D6lkCesPHMHdtzQNQUjQ5dLT4G4THyk8';
    }

    public function cekKpm($nik){
        $cekGakin=$this->cekGakin($nik);
        $cekGakin->put('isDiusulkan',$this->isDiusulkan($nik));
        return $cekGakin;
    }

    private function cekGakin($nik){
        $paramater=[
            'nik'=>$nik,
            'stt_cek'=>'detail',
            'access_key'=>$this->access_key,
            'access_id'=>$this->access_id,
            'bypass'=>'N',
        ];

        $url="https://sikeluargamiskin.surabaya.go.id/api/outreach/cek_mbr";
        $request=Http::post($url,$paramater)->collect();
        return $request;
    }

    private function isDiusulkan($nik){
        $cek=UsulanDbhcht::whereNik($nik)->count();
        return $cek>0 ? true : false;
    }
    
}