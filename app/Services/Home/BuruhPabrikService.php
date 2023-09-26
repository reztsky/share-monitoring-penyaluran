<?php

namespace App\Services\Home;

use App\Models\KpmBlt;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Support\Facades\DB;

class BuruhPabrikService
{
    public function rekap($tahun_anggaran = null, $tahap = null)
    {
        
        $tersalur = $this->tersalur($tahun_anggaran, $tahap);
        $total = $this->jumlahBuruh($tahun_anggaran, $tahap);
        $result = collect([]);

        $total->each(function ($item, $key) use ($result, $tersalur) {
            $dataSalur = $tersalur->firstWhere('keterangan', $item->keterangan);

            $result->push([
                'pabrik' => $item->keterangan,
                'total_data' => $item->jumlah,
                'tersalur' => (is_null($dataSalur)) ?  0 : $dataSalur->tersalur,
                'sisa' => (is_null($dataSalur)) ?  $item->jumlah : $item->jumlah - $dataSalur->tersalur,
            ]);
        });

        return $result->toArray();
    }


    private function maxTahap()
    {
        return KpmBlt::selectRaw('max(tahap) as tahap')->where('tahun_anggaran', date('Y'))->get()->first();
    }

    private function jumlahBuruh($tahun_anggaran = null, $tahap = null)
    {
        return DB::table('kpm_blts')
            ->select('keterangan')
            ->selectRaw('count(id) as jumlah')
            ->where('status_kpm_sebagai', 1)
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
            ->groupBy('keterangan')
            ->get();
    }

    private function tersalur($tahun_anggaran = null, $tahap = null)
    {
        return DB::table('kpm_blts as a')
            ->select('a.keterangan')
            ->selectRaw('count(a.id) as tersalur')
            ->groupBy('a.keterangan')
            ->join('transaksi_blts as b', 'a.id', '=', 'b.id_kpm')
            ->where('b.deleted_at', null)
            ->where('a.status_kpm_sebagai', 1)
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
