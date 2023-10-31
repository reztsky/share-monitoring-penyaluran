<?php

namespace App\Http\Controllers\BltBantuanModal;

use App\Http\Controllers\Controller;
use App\Services\BantuanModal\DashboardBantuanModalService;
use App\Services\BantuanModal\DetailDashboardBantuanModalService;
use App\Services\Settings\SumberDanaServices;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Http\Request;

class BantuanModalHomeController extends Controller
{
    public function index(Request $request,DashboardBantuanModalService $dashboardBantuanModal){
        $rekap=$dashboardBantuanModal->rekapTable($request->tahun_anggaran,$request->sumber_dana);
        $tahun_anggaran=TahunAnggaranServices::tahunAnggaranAktif();
        return view('bantuanModal.dashboard.index',compact('rekap','tahun_anggaran'));
    }

    public function detail($tahun_anggaran,$jenis_bantuan,$kategori,$sumber_dana){
        $details=(new DetailDashboardBantuanModalService($tahun_anggaran,$jenis_bantuan,$kategori,$sumber_dana))->detail();
        return view('bantuanModal.dashboard.detail',compact('details','kategori'));
    }
}
