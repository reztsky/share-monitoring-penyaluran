<?php

namespace App\Services\Pelayanan\Pengajuan;

use App\Models\TransaksiMonitoring;
use Illuminate\Support\Facades\Storage;

class UploadFotoService
{

    public function upload($file)
    {
        $filename = $file->hashName();
        $file->storeAs('public/dokumentasi_pengajuan', $filename);

        return $filename;
    }

    public function delete($nama_file)
    {

        if(Storage::exists('public/dokumentasi_pengajuan/'.$nama_file)){
            Storage::delete('public/dokumentasi_pengajuan/'.$nama_file);
            return 1;
        }

        return 0;
    }
}
