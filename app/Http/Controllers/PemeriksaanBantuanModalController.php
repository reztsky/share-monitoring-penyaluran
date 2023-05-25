<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pelayanan\Pemeriksaan\StorePemeriksaanRequest;
use App\Http\Requests\Pelayanan\Pemeriksaan\UpdatePemeriksaanRequest;
use App\Models\MJenisKebutuhan;
use App\Models\PemeriksaanKebutuhan;
use App\Models\PengajuanKebutuhan;
use App\Models\MKecamatan;
use App\Models\MKelurahan;
use App\Services\Pelayanan\Pemeriksaan\UploadBapService;
use App\Services\Pelayanan\Pemeriksaan\UploadFotoService;
use Illuminate\Http\Request;

class PemeriksaanBantuanModalController extends Controller
{

    public function index(Request $request)
    {
        $pemeriksaan_kebutuhans = PemeriksaanKebutuhan::select(['*'])->with(['pengajuan.kebutuhan'])
            ->paginate(10)
            ->withQueryString();
        
        $jenis_kebutuhans = MJenisKebutuhan::all(['id', 'nama_kebutuhan']);
        return view('pelayananBantuanModal.pemeriksaan.index', compact('pemeriksaan_kebutuhans', 'jenis_kebutuhans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        $pemeriksaan_kebutuhan = PemeriksaanKebutuhan::with('kebutuhan')->findorFail($id);
        return view('pelayananBantuanModal.pemeriksaan.show', compact('pemeriksaan_kebutuhan'));
    }

    public function edit($id)
    {
        $pemeriksaan_kebutuhan = PemeriksaanKebutuhan::with('pengajuan.kebutuhan')->findorFail($id);
        return view('pelayananBantuanModal.pemeriksaan.edit', compact('pemeriksaan_kebutuhan'));
    }

    
    public function update(UpdatePemeriksaanRequest $request, $id,UploadBapService $uploadBapService)
    {
        $pemeriksaan_kebutuhan=PemeriksaanKebutuhan::findOrFail($id);
        $validated=$request->safe()->except(['bap']);

        if($request->verifikasi==1) $validated['bap']=$uploadBapService->upload($request->bap);
        else $validated['bap']=$uploadBapService->delete($pemeriksaan_kebutuhan->bap);

        $pemeriksaan_kebutuhan->update($validated);
        return redirect()->route('pelayanan.pemeriksaan.index')->with('notifikasi','Sukses Memverifikasi Data');
    }

    
    public function destroy($id)
    {
        //
    }
   
}
