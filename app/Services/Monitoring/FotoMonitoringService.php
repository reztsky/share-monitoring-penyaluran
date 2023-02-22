<?php

namespace App\Services\Monitoring;

use App\Models\TransaksiMonitoring;
use Illuminate\Support\Facades\Storage;

class FotoMonitoringService
{

    public function upload($file)
    {
        $filename = $file->hashName();
        $file->storeAs('public/foto_monitoring', $filename);

        return $filename;
    }

    public function delete($nama_file)
    {

        if(Storage::exists('public/foto_monitoring/'.$nama_file)){
            Storage::delete('public/foto_monitoring/'.$nama_file);
            return 1;
        }

        return 0;
    }
}
