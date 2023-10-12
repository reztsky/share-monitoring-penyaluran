<?php
namespace App\Services\BantuanModal;

use App\Models\TransaksiBantuanModal;
use Illuminate\Support\Facades\Storage;

class UploadPdfBantuanModalServices{

    // Jenis BA is [KPM or Kecamatan];

    public static function uploadPdf($id_kpm,$file_pdf,$jenis_ba='KPM'){
        if(is_null($file_pdf)) return self::find($id_kpm,$jenis_ba);
        if(!in_array($jenis_ba,['KPM','Kecamatan'])) return abort(403,'Failed To Save Transaksi');
        
        self::deletePdfIfExist($id_kpm,$jenis_ba);

        $fileName=$file_pdf->hashName();
        $path=$jenis_ba=='KPM' ? 'ba_kpm' : 'ba_kecamatan';

        $file_pdf->storeAs('public/'.$path,$fileName) ;
        
        return $fileName;
    }

    public static function find($id_kpm,$jenis_ba){
        $transaksi_bantuan_modal=TransaksiBantuanModal::whereIdKpm($id_kpm)->first();
        if(is_null($transaksi_bantuan_modal)) return;
        return  $jenis_ba=='KPM' ? $transaksi_bantuan_modal->ba_kpm : $transaksi_bantuan_modal->ba_kecamatan;
    }

    public static function deletePdfIfExist($id_kpm,$jenis_ba){    
        $transaksiBlt=TransaksiBantuanModal::where('id_kpm',$id_kpm)->get()->first();
        
        if(is_null($transaksiBlt)) return;

        $path=$jenis_ba=='KPM' ? 'ba_kpm' : 'ba_kecamatan';
        $file=$jenis_ba=='KPM' ? $transaksiBlt->ba_kpm : $transaksiBlt->ba_kecamatan;

        if(Storage::exists('public/'.$path.'/'.$file)){
            Storage::delete('public/'.$path.'/'.$file);
        }

        return;
    }
}