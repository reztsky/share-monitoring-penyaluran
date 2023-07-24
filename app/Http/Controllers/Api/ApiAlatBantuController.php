<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\AlatBantuServices;
use Illuminate\Http\Request;

class ApiAlatBantuController extends Controller
{
    public function index(Request $request,AlatBantuServices $alatBantuServices){
        $rekaps=$alatBantuServices->rekap($request);
        $cek=count($rekaps);
        return response()->json([
            'status'=>$cek>0 ? true : false,
            'message'=>$cek>0 ? 'Sukses Get Data' : 'Gagal Get Data',
            'data'=>$rekaps
        ]);
    }

    public function detailPenyaluran($jenis_bantuan,Request $request,AlatBantuServices $alatBantuServices){
        $results=$alatBantuServices->findPenyaluranById($request,$jenis_bantuan);
        return response()->json([
            'status'=>true,
            'message'=>'Sukses Get Data',
            'data'=>$results
        ]);
    }

    public function detailPengajuan($jenis_bantuan,Request $request,AlatBantuServices $alatBantuServices){
        $results=$alatBantuServices->findPengajuanById($request,$jenis_bantuan);
        return response()->json([
            'status'=>true,
            'message'=>'Sukses Get Data',
            'data'=>$results
        ]);
    }
}
