<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonitoringRequest;
use App\Http\Requests\UpdateMonitoringRequest;
use App\Models\DetailMonitoringCuciKendaraan;
use App\Models\DetailMonitoringLaundry;
use App\Models\DetailMonitoringMenjahit;
use App\Models\DetailMonitoringStarling;
use App\Models\DetailMonitoringTokel;
use App\Models\DetailMonitoringWarungKopi;
use App\Models\KpmBantuanModal;
use App\Models\TransaksiMonitoring;
use App\Services\Monitoring\FotoMonitoringService;
use App\Services\Monitoring\ItemTokelService;
use App\Services\Monitoring\ItemWarkop_KopKelService;
use App\Services\Monitoring\DashboardMonitoringService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MonitoringBantuanModalController extends Controller
{
    private $view = 'monitoringBantuanModal.transaksi.';

    private $arrayMonitoring = [
        'inserted_by',
        'id_kpm_modal',
        'alamat_tempat_usaha',
        'jenis_bantuan_modal',
        'no_hp',
        // Pengelolaan Usaha
        'status_penggunaan_bantuan',
        'pengelolaan_usaha',
        'bentuk_usaha',
        'penggunaan_bantuan',
        'alasan_penggunaan_bantuan',
        // Hasil Usaha
        'penghasilan_sebulan',
        'kegunaan_hasil_usaha',
        // Lain Lain
        'kendala',
        'harapan',
        'dokumentasi',
    ];

    public function index(Request $request)
    {
        $user = Auth::user();
        $monitorings=TransaksiMonitoring::insertBy($user)->search($request)->with(['kpm','user'])->paginate(15)->withQueryString();
        return view($this->view . 'index',compact('monitorings'));
    }

    public function show($id)
    {
        $monitoring = TransaksiMonitoring::with(['kpm'])->findOrFail($id);
        if ($monitoring->getRawOriginal('status_penggunaan_bantuan') == 1) {
            $detail = $monitoring->detail($monitoring->jenis_bantuan_modal)->get()->first();
            return view($this->view . 'show', compact('monitoring', 'detail'));
        }

        return view($this->view . 'show', compact('monitoring'));
    }

    public function create()
    {
        return view($this->view . 'create');
    }

    public function store(StoreMonitoringRequest $request, FotoMonitoringService $fotoMonitoringService)
    {
        // Retrive Form Input
        $formTransaksiMonitoring = $request->safe()->only($this->arrayMonitoring);
        $detailMonitoring = $request->safe()->except($this->arrayMonitoring);

        // Create Transaksi Monitoring
        $formTransaksiMonitoring['dokumentasi'] = $fotoMonitoringService->upload($request->dokumentasi);
        $transaksiMonitoring = TransaksiMonitoring::create($formTransaksiMonitoring);

        // Create Detail Transaksi
        if ($request->status_penggunaan_bantuan == 1) {
            $formDetailMonitoring = array_merge($detailMonitoring, ['id_transaksi' => $transaksiMonitoring->id]);
            $detailMonitoring = $this->storeDetailByJenisBantuanModal($request->jenis_bantuan_modal, $formDetailMonitoring);
        }

        return redirect()->route('bantuanmodal.monitoring.index')->with('notifikasi', 'Sukses Menambahkan Data');
    }

    public function edit($id)
    {
        $monitoring = TransaksiMonitoring::with(['kpm'])->findOrFail($id);
        $detail = $monitoring->detail($monitoring->jenis_bantuan_modal)->get()->first();

        if ($monitoring->radio_penggunaan_bantuan == 1) {
            $detail = $monitoring->detail($monitoring->jenis_bantuan_modal)->get()->first();
            return view($this->view . 'edit', compact('monitoring', 'detail'));
        }

        return view($this->view . 'edit', compact('monitoring','detail'));
    }

    public function update($id, UpdateMonitoringRequest $request, FotoMonitoringService $fotoMonitoringService)
    {
        // Retrive Form Input
        $formTransaksiMonitoring = $request->safe()->only($this->arrayMonitoring);
        $formDetailMonitoring = $request->safe()->except($this->arrayMonitoring);

        // Get Monitoring
        $monitoring = TransaksiMonitoring::findOrFail($id);

        // Check If Has Upload Dokumentasi & Upload It
        if ($request->has('dokumentasi')) {
            $fotoMonitoringService->delete($monitoring->dokumentasi);
            $formTransaksiMonitoring['dokumentasi'] = $fotoMonitoringService->upload($request->dokumentasi);
        }

        //  Update Monitoring
        $monitoring->update($formTransaksiMonitoring);

        // Get Detail Monitoring & Update It
        $detail = $monitoring->detail($monitoring->jenis_bantuan_modal)->update($formDetailMonitoring);

        return redirect()->route('bantuanmodal.monitoring.index')->with('notifikasi', 'Sukses Mengubah Data');
    }

    public function delete($id, FotoMonitoringService $fotoMonitoringService)
    {
        $monitoring = TransaksiMonitoring::findOrFail($id);
        $monitoring->delete();

        return redirect()->route('bantuanmodal.monitoring.index')->with('notifikasi', 'Sukses Menghapus Data');
        // $fotoMonitoringService->delete($monitoring->dokumentasi);
        // $detail=$monitoring->detail($monitoring->jenis_bantuan_modal)->get()->first();
        // $detail->delete();
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
            $items = ItemWarkop_KopKelService::getItem();
            return view($this->view . 'form.hasilUsaha.kopi_keliling')->with([
                'jenis_bantuan_modal' => $kpm->jenis_bantuan_modal,
                'items' => $items,
            ])->render();
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
            $items = ItemWarkop_KopKelService::getItem();
            return view($this->view . 'form.hasilUsaha.warung_kopi')->with([
                'jenis_bantuan_modal' => $kpm->jenis_bantuan_modal,
                'items' => $items,
            ])->render();
        }
    }
}
