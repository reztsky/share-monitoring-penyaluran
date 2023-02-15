<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonitoringRequest;
use App\Models\DetailMonitoringCuciKendaraan;
use App\Models\DetailMonitoringLaundry;
use App\Models\DetailMonitoringMenjahit;
use App\Models\DetailMonitoringStarling;
use App\Models\DetailMonitoringTokel;
use App\Models\DetailMonitoringWarungKopi;
use App\Models\KpmBantuanModal;
use App\Models\TransaksiMonitoring;
use App\Services\Monitoring\ItemTokelService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitoringBantuanModalController extends Controller
{
    private $view = 'monitoringBantuanModal.';
    private $arrayMonitoring = [
        'inserted_by',
        'id_kpm_modal',
        'alamat_tempat_usaha',
        'jenis_bantuan_modal',
        'no_hp',
        // Pengelolaan Usaha
        'pengelolaan_usaha',
        'bentuk_usaha',
        'penggunaan_bantuan',
        'alasan_pengunaan_bantuan',
        // Hasil Usaha
        'penghasilan_sebulan',
        'kegunaan_hasil_usaha',
        // Lain Lain
        'kendala',
        'harapan',
    ];


    public function index()
    {
        $user=Auth::user();
        $monitorings=TransaksiMonitoring::insertBy($user->id)->with('kpm')->paginate(15);
        return view($this->view . 'index',compact('monitorings'));
    }

    public function show($id){
        // $monitoring=TransaksiMonitoring::with('kpm')->findOrFail($id)->
        return view($this->view.'show');
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreMonitoringRequest $request)
    {
        // Retrive Form Input
        $formTransaksiMonitoring = $request->safe()->only($this->arrayMonitoring);
        $detailMonitoring = $request->safe()->except($this->arrayMonitoring);

        // Create Transaksi Monitoring
        $transaksiMonitoring = TransaksiMonitoring::create($formTransaksiMonitoring);

        // Create Detail Transaksi
        $formDetailMonitoring = array_merge($detailMonitoring, ['id_transaksi'=> $transaksiMonitoring->id]);
        $detailMonitoring = $this->storeDetailByJenisBantuanModal($request->jenis_bantuan_modal, $formDetailMonitoring);

        return redirect()->route('bantuanmodal.monitoring.index')->with('notifikasi','Sukses Menambahkan Data');
    }

    public function edit($id)
    {
    }

    public function update($id, Request $request)
    {
    }

    public function delete($id)
    {
    }

    public function find($nik)
    {
        $kpm = KpmBantuanModal::findKpm($nik)->get()->first();
        if (is_null($kpm)) return response()->json(['data' => $kpm], 200);
        $template = $this->caseJenisBantaunModal($kpm);
        return response()->json(['data' => $kpm, 'template' => $template], 200);
    }

    private function storeDetailByJenisBantuanModal($jenis_bantuan_modal, $form)
    {
        if ($jenis_bantuan_modal == 'MENJAHIT') {
            return DetailMonitoringMenjahit::create($form);
        }

        if ($jenis_bantuan_modal == 'CUCI KENDARAAN') {
            return DetailMonitoringCuciKendaraan::create($form);
        }

        if ($jenis_bantuan_modal == 'KOPI KELILING') {
            return DetailMonitoringStarling::create($form);
        }

        if ($jenis_bantuan_modal == 'LAUNDRY') {
            return DetailMonitoringLaundry::create($form);
        }

        if ($jenis_bantuan_modal == 'TOKO KELONTONG') {
            return DetailMonitoringTokel::create($form);
        }

        if ($jenis_bantuan_modal == 'WARUNG KOPI') {
            return DetailMonitoringWarungKopi::create($form);
        }
    }

    private function caseJenisBantaunModal($kpm)
    {
        if ($kpm->jenis_bantuan_modal == 'MENJAHIT') {
            return view($this->view . 'form.hasilUsaha.menjahit')->with('jenis_bantuan_modal', $kpm->jenis_bantuan_modal)->render();
        }

        if ($kpm->jenis_bantuan_modal == 'CUCI KENDARAAN') {
            return view($this->view . 'form.hasilUsaha.cuci_kendaraan')->with('jenis_bantuan_modal', $kpm->jenis_bantuan_modal)->render();
        }

        if ($kpm->jenis_bantuan_modal == 'KOPI KELILING') {
            return view($this->view . 'form.hasilUsaha.kopi_keliling')->with('jenis_bantuan_modal', $kpm->jenis_bantuan_modal)->render();
        }

        if ($kpm->jenis_bantuan_modal == 'LAUNDRY') {
            return view($this->view . 'form.hasilUsaha.laundry')->with('jenis_bantuan_modal', $kpm->jenis_bantuan_modal)->render();
        }

        if ($kpm->jenis_bantuan_modal == 'TOKO KELONTONG') {
            $items = ItemTokelService::getItem();
            return view($this->view . 'form.hasilUsaha.toko_kelontong')->with([
                'jenis_bantuan_modal' => $kpm->jenis_bantuan_modal,
                'items' => $items
            ])->render();
        }

        if ($kpm->jenis_bantuan_modal == 'WARUNG KOPI') {
            return view($this->view . 'form.hasilUsaha.warung_kopi')->with('jenis_bantuan_modal', $kpm->jenis_bantuan_modal)->render();
        }
    }
}
