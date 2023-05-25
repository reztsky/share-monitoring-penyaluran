<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pelayanan\Pemeriksaan\StorePemeriksaanRequest;
use App\Models\MJenisKebutuhan;
use App\Models\PemeriksaanKebutuhan;
use App\Models\PengajuanKebutuhan;
use App\Models\MKecamatan;
use App\Models\MKelurahan;
use App\Services\Pelayanan\Pemeriksaan\UploadFotoService;
use Illuminate\Http\Request;

class PemeriksaanBantuanModalController extends Controller
{
    
    public function index(Request $request)
    {
        $pemeriksaan_kebutuhan=PemeriksaanKebutuhan::select([
            'id',
            'nik',
            'nama',
            'kelurahan',
            'status_pengajuan',
            'id_jenis_kebutuhan'
        ])->search($request)->filterJenisKebutuhan($request)->with('kebutuhan')->paginate(10)->withQueryString();
        $jenis_kebutuhans=MJenisKebutuhan::all(['id','nama_kebutuhan']);
        return view('pelayananBantuanModal.pemeriksaan.index',compact('pemeriksaan_kebutuhan','jenis_kebutuhans'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id,StorePemeriksaanRequest $request, UploadFotoService $uploadFotoService)
    {
        $validated=$request->safe()->except('dokumentasi');
        $validated['dokumentasi']=$uploadFotoService->upload($request->dokumentasi);
        $pemeriksaan_kebutuhan=PemeriksaanKebutuhan::findorFail($id);
        $kecamatans=MKecamatan::all(['id','kecamatan']);
        $kecamatan_pengaju=$kecamatans->where('kecamatan',$pemeriksaan_kebutuhan->kecamatan)->first();
        $kelurahans=MKelurahan::byKecamatan($kecamatan_pengaju->id)->orderBy('kelurahan')->get();
        $jenis_kebutuhans=MJenisKebutuhan::all();
        return view('pelayananBantuanModal.pemeriksaan.create',compact('pemeriksaan_kebutuhan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemeriksaan_kebutuhan=PemeriksaanKebutuhan::with('kebutuhan')->findorFail($id);
        return view('pelayananBantuanModal.pemeriksaan.show',compact('pemeriksaan_kebutuhan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

    public function verifikasi(Request $request,$id){
        $pemeriksaan_kebutuhan=PengajuanKebutuhan::findOrFail($id);
        $pemeriksaan_kebutuhan->status_pengajuan=$request->status_pengajuan;
        $pemeriksaan_kebutuhan->save();
        return redirect()->route('pelayanan.penyaluran.index')->with('notifikasi','Verifikasi Berhasil');
    }
}
