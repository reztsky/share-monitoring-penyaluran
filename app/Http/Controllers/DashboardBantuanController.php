<?php

namespace App\Http\Controllers;

use App\Models\MJenisKebutuhan;
use App\Models\PengajuanKebutuhan;
use App\Models\PenyaluranKebutuhan;
use App\Services\Pelayanan\DashboardAlatBantuService;
use Illuminate\Support\Facades\Auth;

class DashboardBantuanController extends Controller
{
    public function index(DashboardAlatBantuService $dashboardAlatBantu)
    {
        $rekaps=$dashboardAlatBantu->rekap();
        return view('pelayananBantuanModal.dashboard.index', compact('rekaps'));
    }
    public function detail(DashboardAlatBantuService $dashboardAlatBantu,$jenis_bantuan,$kategori){
        if($kategori=='PENGAJUAN'){
            $data=$dashboardAlatBantu->pengajuan($jenis_bantuan);
        }else{
            $data=$dashboardAlatBantu->penyaluran($jenis_bantuan);
        }
        // dd($data);
        return view('pelayananBantuanModal.dashboard.detail',compact('data'));
    }
}
