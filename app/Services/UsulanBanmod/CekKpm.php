<?php
namespace App\Services\UsulanBanmod;

use App\Models\KpmBantuanModal;
use App\Models\UsulanDbhcht;
use Illuminate\Support\Facades\Http;

class CekKpm{

    public $access_key,$access_id;

    public function __construct()
    {
        $this->access_key='9,mY8Qz8qbsvmBfFLpXFsmhcPuvfmN1OHvC9T98Vkg';
        $this->access_id='9,L304Vvy0D6lkCesPHMHdtzQNQUjQ5dLT4G4THyk8';
    }

    public function cekKpm($nik,$user){
        $cekGakin=$this->cekGakin($nik,$user);
        $isDiusulkan=$this->isDiusulkan($nik);
        $cekGakin->put('isDiusulkan',$isDiusulkan['isDiusulkan']);
        $cekGakin->put('detail_usulan',$isDiusulkan['detail_usulan']);
        
        return $cekGakin;
    }

    private function cekGakin($nik,$user){
        $paramater=[
            'nik'=>$nik,
            'stt_cek'=>'detail',
            'access_key'=>$this->access_key,
            'access_id'=>$this->access_id,
            'bypass'=>'N',
        ];

        $url="https://sikeluargamiskin.surabaya.go.id/api/outreach/cek_mbr";
        $request=Http::post($url,$paramater)->collect();
        $cek_administrasi_wil=$this->cekAdministrasiWil($user,$request);

        if($cek_administrasi_wil) {
            return collect([
                'status' => 0,
                'message'=>'Data diluar Wilayah Administrasi',
            ]);
        }

        return $request;     
    }

    private function isDiusulkan($nik){
        $cek=UsulanDbhcht::whereNik($nik)->get();

        if(count($cek)==0) return [
            'isDiusulkan'=>false,
            'detail_usulan'=>[],
        ];

        return [
            'isDiusulkan'=>true,
            'detail_usulan'=>$cek->first()->toArray(),
        ];
    }

    private function cekAdministrasiWil($user,$request){
        if($user->roles->first()->name=='Super Admin') return false;
        if($request['status']==0) return false;

        $userdetail=explode("|",$user->name);
        $data=$request['data'];

        if($data['kelurahan']==$userdetail[1] && $data['kecamatan']==$userdetail[2]) return false;

        return true;
    }
    
}