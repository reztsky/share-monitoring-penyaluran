<?php

namespace App\Services\Pelayanan\Pemeriksaan;

use Illuminate\Support\Facades\Storage;

class UploadBapService
{

    public function upload($file)
    {
        $filename = $file->hashName();
        $file->storeAs('public/bap_pemeriksaan', $filename);

        return $filename;
    }

    public function delete($nama_file)
    {

        if(Storage::exists('public/bap_pemeriksaan/'.$nama_file)){
            Storage::delete('public/bap_pemeriksaan/'.$nama_file);
            return null;
        }

        return null;
    }
}
