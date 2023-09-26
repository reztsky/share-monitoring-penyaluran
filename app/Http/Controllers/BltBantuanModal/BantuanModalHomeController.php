<?php

namespace App\Http\Controllers\BltBantuanModal;

use App\Http\Controllers\Controller;
use App\Services\BantuanModal\DashboardBantuanModalService;
use App\Services\BantuanModal\DetailDashboardBantuanModalService;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Http\Request;

class BantuanModalHomeController extends Controller
{
    public function index(Request $request,DashboardBantuanModalService $dashboardBantuanModal){
        $rekap=$dashboardBantuanModal->rekapTable($request->tahun_anggaran);
        $tahun_anggaran=TahunAnggaranServices::tahunAnggaranAktif();
        return view('bantuanModal.dashboard.index',compact('rekap','tahun_anggaran'));
    }

    public function detail($tahun,$jenis_bantuan,$kategori){
        $details=(new DetailDashboardBantuanModalService($tahun,$jenis_bantuan,$kategori))->detail();
        return view('bantuanModal.dashboard.detail',compact('details','kategori'));
    }
}
