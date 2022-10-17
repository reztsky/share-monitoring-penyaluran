<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransaksiRequest;
use App\Models\KpmBlt;
use App\Models\TransaksiBlt;
use App\Services\Transaksi\UploadFotoService;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        return view('transaksi.transaksi');
    }

    public function show(Request $request){
        $validated=$request->validate([
            'id_kpm'=>'required|numeric|min:1'
        ]);

        $kpmBlt=KpmBlt::with('transaksi')->whereId($validated['id_kpm'])->orWhere('nik',$validated['id_kpm'])->get()->first();
        
        abort_if(is_null($kpmBlt),'404', 'Not Found');

        return view('transaksi.show',compact('kpmBlt'));
    }

    public function store(StoreTransaksiRequest $request){
        $validated=$request->safe()->except('foto_pengambilan');
        $validated['foto_pengambilan']=UploadFotoService::upload($request->foto_pengambilan,$request->id_kpm);
        
        $transaksiBlt=TransaksiBlt::updateOrCreate(['id_kpm'=>$request->id_kpm],$validated);
        
        return redirect()->route('transaksi.index')->with('notifikasi','Sukses Menambahkan Data');
    }
}
