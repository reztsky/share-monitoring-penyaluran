<?php

namespace App\Services\Export;

use App\Models\TransaksiBantuanModal;
use App\Models\TransaksiBlt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ExportFotoService
{

    protected $zip, $now;

    public function __construct()
    {
        $this->zip = new ZipArchive;
        $this->now = Carbon::now()->format('Y-m-d');
    }

    public function export($request)
    {
        $fileName = "Export{$request['kategori']}.zip";

        if ($this->zip->open(public_path($fileName), ZipArchive::CREATE) !== TRUE) {
            return [
                'status' => false,
                'message' => 'Failed To Make ZIP',
                'data' => []
            ];
        }

        $request['kategori']=='BLT' ? $this->exportBLT($request) : $this->exportBandMod($request);

        $this->zip->close();

        return [
            'status' => true,
            'message' => 'Sukes Make File Zip',
            'data' => [
                'filename' => $fileName,
                'path' => public_path($fileName),
            ]
        ];
    }

    private function exportBLT($request)
    {
        $pathImage = 'public/foto_pengambilan/';

        $transaksiblts = TransaksiBlt::select(['foto_pengambilan', 'id_kpm'])->limit($request['limit'])->skip($request['offset'])->get();

        foreach ($transaksiblts as $transaksiblt) {
            if (!Storage::exists($pathImage . $transaksiblt->foto_pengambilan)) continue;

            $relativeNameInZipFile = Storage::path($pathImage . $transaksiblt->foto_pengambilan);
            $nameinZip = preg_replace("/\.jpg$/i", "_{$transaksiblt->id_kpm}.jpg", basename($relativeNameInZipFile));
            $this->zip->addFile($relativeNameInZipFile, $nameinZip);
        }
    }

    private function exportBandMod($request)
    {
        $pathImage = 'public/foto_pemberian/';

        $transaksiBanMods = TransaksiBantuanModal::select(['foto_pemberian', 'id_kpm'])->limit($request['limit'])->skip($request['offset'])->get();

        foreach ($transaksiBanMods as $transaksiBanMod) {

            foreach ($transaksiBanMod->foto_pemberian as $foto) {
                if (!Storage::exists($pathImage . $foto)) continue;

                $relativeNameInZipFile = Storage::path($pathImage . $foto);
                $nameinZip = preg_replace("/\.jpg$/i", "_{$transaksiBanMod->id_kpm}.jpg", basename($relativeNameInZipFile));
                $this->zip->addFile($relativeNameInZipFile, $nameinZip);
            }
        }
    }
}
