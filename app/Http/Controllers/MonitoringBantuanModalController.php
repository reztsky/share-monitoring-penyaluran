<?php

namespace App\Http\Controllers;

use App\Models\KpmBantuanModal;
use App\Services\Monitoring\ItemTokelService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MonitoringBantuanModalController extends Controller
{
    private $view='monitoringBantuanModal.';

    
    public function index(){
        return view($this->view.'index');
    }

    public function create(){
        return view($this->view.'create');
    }

    public function store(Request $request){}

    public function edit($id){}

    public function update($id,Request $request){}

    public function delete($id){}

    public function find($nik){
        $kpm=KpmBantuanModal::findKpm($nik)->get()->first();
        if(is_null($kpm)) return response()->json(['data'=>$kpm],200);
        $template=$this->caseJenisBantaunModal($kpm);
        return response()->json(['data'=>$kpm,'template'=>$template],200);
    }

    private function caseJenisBantaunModal($kpm){
        if($kpm->jenis_bantuan_modal=='MENJAHIT') {
            return view($this->view.'form.hasilUsaha.menjahit')->with('jenis_bantuan_modal',$kpm->jenis_bantuan_modal)->render();
        }

        if($kpm->jenis_bantuan_modal=='CUCI KENDARAAN'){
            return view($this->view.'form.hasilUsaha.cuci_kendaraan')->with('jenis_bantuan_modal',$kpm->jenis_bantuan_modal)->render();
        }

        if($kpm->jenis_bantuan_modal=='KOPI KELILING'){
            return view($this->view.'form.hasilUsaha.kopi_keliling')->with('jenis_bantuan_modal',$kpm->jenis_bantuan_modal)->render();
        }

        if($kpm->jenis_bantuan_modal=='LAUNDRY'){
            return view($this->view.'form.hasilUsaha.laundry')->with('jenis_bantuan_modal',$kpm->jenis_bantuan_modal)->render();
        }

        if($kpm->jenis_bantuan_modal=='TOKO KELONTONG'){
            $items=ItemTokelService::getItem();
            return view($this->view.'form.hasilUsaha.toko_kelontong')->with([
                'jenis_bantuan_modal'=>$kpm->jenis_bantuan_modal,
                'items'=>$items
            ])->render();
        }

        if($kpm->jenis_bantuan_modal=='WARUNG KOPI'){
            return view($this->view.'form.hasilUsaha.warung_kopi')->with('jenis_bantuan_modal',$kpm->jenis_bantuan_modal)->render();
        }
        
    }
}
