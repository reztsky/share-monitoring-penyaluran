<?php

namespace App\Services\Pelayanan\Penyaluran;

use Illuminate\Support\Facades\Storage;

class UploadFotoService{
    public function upload($file)
    {
        $filename = $file->hashName();
        $file->storeAs('public/dokumentasi_penyaluran', $filename);

        return $filename;
    }

    public function delete($nama_file)
    {

        if(Storage::exists('public/dokumentasi_penyaluran/'.$nama_file)){
            Storage::delete('public/dokumentasi_penyaluran/'.$nama_file);
            return 1;
        }

        return 0;
    }
}