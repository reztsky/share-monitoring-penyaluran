<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsulanBanmod\storeUsulanBanmod;
use App\Models\DaftarKpmBanmodAll;
use App\Models\KpmBantuanModal;
use App\Models\UsulanDbhcht;
use App\Services\UsulanBanmod\CekKpm;
use App\Services\UsulanBanmod\JenisBantuanModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsulanDbhchtController extends Controller
{
    public function index(){
        $user=Auth::user();
        $count_dashboard=UsulanDbhcht::dashboard()->filterByKelurahan($user)->get();
        $jenisBanmods=JenisBantuanModal::jenisBanmod();
        return view('usulanBanmod.index',compact('count_dashboard','jenisBanmods'));
    }

    public function detail(Request $request){
        $jenis_bantuan_modal=$request->jenis_bantuan_modal;
        $user=Auth::user();
        $usulans=UsulanDbhcht::search($request->keyword)->select([
            'nik',
            'nama',
            'no_kk',
            'alamat',
            'jenis_bantuan_modal'
        ])->filterByKelurahan($user)->where('jenis_bantuan_modal',$jenis_bantuan_modal)->paginate(10)->withQueryString();
        return view('usulanBanmod.detail',compact('usulans','jenis_bantuan_modal'));
    }

    public function create(){
        $jenisBanmods=JenisBantuanModal::jenisBanmod();
        return view('usulanBanmod.create',compact('jenisBanmods'));
    }

   public function cekGakin($nik,CekKpm $cekKpm){
        $user=Auth::user();
        return $cekKpm->cekKpm($nik,$user);
   }

   public function store(storeUsulanBanmod $request){
        $cek=UsulanDbhcht::cekData($request)->count();
        $cek_2022=DaftarKpmBanmodAll::cekData($request)->count();

        if($cek>0) return redirect()->route('usulan_dbhcht.create')->with('notifikasi_gagal','Gagal Mengusulan : KPM / Anggota Keluarga Sudah Diusulkan');
        if($cek_2022>0) return redirect()->route('usulan_dbhcht.create')->with('notifikasi_gagal','Gagal Mengusulan : KPM Sudah Pernah Menerima Bantuan Modal');

        $usulanDbhcht=UsulanDbhcht::create($request->validated());
        if($usulanDbhcht){
            return redirect()->route('usulan_dbhcht.create')->with('notifikasi','Sukses Mengusulkan KPM');
        }
   }

   public function delete(Request $request){
        $usulanDbhcht=usulanDbhcht::whereNik($request->nik)->get()->first();
        $usulanDbhcht->delete();
        if($usulanDbhcht){
            return redirect()->route('usulan_dbhcht.create')->with('notifikasi','Sukses Menghapus Usulan KPM');
        }
   }
}
