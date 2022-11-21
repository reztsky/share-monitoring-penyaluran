<?php

namespace App\Http\Controllers;

use App\Services\Home\DashboardService;
use App\Services\Home\DetailService;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $dashboardService=new DashboardService();
        $chartKecamatan=$dashboardService->chartByKecamatan();
        $chartTersalur=$dashboardService->chartTersalur();
        $buruhPabrik=$dashboardService->getBuruhCount()->toArray();
        $masyarakatUmum=$dashboardService->getMasyarakatUmumCount()->toArray();
        
        return view('home.home',compact('chartTersalur','chartKecamatan','buruhPabrik','masyarakatUmum'));
    }

    public function detail(Request $request){
        $detailService=new DetailService($request->kecamatan,$request->jenis);
        $result=$detailService->detail();
        // dd($result);
        return view('home.detail',compact('result'));
    }
}
