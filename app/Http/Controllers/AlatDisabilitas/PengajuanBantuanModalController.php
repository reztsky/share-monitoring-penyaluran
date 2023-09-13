<?php

namespace App\Http\Controllers\AlatDisabilitas;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pelayanan\Pengajuan\StorePengajuanRequest;
use App\Http\Requests\Pelayanan\Pengajuan\UpdatePengajuanReqeust;
use App\Models\MJenisKebutuhan;
use App\Models\MKecamatan;
use App\Models\MKelurahan;
use App\Models\PemeriksaanKebutuhan;
use App\Models\PengajuanKebutuhan;
use App\Services\Pelayanan\Pengajuan\UploadFotoService;
use Illuminate\Http\Request;

class PengajuanBantuanModalController extends Controller
{

    public function index(Request $request)
    {
        $pengajuan_kebutuhans = PengajuanKebutuhan::select([
            'id',
            'nik',
            'nama',
            'kelurahan',
            'status_pengajuan',
            'id_jenis_kebutuhan'
        ])->sortable()->search($request)->filterJenisKebutuhan($request)->orderByDesc('status_pengajuan')->with('kebutuhan')->paginate(25)->withQueryString();
        $jenis_kebutuhans = MJenisKebutuhan::all(['id', 'nama_kebutuhan']);
        return view('pelayananBantuanModal.pengajuan.index', compact('pengajuan_kebutuhans', 'jenis_kebutuhans'));
    }


    public function create()
    {
        $jenis_kebutuhans = MJenisKebutuhan::all();
        $kecamatans = MKecamatan::all(['id', 'kecamatan'])->sortBy('kecamatan');
        return view('pelayananBantuanModal.pengajuan.create', compact('jenis_kebutuhans', 'kecamatans'));
    }

    public function store(StorePengajuanRequest $request, UploadFotoService $uploadFotoService)
    {
        $validated = $request->safe()->except('dokumentasi');
        $validated['dokumentasi'] = $uploadFotoService->upload($request->dokumentasi);
        $pengajuan_kebutuhan = PengajuanKebutuhan::create($validated);
        return redirect()->route('pelayanan.pengajuan.index')->with('notifikasi', 'Sukses Menambahkan Data');
    }


    public function show($id)
    {
        $pengajuan_kebutuhan = PengajuanKebutuhan::with('kebutuhan')->findorFail($id);
        return view('pelayananBantuanModal.pengajuan.show', compact('pengajuan_kebutuhan'));
    }


    public function edit($id)
    {
        $pengajuan_kebutuhan = PengajuanKebutuhan::findorFail($id);
        $kecamatans = MKecamatan::all(['id', 'kecamatan']);
        $kecamatan_pengaju = $kecamatans->where('kecamatan', $pengajuan_kebutuhan->kecamatan)->first();
        $kelurahans = MKelurahan::byKecamatan($kecamatan_pengaju->id)->orderBy('kelurahan')->get();
        $jenis_kebutuhans = MJenisKebutuhan::all();
        return view('pelayananBantuanModal.pengajuan.edit', compact('pengajuan_kebutuhan', 'kecamatans', 'kelurahans', 'jenis_kebutuhans'));
    }


    public function update(UpdatePengajuanReqeust $request, $id)
    {
        $pengajuan_kebutuhan = PengajuanKebutuhan::findOrFail($id);
        $validated = $request->validated();
        $pengajuan_kebutuhan->update($validated);
        return redirect()->route('pelayanan.pengajuan.index')->with('notifikasi', 'Sukses Mengupdate Data');
    }


    public function destroy($id)
    {
        $pengajuan_kebutuhan = PengajuanKebutuhan::findOrFail($id);
        $pengajuan_kebutuhan->delete();
        return redirect()->route('pelayanan.pengajuan.index')->with('notifikasi', 'Sukses Menghapus Data');
    }

    public function findKecamatan($id_kecamatan)
    {
        return MKelurahan::select(['kelurahan', 'id'])->where('id_kecamatan', $id_kecamatan)->get()->toArray();
    }

    public function cekPengajuan($nik){
        $pengajuan_kebutuhan=PengajuanKebutuhan::where('nik',$nik)->count();
        return response()->json([
            'count'=>$pengajuan_kebutuhan,
            'status'=>true
        ],200);
    }

    public function verifikasi(Request $request, $id)
    {
        $pengajuan_kebutuhan = PengajuanKebutuhan::with('kebutuhan')->findOrFail($id);
        $pengajuan_kebutuhan->status_pengajuan = $request->status_pengajuan;
        $pengajuan_kebutuhan->save();

        if ($pengajuan_kebutuhan->kebutuhan->is_diukur != 't' || $request->status_pengajuan == 2) return redirect()->route('pelayanan.pengajuan.index')->with('notifikasi', 'Verifikasi Berhasil');

        $pemeriksaan_kebetuhan = PemeriksaanKebutuhan::create([
            'id_pengajuan' => $pengajuan_kebutuhan->id,
        ]);
        return redirect()->route('pelayanan.pengajuan.index')->with('notifikasi', 'Verifikasi Berhasil');
    }
}
