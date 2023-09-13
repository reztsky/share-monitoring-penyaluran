<?php

namespace App\Http\Controllers\BltTunai;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransaksiRequest;
use App\Models\KpmBlt;
use App\Models\TransaksiBlt;
use App\Services\Transaksi\UploadFotoService;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        return view('blt.transaksi.transaksi');
    }

    
    public function find(Request $request){
        $validated=$request->validate([
            'id_kpm'=>'required|numeric|min:1'
        ]);
        
        return redirect()->route('blt.transaksi.show',['id'=>$request->id_kpm]);
    }

    public function show($id){
        $kpmBlt=KpmBlt::with('transaksi')->whereId($id)->orWhere('nik',$id)->tahunAktif()->get()->first();
        
        abort_if(is_null($kpmBlt),'404', 'Not Found');

        return view('blt.transaksi.show',compact('kpmBlt'));
    }

    public function store(StoreTransaksiRequest $request){
        $validated=$request->safe()->except('foto_pengambilan');
        $validated['foto_pengambilan']=UploadFotoService::upload($request->foto_pengambilan,$request->id_kpm);
        
        $transaksiBlt=TransaksiBlt::updateOrCreate(['id_kpm'=>$request->id_kpm],$validated);
        
        return redirect()->route('blt.transaksi.index')->with('notifikasi','Sukses Menambahkan Data');
    }

    public function softDelete($id){
        $transaksiBlt=TransaksiBlt::findOrFail($id);
        UploadFotoService::deleteFotoIfExist($transaksiBlt->id_kpm);
        $transaksiBlt->delete();

        return redirect()->route('blt.transaksi.index')->with('notifikasi','Sukses Menghapus Data');
    }
}
