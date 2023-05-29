<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pelayanan\Penyaluran\CreatePenyaluranRequest;
use App\Models\MJenisKebutuhan;
use App\Models\PengajuanKebutuhan;
use App\Models\PenyaluranKebutuhan;
use App\Services\Pelayanan\Penyaluran\UploadBapService;
use App\Services\Pelayanan\Penyaluran\UploadFotoService;
use Illuminate\Http\Request;

// Tesss
class PenyaluranBantuanModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tanpa_diperiksa=PengajuanKebutuhan::selectCustom()->isDiukur('f')->diterima()->with(['kebutuhan','penyaluran'])->search($request)->filterJenisKebutuhan($request);
        $siap_salurs=PengajuanKebutuhan::selectCustom()->isDiukur('t')->diterima()->with(['kebutuhan','penyaluran'])->whereHas('pemeriksaan',function($query){
            return $query->where('verifikasi',1);
        })->with('kebutuhan')->search($request)->filterJenisKebutuhan($request)->union($tanpa_diperiksa)->paginate(10);
        $jenis_kebutuhans = MJenisKebutuhan::all(['id', 'nama_kebutuhan']);
        return view('pelayananBantuanModal.penyaluran.index',compact('siap_salurs','jenis_kebutuhans'));
    }

    
    public function create($id){
        $pengajuan_kebutuhan=PengajuanKebutuhan::with('kebutuhan')->findOrFail($id);
        return view('pelayananBantuanModal.penyaluran.create',compact('pengajuan_kebutuhan'));
    }

    public function store(CreatePenyaluranRequest $request, UploadFotoService $uploadFotoService, UploadBapService $uploadBapService)
    {
        $validated=$request->safe()->only(['id_pengajuan','tanggal_salur']);
        $validated['bap']=$uploadBapService->upload($request->bap);
        $validated['foto_penyaluran']=$uploadFotoService->upload($request->foto_penyaluran);
        $penyaluran_kebutuhan=PenyaluranKebutuhan::create($validated);
        return redirect()->route('pelayanan.penyaluran.index')->with('notifikasi','Sukses Menyimpan Data');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengajuan_kebutuhan=PengajuanKebutuhan::with('penyaluran')->findOrFail($id);
        return view('pelayananBantuanModal.penyaluran.show',compact('pengajuan_kebutuhan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
