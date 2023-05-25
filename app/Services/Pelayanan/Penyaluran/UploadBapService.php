<?php

namespace App\Services\Pelayanan\Penyaluran;

use Illuminate\Support\Facades\Storage;

class UploadBapService{
    public function upload($file)
    {
        $filename = $file->hashName();
        $file->storeAs('public/bap_penyaluran', $filename);

        return $filename;
    }

    public function delete($nama_file)
    {

        if(Storage::exists('public/bap_penyaluran/'.$nama_file)){
            Storage::delete('public/bap_penyaluran/'.$nama_file);
            return 1;
        }

        return 0;
    }
}