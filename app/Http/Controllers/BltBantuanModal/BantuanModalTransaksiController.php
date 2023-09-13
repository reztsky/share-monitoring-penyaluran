<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiBantuanModalRequest;
use App\Models\KpmBantuanModal;
use App\Models\TransaksiBantuanModal;
use App\Services\BantuanModal\UploadFotoBantuanModalService;
use Illuminate\Http\Request;

class BantuanModalTransaksiController extends Controller
{
    public function index(){
        return view('bantuanModal.transaksi.index');
    }

    public function find(Request $request){
        $request->validate([
            'id_kpm'=>'required|numeric'
        ]);

        return redirect()->route('bantuanmodal.transaksi.create',$request->id_kpm);
    }

    public function create($id_kpm){
        $kpm=KpmBantuanModal::with('transaksi')->findKpm($id_kpm)->get()->first();
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
