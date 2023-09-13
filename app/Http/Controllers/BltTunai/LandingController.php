<?php

namespace App\Http\Controllers\BltTunai;

use App\Http\Controllers\Controller;
use App\Services\Home\BuruhPabrikService;
use App\Services\Home\DashboardService;
use App\Services\Home\DetailService;
use App\Services\Home\MasyarakatUmumService;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        
        $dashboardService=new DashboardService();
        $buruhPabrikService=new BuruhPabrikService();
        $masyarakatUmumService=new MasyarakatUmumService();

        $chartTersalur=$dashboardService->chartTersalur();
        $buruhPabriks=$buruhPabrikService->rekap();
        $masyarakatUmum=$masyarakatUmumService->rekap();
        $tahun_anggaran=TahunAnggaranServices::tahunAnggaranAktif();

        return view('blt.dashboard.home',compact('chartTersalur','masyarakatUmum','buruhPabriks','tahun_anggaran'));
    }

    public function detail(Request $request){
        $detailService=new DetailService($request->lokasi,$request->jenis,$request->statuskpm);
        $result=$detailService->detail();
        
        return view('blt.dashboard.detail',compact('result'));
    }
}
