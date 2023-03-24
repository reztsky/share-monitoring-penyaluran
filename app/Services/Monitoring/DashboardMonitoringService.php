<?php

namespace App\Services\Monitoring;

use App\Models\TransaksiMonitoring;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardMonitoringService
{

    public $request;
    public $user;
    protected $time;

    public function __construct($request, $user)
    {
        $this->request = $request;
        $this->user = $user;
        $this->time = Carbon::now()->addMinutes(10);
    }

    public function rekapTable()
    {
        $monitorings = $this->getMonitorings();
        $penghasilans = $this->getPenghasilans($monitorings->pluck('id_kpm_modal'));
        $monitorings->put('penghasilan_sebulan', $penghasilans);
        return $monitorings;
    }


    private function getMonitorings()
    {
        return Cache::remember('data_monitorings', $this->time, function () {
            return DB::table('transaksi_monitorings as a')
                ->join('kpm_bantuan_modals as b', 'a.id_kpm_modal', '=', 'b.id')
                ->select([
                    'a.id_kpm_modal',
                    'b.jenis_bantuan_modal',
                    'b.nama',
                ])
                ->groupBy([
                    'a.id_kpm_modal',
                    'b.jenis_bantuan_modal',
                    'b.nama',
                ])
                ->get();
        });
    }

    private function getPenghasilans($id_kpm_modals = [])
    {
        return Cache::remember('data_penghasilans', $this->time, function () {
            return DB::table('transaksi_monitorings')
                ->select(['id_kpm_modal', 'penghasilan_sebulan', 'periode_monitoring as bulan'])
                ->where('tahun_monitoring', date("Y"))
                ->groupBy(
                    'id_kpm_modal',
                    'periode_monitoring',
                    'penghasilan_sebulan',
                    'tahun_monitoring'
                )
                ->get();
        });
    }
}
