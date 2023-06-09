<?php

namespace App\Http\Controllers;

use App\Services\BantuanModal\DashboardBantuanModalService;
use App\Services\BantuanModal\DetailDashboardBantuanModalService;
use Illuminate\Http\Request;

class BantuanModalHomeController extends Controller
{
    public function index(DashboardBantuanModalService $dashboardBantuanModal){
        $rekap=$dashboardBantuanModal->rekapTable();
        // dd($rekap);
        return view('bantuanModal.dashboard.index',compact('rekap'));
    }

    public function detail($jenis_bantuan,$kategori){
        $details=(new DetailDashboardBantuanModalService($jenis_bantuan,$kategori))->detail();
        return view('bantuanModal.dashboard.detail',compact('details','kategori'));
    }
}
