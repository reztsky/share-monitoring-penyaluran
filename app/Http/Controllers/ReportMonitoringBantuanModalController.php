<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Services\Monitoring\DashboardMonitoringService;
use Illuminate\Http\Request;

class ReportMonitoringBantuanModalController extends Controller
{
    private $view = 'monitoringBantuanModal.dashboard.';

    public function index(Request $request)
    {
        $user = Auth::user();
        $DashboardMonitoringService = new DashboardMonitoringService($request, $user);
        $reports=$DashboardMonitoringService->rekapTable();
        return view($this->view . 'index', compact('reports'));
    }

   
}
