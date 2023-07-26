<?php

namespace App\Http\Controllers;

use App\Models\KpmBantuanModal;
use Illuminate\Support\Facades\Auth;
use App\Services\Monitoring\DashboardMonitoringService;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class ReportMonitoringBantuanModalController extends Controller
{
    private $view = 'monitoringBantuanModal.dashboard.';

    public function index(Request $request)
    {
        $user = Auth::user();
        $DashboardMonitoringService = new DashboardMonitoringService($request, $user);
        $monitorings=$DashboardMonitoringService->rekapTable();
        return view($this->view . 'index', compact('monitorings'));
    }


    public function excel(){
        $kpm=KpmBantuanModal::all();
        return (new FastExcel($kpm))->download('cobha.xlsx');
    }
   
}
