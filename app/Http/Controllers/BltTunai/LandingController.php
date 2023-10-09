<?php

namespace App\Http\Controllers\BltTunai;

use App\Http\Controllers\Controller;
use App\Models\KpmBlt;
use App\Services\Home\BuruhPabrikService;
use App\Services\Home\DashboardService;
use App\Services\Home\DetailService;
use App\Services\Home\MasyarakatUmumService;
use App\Services\Settings\TahunAnggaranServices;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request){
        $tahun_anggaran=$request->tahun_anggaran;
        $tahap=$request->tahap;
        $dashboardService=new DashboardService();
        $buruhPabrikService=new BuruhPabrikService();
        $masyarakatUmumService=new MasyarakatUmumService();

        $chartTersalur=$dashboardService->chartTersalur($tahun_anggaran,$tahap);
        $buruhPabriks=$buruhPabrikService->rekap($tahun_anggaran,$tahap);
        $masyarakatUmum=$masyarakatUmumService->rekap($tahun_anggaran,$tahap);
        $tahap_max=KpmBlt::selectRaw('max(tahap) as tahap')->where('tahun_anggaran', date('Y'))->get()->first();

        return view('blt.dashboard.home',compact('chartTersalur','masyarakatUmum','buruhPabriks','tahap_max'));
    }

    public function detail(Request $request){
        $detailService=new DetailService($request->lokasi,$request->jenis,$request->statuskpm,$request->tahun_anggaran,$request->tahap,$request->keyword);
        $result=$detailService->detail();
        
        return view('blt.dashboard.detail',compact('result'));
    }
}
