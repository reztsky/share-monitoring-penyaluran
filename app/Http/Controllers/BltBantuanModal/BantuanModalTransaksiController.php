<?php

namespace App\Http\Controllers\BltBantuanModal;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiBantuanModalRequest;
use App\Models\KpmBantuanModal;
use App\Models\TransaksiBantuanModal;
use App\Services\BantuanModal\UploadFotoBantuanModalService;
use App\Services\BantuanModal\UploadFotoKpmService;
use App\Services\BantuanModal\UploadPdfBantuanModalServices;
use App\Services\Pelayanan\Pengajuan\UploadFotoService;
use Illuminate\Http\Request;

class BantuanModalTransaksiController extends Controller
{
    public function index(){
        $tahap_max=KpmBantuanModal::selectRaw('max(tahap) as tahap')->where('tahun_anggaran',date('Y'))->get()->first();
        return view('bantuanModal.transaksi.index',compact('tahap_max'));
    }

    public function find(Request $request){
        $years=[date('Y')];
        $validated=$request->validate([
            'tahun_anggaran'=>'required|numeric|digits:4|in:'.implode(',',$years),
            'tahap'=>'required|numeric|min:1',
            'key'=>'required|numeric|min:1',
        ]);

        return redirect()->route('bantuanmodal.transaksi.create',[
            'tahun'=>$request->tahun_anggaran,
            'tahap'=>$request->tahap,
            'key'=>$request->key
        ]);
    }

    public function create($tahun,$tahap,$key){
        $keywords=[
            'tahun_anggaran'=>$tahun,
            'tahap'=>$tahap,
            'key'=>$key
        ];
        $kpm=KpmBantuanModal::with('transaksi')->search($keywords)->get()->first();
        abort_if(is_null($kpm),'404', 'Not Found');
        return view('bantuanModal.transaksi.create',compact('kpm'));
    }

    public function store(StoreTransaksiBantuanModalRequest $request){
        $validated=$request->safe()->except(['foto_pemberian','ba_kpm','ba_kecamatan','foto_kpm']);
        
        $validated['ba_kpm']=UploadPdfBantuanModalServices::uploadPdf($request->id_kpm,$request->ba_kpm,'KPM');
        $validated['ba_kecamatan']=UploadPdfBantuanModalServices::uploadPdf($request->id_kpm,$request->ba_kecamatan,'Kecamatan');
        $validated['foto_pemberian']=UploadFotoBantuanModalService::upload($request->foto_pemberian,$request->id_kpm);
        $validated['foto_kpm']=UploadFotoKpmService::upload($request->foto_kpm,$request->id_kpm);
        
        $transaksiBltModal=TransaksiBantuanModal::updateOrCreate(['id_kpm'=>$request->id_kpm],$validated);
        
        
        return redirect()->route('bantuanmodal.transaksi.index')->with('notifikasi','Sukses Menambahkan Data');
    }

    public function softDelete($id){
        $transaksiBlt=TransaksiBantuanModal::findOrFail($id);
        UploadFotoBantuanModalService::deleteFotoIfExist($transaksiBlt->id_kpm);
        UploadFotoKpmService::deleteFotoIfExist($transaksiBlt->id_kpm);
        UploadPdfBantuanModalServices::deletePdfIfExist($transaksiBlt->id_kpm,'KPM');
        UploadPdfBantuanModalServices::deletePdfIfExist($transaksiBlt->id_kpm,'Kecamatan');
        $transaksiBlt->delete();

        return redirect()->route('bantuanmodal.transaksi.index')->with('notifikasi','Sukses Menghapus Data');
    }
}
