<?php

namespace App\Services\Pelayanan;

use App\Models\PengajuanKebutuhan;
use App\Models\PenyaluranKebutuhan;
use Illuminate\Support\Facades\DB;

class DashboardAlatBantuService
{

    public function rekap($request)
    {
        return DB::table('m_jenis_kebutuhans as a')
            ->select(['a.id', 'a.nama_kebutuhan'])
            ->selectRaw('count(b.id) as pengajuan_count')
            ->selectRaw('count(c.id) as penyaluran_count')
            ->leftJoin('pengajuan_kebutuhans as b', function ($join) use ($request) {
                return $join->when($request->filled('tanggal_pengajuan'), function ($query) use ($request) {
                    return $query->where('b.tanggal_pengajuan', $request->tanggal_pengajuan);
                })
                ->where('b.deleted_at',null)
                ->on('a.id', '=', 'b.id_jenis_kebutuhan');
            })
            ->leftJoin('penyaluran_kebutuhans as c', 'b.id', '=', 'c.id_pengajuan')
            ->groupBy(['a.nama_kebutuhan', 'a.id'])
            ->get();
    }


    public function pengajuan($id_jenis_bantuan)
    {
        return DB::table('pengajuan_kebutuhans as a')
            ->join('m_jenis_kebutuhans as b', 'b.id', '=', 'a.id_jenis_kebutuhan')
            ->select(['a.nik', 'a.nama', 'a.kelurahan', 'a.alamat', 'b.nama_kebutuhan', 'a.dokumentasi'])
            ->where('id_jenis_kebutuhan', $id_jenis_bantuan)
            ->where('a.deleted_at',null)
            ->get();
    }

    public function penyaluran($id_jenis_bantuan)
    {
        return DB::table('pengajuan_kebutuhans as a')
            ->join('penyaluran_kebutuhans as b', 'a.id', '=', 'b.id_pengajuan')
            ->join('m_jenis_kebutuhans as c', 'c.id', '=', 'a.id_jenis_kebutuhan')
            ->select(['a.nik', 'a.nama', 'a.kelurahan', 'a.alamat', 'c.nama_kebutuhan', 'b.foto_penyaluran'])
            ->where('a.id_jenis_kebutuhan', $id_jenis_bantuan)
            ->where('a.deleted_at',null)
            ->get();
    }
}
