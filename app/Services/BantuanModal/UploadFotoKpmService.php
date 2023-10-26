<?php
namespace App\Services\BantuanModal;

use App\Models\TransaksiBantuanModal;
use Illuminate\Support\Facades\Storage;

class UploadFotoKpmService{

    public static function upload($file,$id_kpm){
        if(is_null($file)) return null;
        self::deleteFotoIfExist($id_kpm);

        $fileName=$file->hashName();
        $file->storeAs('public/foto_kpm',$fileName);
        
        return $fileName;
    }

    public static function find($id_kpm){
        return TransaksiBantuanModal::whereIdKpm($id_kpm)->first()->foto_kpm;
    }

    public static function deleteFotoIfExist($id_kpm){    
        $transaksiBlt=TransaksiBantuanModal::where('id_kpm',$id_kpm)->get()->first();
        
        if(is_null($transaksiBlt)) return;

        if(Storage::exists('public/foto_kpm/'.$transaksiBlt->foto_kpm)){
            Storage::delete('public/foto_kpm/'.$transaksiBlt->foto_kpm);
        }

        return;
    }
}