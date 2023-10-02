<?php

namespace App\Services\Api;

use App\Models\MJenisKebutuhan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AlatBantuServices
{

    public function all($request){
        $result = DB::table('m_jenis_kebutuhans as a')
            ->select(['a.id', 'a.nama_kebutuhan','b.*','c.*'])
            ->leftJoin('pengajuan_kebutuhans as b', function ($join) {
                return $join->where('b.deleted_at', null)->on('a.id', '=', 'b.id_jenis_kebutuhan');
            })
            ->leftJoin('penyaluran_kebutuhans as c', 'b.id', '=', 'c.id_pengajuan')
            ->when($request->filled('penyaluran_mulai_bulan'), function ($query) use ($request) {
                return $query->whereMonth('c.tanggal_salur', '>=', $request->penyaluran_mulai_bulan);
            })
            ->when($request->filled('penyaluran_sampai_bulan'), function ($query) use ($request) {
                return $query->whereMonth('c.tanggal_salur', '<=', $request->penyaluran_sampai_bulan);
            })
            ->when($request->filled('tahun'),function($query) use ($request){
                return $query->whereYear('c.tanggal_salur', $request->tahun);
            })
            ->get();
        return [
            'periode' => $request->post(),
            'result' => $result,
        ];
    }

    public function rekap($request)
    {
        $result = DB::table('m_jenis_kebutuhans as a')
            ->select(['a.id', 'a.nama_kebutuhan'])
            ->selectRaw('count(b.id) as pengajuan_count')
            ->selectRaw('count(c.id) as penyaluran_count')
            ->leftJoin('pengajuan_kebutuhans as b', function ($join) {
                return $join->where('b.deleted_at', null)->on('a.id', '=', 'b.id_jenis_kebutuhan');
            })
            ->leftJoin('penyaluran_kebutuhans as c', 'b.id', '=', 'c.id_pengajuan')
            ->groupBy(['a.nama_kebutuhan', 'a.id'])
            ->when($request->filled('penyaluran_mulai_bulan'), function ($query) use ($request) {
                return $query->whereMonth('c.tanggal_salur', '>=', $request->penyaluran_mulai_bulan);
            })
            ->when($request->filled('penyaluran_sampai_bulan'), function ($query) use ($request) {
                return $query->whereMonth('c.tanggal_salur', '<=', $request->penyaluran_sampai_bulan);
            })
            ->when($request->filled('tahun'),function($query) use ($request){
                return $query->whereYear('c.tanggal_salur', $request->tahun);
            })
            ->get();
        return [
            'periode' => $request->post(),
            'result' => $result,
        ];
    }

    public function findPengajuanById($request, $id_jenis_bantuan)
    {
        $jenis_kebutuhan=MJenisKebutuhan::select('nama_kebutuhan')->findOrFail($id_jenis_bantuan);
        $result = DB::table('pengajuan_kebutuhans as a')
            ->join('m_jenis_kebutuhans as b', 'b.id', '=', 'a.id_jenis_kebutuhan')
            ->select(['a.nik', 'a.nama', 'a.kelurahan', 'a.kecamatan', 'a.alamat', 'b.nama_kebutuhan', 'a.dokumentasi'])
            ->when($request->filled('pengajuan_mulai_bulan'), function ($query) use ($request) {
                return $query->whereMonth('b.tanggal_pengajuan', $request->pengajuan_mulai_bulan);
            })
            ->when($request->filled('pengajuan_sampai_bulan'), function ($query) use ($request) {
                return $query->whereMonth('b.tanggal_pengajuan', $request->pengajuan_sampai_bulan);
            })
            ->when($request->filled('tahun'),function($query) use ($request){
                return $query->whereYear('a.tanggal_pengajuan', $request->tahun);
            })
            ->where('id_jenis_kebutuhan', $id_jenis_bantuan)
            ->where('a.deleted_at', null)
            ->get();
        return [
            'periode' => $request->post(),
            'jenis_kebutuhan'=>$jenis_kebutuhan,
            'result' => $result,
        ];
    }

    public function findPenyaluranById($request, $id_jenis_bantuan)
    {
        $jenis_kebutuhan=MJenisKebutuhan::select('nama_kebutuhan')->findOrFail($id_jenis_bantuan);
        $result = DB::table('pengajuan_kebutuhans as a')
            ->join('penyaluran_kebutuhans as b', 'a.id', '=', 'b.id_pengajuan')
            ->join('m_jenis_kebutuhans as c', 'c.id', '=', 'a.id_jenis_kebutuhan')
            ->select(['a.nik', 'a.nama', 'a.kelurahan', 'a.kecamatan', 'a.alamat', 'c.nama_kebutuhan', 'b.foto_penyaluran'])
            ->when($request->filled('penyaluran_mulai_bulan'), function ($query) use ($request) {
                return $query->whereMonth('b.tanggal_salur', '>=', $request->penyaluran_mulai_bulan);
            })
            ->when($request->filled('penyaluran_sampai_bulan'), function ($query) use ($request) {
                return $query->whereMonth('b.tanggal_salur', '<=', $request->penyaluran_sampai_bulan);
            })
            ->when($request->filled('tahun'),function($query) use ($request){
                return $query->whereYear('b.tanggal_salur', $request->tahun);
            })
            ->where('a.id_jenis_kebutuhan', $id_jenis_bantuan)
            ->where('a.deleted_at', null)
            ->get();
        // ->paginate(10);
        return [
            'periode' => $request->post(),
            'jenis_kebutuhan'=>$jenis_kebutuhan,
            'result' => $result,
        ];
    }
}
