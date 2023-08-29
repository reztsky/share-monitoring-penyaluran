<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsulanBanmod\storeUsulanBanmod;
use App\Http\Requests\UsulanBanmod\updateUsulanBanmod;
use App\Models\DaftarKpmBanmodAll;
use App\Models\KpmBantuanModal;
use App\Models\KuotaKelurahan;
use App\Models\UsulanDbhcht;
use App\Services\UsulanBanmod\CekKpm;
use App\Services\UsulanBanmod\JenisBantuanModal;
use App\Services\UsulanBanmod\KuotaTersedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsulanDbhchtController extends Controller
{
    public function index(Request $request)
    {
        $usulans = UsulanDbhcht::filterByJenisBanmod($request)->search($request)->showDataByRole(Auth::user())->paginate(10)->withQueryString();
        $jenisBanmods = JenisBantuanModal::jenisBanmod()->pluck('jenis_bantuan_modal');
        return view('usulanBanmod.index', compact('usulans','jenisBanmods'));
    }

    public function create()
    {
        $jenisBanmods = JenisBantuanModal::jenisBanmod();
        return view('usulanBanmod.create', compact('jenisBanmods'));
    }

    public function store(storeUsulanBanmod $request)
    {
        $cek = UsulanDbhcht::cekData($request)->count();
        $cek_2022 = DaftarKpmBanmodAll::cekData($request)->count();
        $cek_kuota=(new KuotaTersedia(Auth::user()))->kuota();

        if ($cek > 0) return redirect()->route('usulan_dbhcht.index')->with('notifikasi_gagal', 'Gagal Mengusulan : KPM / Anggota Keluarga Sudah Diusulkan');
        if ($cek_2022 > 0) return redirect()->route('usulan_dbhcht.index')->with('notifikasi_gagal', 'Gagal Mengusulan : KPM Sudah Pernah Menerima Bantuan Modal');
        if ($cek_kuota == 0) return redirect()->route('usulan_dbhcht.index')->with('notifikasi_gagal', 'Gagal Mengusulan : Kuota Sudah Tidak Tersedia');

        $usulanDbhcht = UsulanDbhcht::create($request->validated());
        if (!$usulanDbhcht)  return redirect()->route('usulan_dbhcht.index')->with('notifikasi_gagal', 'Gagal Mengusulan : Error Database !');

        $kuota_kel=KuotaKelurahan::where([
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan
        ])->first();

        $update_kuota_kel=$kuota_kel->update([
            'kuota_sisa'=>$kuota_kel->kuota_sisa-1
        ]);

        if($update_kuota_kel){
            return redirect()->route('usulan_dbhcht.index')->with('notifikasi', 'Sukses Mengusulkan KPM');
        }

    }

    public function edit($id)
    {
        $usulan = UsulanDbhcht::findOrFail($id);
        $jenisBanmods = JenisBantuanModal::jenisBanmod();
        return view('usulanBanmod.edit', compact('usulan', 'jenisBanmods'));
    }

    public function update(updateUsulanBanmod $request, $id)
    {
        $usulan = UsulanDbhcht::findOrFail($id)->update($request->validated());
        if ($usulan) {
            return redirect()->route('usulan_dbhcht.index')->with('notifikasi', 'Sukses Mengupdate KPM');
        }
    }

    public function delete(Request $request)
    {
        $usulanDbhcht = usulanDbhcht::findOrFail($request->id);
        $usulanDbhcht->delete();
        if ($usulanDbhcht) {
            return redirect()->route('usulan_dbhcht.index')->with('notifikasi', 'Sukses Menghapus Usulan KPM');
        }
    }

    public function cekGakin($nik, CekKpm $cekKpm)
    {
        $user = Auth::user();
        return $cekKpm->cekKpm($nik, $user);
    }

    public function cekKuota()
    {
        return (new KuotaTersedia(Auth::user()))->kuota();
    }

    public function dashboard()
    {
        $user = Auth::user();
        $count_dashboard = UsulanDbhcht::dashboard()->filterByKelurahan($user)->get();
        $jenisBanmods = JenisBantuanModal::jenisBanmod();
        return view('usulanBanmod.dashboard.index', compact('count_dashboard', 'jenisBanmods'));
    }

    public function detail(Request $request)
    {
        $jenis_bantuan_modal = $request->jenis_bantuan_modal;
        $user = Auth::user();
        $usulans = UsulanDbhcht::search($request)->select([
            'nik',
            'nama',
            'no_kk',
            'alamat',
            'jenis_bantuan_modal'
        ])->filterByKelurahan($user)->where('jenis_bantuan_modal', $jenis_bantuan_modal)->paginate(10)->withQueryString();
        return view('usulanBanmod.dashboard.detail', compact('usulans', 'jenis_bantuan_modal'));
    }
}
