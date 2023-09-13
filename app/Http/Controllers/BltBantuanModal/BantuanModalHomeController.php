<?php

namespace App\Http\Controllers\BltBantuanModal;

use App\Http\Controllers\Controller;
use App\Services\BantuanModal\DashboardBantuanModalService;
use App\Services\BantuanModal\DetailDashboardBantuanModalService;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Http\Request;

class BantuanModalHomeController extends Controller
{
    public function index(DashboardBantuanModalService $dashboardBantuanModal){
        $rekap=$dashboardBantuanModal->rekapTable();
        $tahun_anggaran=TahunAnggaranServices::tahunAnggaranAktif();
        return view('bantuanModal.dashboard.index',compact('rekap','tahun_anggaran'));
    }

    public function detail($jenis_bantuan,$kategori){
        $details=(new DetailDashboardBantuanModalService($jenis_bantuan,$kategori))->detail();
        return view('bantuanModal.dashboard.detail',compact('details','kategori'));
    }
}
