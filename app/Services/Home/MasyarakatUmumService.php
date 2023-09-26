<?php

namespace App\Services\Home;

use App\Models\KpmBlt;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Support\Facades\DB;

class MasyarakatUmumService
{
    public function rekap($tahun_anggaran = null, $tahap = null)
    {
        $tersalur = $this->getTersalur($tahun_anggaran, $tahap);
        $total = $this->getTotal($tahun_anggaran, $tahap);
        $result = collect([]);

        $total->each(function ($item, $key) use ($result, $tersalur) {
            $dataSalur = $tersalur->firstWhere('kecamatan', $item->kecamatan);

            $result->push([
                'x' => $item->kecamatan,
                'total_data' => $item->total_data,
                'tersalur' => (is_null($dataSalur)) ?  0 : $dataSalur->tersalur,
                'sisa' => (is_null($dataSalur)) ?  $item->total_data : $item->total_data - $dataSalur->tersalur,
            ]);
        });

        return $result->toArray();
    }

    private function maxTahap()
    {
        return KpmBlt::selectRaw('max(tahap) as tahap')->where('tahun_anggaran', date('Y'))->get()->first();
    }

    private function getTersalur($tahun_anggaran = null, $tahap = null)
    {
        return DB::table('kpm_blts as a')
            ->select('a.kecamatan')
            ->selectRaw('count(a.id) as tersalur')
            ->groupBy('a.kecamatan')
            ->join('transaksi_blts as b', 'a.id', '=', 'b.id_kpm')
            ->where('b.deleted_at', null)
            ->where('a.status_kpm_sebagai', 2)
            ->when(is_null($tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) use ($tahun_anggaran) {
                return $q->whereTahunAnggaran($tahun_anggaran);
            })
            ->when(is_null($tahap), function ($q) {
                $max_tahap = $this->maxTahap();
                return $q->whereTahap($max_tahap->tahap);
            }, function ($q) use ($tahap) {
                return $q->whereTahap($tahap);
            })
            ->get();
    }

    private function getTotal($tahun_anggaran = null, $tahap = null)
    {
        return DB::table('kpm_blts')
            ->select('kecamatan')
            ->selectRaw('count(id) as total_data')
            ->where('status_kpm_sebagai', 2)
            ->when(is_null($tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) use ($tahun_anggaran) {
                return $q->whereTahunAnggaran($tahun_anggaran);
            })
            ->when(is_null($tahap), function ($q) {
                $max_tahap = $this->maxTahap();
                return $q->whereTahap($max_tahap->tahap);
            }, function ($q) use ($tahap) {
                return $q->whereTahap($tahap);
            })
            ->groupBy('kecamatan')
            ->get();
    }
}
