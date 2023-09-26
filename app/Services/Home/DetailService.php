<?php

namespace App\Services\Home;

use App\Models\KpmBlt;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Support\Facades\DB;

class DetailService
{

    public function __construct(public $lokasi, public $jenis, public $statuskpm, public $tahun_anggaran = null, public $tahap = null)
    {
    }

    public function detail()
    {
        $result = [];

        if (!in_array($this->jenis, ['TERSALUR', 'TOTAL', 'SISA'])) return abort(404, 'Not Found');
        if (!in_array($this->statuskpm, [1, 2])) return abort(404, 'NOT FOUND');

        if ($this->jenis == 'TERSALUR') $result = $this->tersalur();
        if ($this->jenis == 'TOTAL') $result = $this->totalData();
        if ($this->jenis == 'SISA') $result = $this->sisa();

        $result->appends([
            'lokasi' => $this->lokasi,
            'jenis' => $this->jenis,
            'statuskpm' => $this->statuskpm,
            'tahun_anggaran'=>$this->tahun_anggaran,
            'tahap'=>$this->tahap,
        ]);

        return $result;
    }

    private function maxTahap()
    {
        return KpmBlt::selectRaw('max(tahap) as tahap')->where('tahun_anggaran', date('Y'))->get()->first();
    }

    private function tersalur()
    {
        return DB::table('kpm_blts as a')
            ->select(['a.*', 'b.foto_pengambilan'])
            ->join('transaksi_blts as b', 'a.id', '=', 'b.id_kpm')
            ->when($this->statuskpm == 1, function ($q) {
                //buruh pabrik
                return $q->where('keterangan', $this->lokasi);
            }, function ($q) {
                //masyarakat umum
                return $q->where('a.kecamatan', $this->lokasi)
                    ->where('status_kpm_sebagai', 2);
            })
            ->where('b.deleted_at', null)
            ->when(is_null($this->tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) {
                return $q->whereTahunAnggaran($this->tahun_anggaran);
            })
            ->when(is_null($this->tahap), function ($q) {
                $max_tahap = $this->maxTahap();
                return $q->whereTahap($max_tahap->tahap);
            }, function ($q) {
                return $q->whereTahap($this->tahap);
            })
            ->when($this->jenis == 'SISA', function ($q) {
                return $q->get();
            }, function ($q) {
                return $q->paginate(15);
            });
    }

    private function totalData()
    {
        return DB::table('kpm_blts as a')
            ->select(['a.*'])
            ->when(is_null($this->tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) {
                return $q->whereTahunAnggaran($this->tahun_anggaran);
            })
            ->when(is_null($this->tahap), function ($q) {
                $max_tahap = $this->maxTahap();
                return $q->whereTahap($max_tahap->tahap);
            }, function ($q) {
                return $q->whereTahap($this->tahap);
            })
            ->when($this->statuskpm == 1, function ($q) {
                //buruh pabrik
                return $q->where('a.keterangan', $this->lokasi)
                    ->where('a.status_kpm_sebagai', 1);
            }, function ($q) {
                //masyarakat umum
                return $q->where('a.kecamatan', $this->lokasi)
                    ->where('a.status_kpm_sebagai', 2);
            })
            ->paginate(15);
    }

    private function sisa()
    {
        $tesalur = $this->tersalur();

        return DB::table('kpm_blts as a')
            ->select(['a.*'])
            ->whereNotIn('id', $tesalur->pluck('id')->toArray())
            ->when(is_null($this->tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) {
                return $q->whereTahunAnggaran($this->tahun_anggaran);
            })
            ->when(is_null($this->tahap), function ($q) {
                $max_tahap = $this->maxTahap();
                return $q->whereTahap($max_tahap->tahap);
            }, function ($q) {
                return $q->whereTahap($this->tahap);
            })
            ->when($this->statuskpm == 1, function ($q) {
                //buruh pabrik
                return $q->where('a.keterangan', $this->lokasi)
                    ->where('a.status_kpm_sebagai', 1);
            }, function ($q) {
                //masyarakat umum
                return $q->where('a.kecamatan', $this->lokasi)
                    ->where('a.status_kpm_sebagai', 2);
            })
            ->paginate(15);
    }
}
