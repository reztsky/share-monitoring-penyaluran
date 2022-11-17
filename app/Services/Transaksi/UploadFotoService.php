<?php
namespace App\Services\Transaksi;

use App\Models\TransaksiBlt;
use Illuminate\Support\Facades\Storage;

class UploadFotoService{

    public static function upload($file,$id_kpm){
        self::deleteFotoIfExist($id_kpm);

        $fileName=$file->hashName();
        $file->storeAs('public/foto_pengambilan',$fileName);

        return $fileName;
    }

    public static function deleteFotoIfExist($id_kpm){    
        $transaksiBlt=TransaksiBlt::where('id_kpm',$id_kpm)->get();
    
        if(count($transaksiBlt)<1) return;

        if(Storage::exists('public/foto_pengambilan/'.$transaksiBlt->first()->foto_pengambilan)){
            Storage::delete('public/foto_pengambilan/'.$transaksiBlt->first()->foto_pengambilan);
        }

        return;
    }
}