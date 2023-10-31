<?php

namespace App\Services\BantuanModal;

use App\Models\KpmBantuanModal;
use App\Models\TransaksiBantuanModal;
use App\Services\Settings\TahunAnggaranServices;
use App\Services\Settings\SumberDanaServices;
use Illuminate\Support\Facades\DB;

class DashboardBantuanModalService
{

    public function rekapTable($tahun_anggaran = null,$sumber_dana = null)
    {
        $total = $this->all($tahun_anggaran,$sumber_dana);
        $tersalur = $this->tersalur($tahun_anggaran,$sumber_dana);
        $result = collect([]);

        $total->each(function ($item, $key) use ($tersalur, $result) {
            $filterTersalur = $tersalur->firstWhere('jenis_bantuan_modal', $item->jenis_bantuan_modal);

            $result->push([
                'jenis_bantuan_modal' => $item->jenis_bantuan_modal,
                'total' => $item->total,
                'tersalur' => is_null($filterTersalur) ? 0 : $filterTersalur->tersalur,
                'sisa' => is_null($filterTersalur) ? $item->total : $item->total - $filterTersalur->tersalur,
            ]);
        });

        return $result;
    }

    private function all($tahun_anggaran = null,$sumber_dana = null)
    {
        return KpmBantuanModal::query()
            ->select([
                'jenis_bantuan_modal',
            ])
            ->selectRaw('count(id) as total')
            ->when(is_null($tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) use ($tahun_anggaran) {
                return $q->whereTahunAnggaran($tahun_anggaran);
            })
            ->when(is_null($sumber_dana) || ($sumber_dana=='All'), function ($q) {
                return $q->whereIn('sumber_dana',['Dinas Sosial','Baznas','BSP']);
            }, function ($q) use ($sumber_dana){
                return $q->whereSumberDana($sumber_dana);
            })
            ->where('status_aktif', 1)
            ->groupBy(['jenis_bantuan_modal'])
            ->get();
    }

    private function tersalur($tahun_anggaran = null,$sumber_dana = null)
    {
        return DB::table('kpm_bantuan_modals as a')
            ->join('transaksi_bantuan_modals as b', 'a.id', '=', 'b.id_kpm')
            ->select('a.jenis_bantuan_modal')
            ->selectRaw('count(a.id) as tersalur')
            ->where('b.deleted_at', null)
            ->where('status_aktif', 1)
            ->when(is_null($tahun_anggaran), function ($q) {
                return $q->whereTahunAnggaran(date('Y'));
            }, function ($q) use ($tahun_anggaran) {
                return $q->whereTahunAnggaran($tahun_anggaran);
            })
            ->when(is_null($sumber_dana)|| ($sumber_dana=='All'), function ($q) {
                return $q->whereIn('sumber_dana',['Dinas Sosial','Baznas','BSP']);
            }, function ($q) use ($sumber_dana){
                return $q->whereSumberDana($sumber_dana);
            })
            ->groupBy('a.jenis_bantuan_modal')
            ->get();
    }

    public static function monthName($value)
    {
        $monthName = [
            '1' => 'JANUARI',
            '2' => 'FEBRUARI',
            '3' => 'MARET',
            '4' => 'APRIL',
            '5' => 'MEI',
            '6' => 'JUNI',
            '7' => 'JULI',
            '8' => 'AGUSTUS',
            '9' => 'SEPTEMBER',
            '10' => 'OKTOBER',
            '11' => 'NOVEMBER',
            '12' => 'DESEMBER',
        ];

        return $monthName[$value];
    }
}
