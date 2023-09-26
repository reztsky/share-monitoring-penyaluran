<?php

namespace App\Http\Controllers\BltBantuanModal;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiBantuanModalRequest;
use App\Models\KpmBantuanModal;
use App\Models\TransaksiBantuanModal;
use App\Services\BantuanModal\UploadFotoBantuanModalService;
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
        $validated=$request->safe()->except('foto_pemberian');
        $validated['foto_pemberian']=UploadFotoBantuanModalService::upload($request->foto_pemberian,$request->id_kpm);
        
        $transaksiBltModal=TransaksiBantuanModal::updateOrCreate(['id_kpm'=>$request->id_kpm],$validated);
        
        return redirect()->route('bantuanmodal.transaksi.index')->with('notifikasi','Sukses Menambahkan Data');
    }

    public function softDelete($id){
        $transaksiBlt=TransaksiBantuanModal::findOrFail($id);
        UploadFotoBantuanModalService::deleteFotoIfExist($transaksiBlt->id_kpm);
        $transaksiBlt->delete();

        return redirect()->route('bantuanmodal.transaksi.index')->with('notifikasi','Sukses Menghapus Data');
    }
}
