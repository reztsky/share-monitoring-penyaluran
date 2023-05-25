<?php

namespace App\Services\Pelayanan\Pemeriksaan;

use App\Models\TransaksiMonitoring;
use Illuminate\Support\Facades\Storage;

class UploadFotoService
{

    public function upload($file)
    {
        $filename = $file->hashName();
        $file->storeAs('public/dokumentasi_pemeriksaan', $filename);

        return $filename;
    }

    public function delete($nama_file)
    {

        if(Storage::exists('public/dokumentasi_pemeriksaan/'.$nama_file)){
            Storage::delete('public/dokumentasi_pemeriksaan/'.$nama_file);
            return 1;
        }

        return 0;
    }
}
