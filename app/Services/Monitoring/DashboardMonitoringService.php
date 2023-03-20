<?php

namespace App\Services\Monitoring;

use App\Models\TransaksiMonitoring;
use Illuminate\Support\Facades\DB;

class DashboardMonitoringService
{

    public $request;
    public $user;

    public function __construct($request, $user)
    {
        $this->request = $request;
        $this->user = $user;
    }

    public function rekapTable()
    {
        $monitorings = $this->getMonitorings();
        $penghasilans=$this->getPenghasilans($monitorings->pluck('id_kpm_modal'));
        $monitorings->put('penghasilan_sebulan',$penghasilans);
        return $monitorings;
    }

    private function getMonitorings()
    {
        return TransaksiMonitoring::insertBy($this->user)
            ->month($this->request)
            ->search($this->request)
            ->with(['kpm', 'user'])
            ->paginate(15)
            ->withQueryString();
    }

    private function getPenghasilans($id_kpm_modals)
    {
        return TransaksiMonitoring::select(['id_kpm_modal', 'penghasilan_sebulan','periode_monitoring as bulan'])
            ->whereIn('id_kpm_modal',$id_kpm_modals)
            ->where('tahun_monitoring',date("Y"))
            ->groupBy(
                'id_kpm_modal',
                'periode_monitoring',
                'penghasilan_sebulan',
                'tahun_monitoring'
            )
            ->orderBy('periode_monitoring')
            ->orderBy('tahun_monitoring')
            ->get();
    }
}
