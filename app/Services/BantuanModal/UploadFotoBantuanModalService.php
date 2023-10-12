<?php
namespace App\Services\BantuanModal;

use App\Models\TransaksiBantuanModal;
use Illuminate\Support\Facades\Storage;

class UploadFotoBantuanModalService{

    public static function upload($files,$id_kpm){
        if(is_null($files)) return self::find($id_kpm);
        $fileName=array();
        self::deleteFotoIfExist($id_kpm);

        foreach ($files as $key => $file) {
            $fileName[$key]=$file->hashName();
            $file->storeAs('public/foto_pemberian',$fileName[$key]);
        }
        
        return $fileName;
    }

    public static function find($id_kpm){
        return TransaksiBantuanModal::whereIdKpm($id_kpm)->first()->foto_pemberian;
    }

    public static function deleteFotoIfExist($id_kpm){    
        $transaksiBlt=TransaksiBantuanModal::where('id_kpm',$id_kpm)->get()->first();
        
        if(is_null($transaksiBlt)) return;

        foreach ($transaksiBlt->foto_pemberian as $key => $value) {
            if(Storage::exists('public/foto_pemberian/'.$value)){
                Storage::delete('public/foto_pemberian/'.$value);
            }
        }

        return;
    }
}