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
        $tahap_max=KpmBlt::selectRaw('max(tahap) as tahap')->where('tahun_anggaran',date('Y'))->get()->first();
        return view('blt.transaksi.transaksi',compact('tahap_max'));
    }

    
    public function find(Request $request){
        $years=[date('Y')];
        $validated=$request->validate([
            'tahun_anggaran'=>'required|numeric|digits:4|in:'.implode(',',$years),
            'tahap'=>'required|numeric|min:1',
            'key'=>'required|numeric|min:1',
        ]);
        
        return redirect()->route('blt.transaksi.show',[
            'tahun'=>$request->tahun_anggaran,
            'tahap'=>$request->tahap,
            'key'=>$request->key
        ]);
    }

    public function show($tahun,$tahap,$key){

        $keywords=[
            'tahun_anggaran'=>$tahun,
            'tahap'=>$tahap,
            'key'=>$key
        ];

        $kpmBlt=KpmBlt::with('transaksi')->search($keywords)->get()->first();
        
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
