<?php

namespace App\Services\Home;

use App\Models\KpmBlt;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Support\Facades\DB;

class DashboardService
{

    public function chartTersalur($tahun_anggaran = null, $tahap = null)
    {
        $tersalur = $this->getTersalurCount($tahun_anggaran, $tahap);
        $dataAWal = $this->getTotalDataCount($tahun_anggaran, $tahap);
        $sisaSalur = $dataAWal->first()->total_data - $tersalur->first()->tersalur;

        return [
            $tersalur->first()->tersalur,
            $sisaSalur,
        ];
    }

    private function maxTahap()
    {
        return KpmBlt::selectRaw('max(tahap) as tahap')->where('tahun_anggaran', date('Y'))->get()->first();
    }

    private function getTersalurCount($tahun_anggaran = null, $tahap = null)
    {
        return DB::table('kpm_blts as a')
            ->selectRaw('count(a.id) as tersalur')
            ->join('transaksi_blts as b', 'a.id', '=', 'b.id_kpm')
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
            ->where('b.deleted_at', null)
            ->get();
    }

    private function getTotalDataCount($tahun_anggaran = null, $tahap = null)
    {
        return DB::table('kpm_blts as a')
            ->selectRaw('count(a.id) as total_data')
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
}
