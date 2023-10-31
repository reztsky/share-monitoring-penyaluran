<?php

namespace App\Services\BantuanModal;

use App\Models\KpmBantuanModal;
use App\Services\Settings\TahunAnggaranServices;
use App\Services\Settings\SumberDanaServices;
use Illuminate\Support\Facades\DB;

class DetailDashboardBantuanModalService
{


    public function __construct(public $tahun_anggaran = null,public $jenis_bantuan, public $kategori, public $sumber_dana)
    {
    }

    public function detail()
    {
        $result = [];

        if (!in_array($this->kategori, ['TERSALUR', 'TOTAL', 'SISA'])) return abort(404, 'Not Found');

        if ($this->kategori == 'TERSALUR') $result = $this->tersalur();
        if ($this->kategori == 'TOTAL') $result = $this->total();
        if ($this->kategori == 'SISA') $result = $this->sisa();

        return $result;
    }

    private function total()
    {

        return DB::table('kpm_bantuan_modals')->where('jenis_bantuan_modal', $this->jenis_bantuan)
            ->when(is_null($this->tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) {
                return $q->whereTahunAnggaran($this->tahun_anggaran);
            })
            ->when(is_null($this->sumber_dana)||($this->sumber_dana=='All'), function ($q) {
                return $q->whereIn('sumber_dana',['Dinas Sosial','Baznas','BSP']);
            }, function ($q) {
                return $q->whereSumberDana($this->sumber_dana);
            })
            ->where('status_aktif', 1)
            ->paginate(15);
    }

    private function tersalur()
    {
        return DB::table('kpm_bantuan_modals as a')
            ->join('transaksi_bantuan_modals as b', 'a.id', '=', 'b.id_kpm')
            ->select(['a.*', 'b.foto_pemberian'])
            ->when(is_null($this->tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) {
                return $q->whereTahunAnggaran($this->tahun_anggaran);
            })
            ->when(is_null($this->sumber_dana)||($this->sumber_dana=='All'), function ($q) {
                return $q->whereIn('sumber_dana',['Dinas Sosial','Baznas','BSP']);
            }, function ($q) {
                return $q->whereSumberDana($this->sumber_dana);
            })
            ->where('b.deleted_at', null)
            ->where('a.jenis_bantuan_modal', $this->jenis_bantuan)
            ->where('a.status_aktif', 1)
            ->when($this->kategori == 'SISA', function ($q) {
                return $q->get();
            }, function ($q) {
                return $q->paginate(15);
            });
    }

    private function sisa()
    {
        $tesalur = $this->tersalur();

        return DB::table('kpm_bantuan_modals as a')
            ->select(['a.*'])
            ->whereNotIn('id', $tesalur->pluck('id')->toArray())
            ->where('jenis_bantuan_modal', $this->jenis_bantuan)
            ->where('status_aktif', 1)
            ->when(is_null($this->tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) {
                return $q->whereTahunAnggaran($this->tahun_anggaran);
            })
            ->when(is_null($this->sumber_dana)||($this->sumber_dana=='All'), function ($q) {
                return $q->whereIn('sumber_dana',['Dinas Sosial','Baznas','BSP']);
            }, function ($q) {
                return $q->whereSumberDana($this->sumber_dana);
            })
            ->paginate(15);
    }
}
