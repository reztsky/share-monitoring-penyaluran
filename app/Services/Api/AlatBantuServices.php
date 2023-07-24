<?php

namespace App\Services\Api;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AlatBantuServices
{

    private $expired;

    public function __construct()
    {
        $this->expired = Carbon::now()->addMinutes(5);
    }

    public function rekap($request)
    {
        return DB::table('m_jenis_kebutuhans as a')
            ->select(['a.id', 'a.nama_kebutuhan'])
            ->selectRaw('count(b.id) as pengajuan_count')
            ->selectRaw('count(c.id) as penyaluran_count')
            ->leftJoin('pengajuan_kebutuhans as b', function ($join) {
                return $join->where('b.deleted_at', null)->on('a.id', '=', 'b.id_jenis_kebutuhan');
            })
            ->leftJoin('penyaluran_kebutuhans as c', 'b.id', '=', 'c.id_pengajuan')
            ->groupBy(['a.nama_kebutuhan', 'a.id'])
            ->when($request->filled('bulan_penyaluran'), function ($query) use ($request) {
                return $query->whereMonth('c.tanggal_salur', $request->bulan_penyaluran)
                    ->whereYear('c.tanggal_salur', date('Y'));
            })
            ->get();

        return Cache::remember('rekapAlatBantu', $this->expired, function () use ($request) {
        });
    }

    public function findPengajuanById($request, $id_jenis_bantuan)
    {
        return DB::table('pengajuan_kebutuhans as a')
            ->join('m_jenis_kebutuhans as b', 'b.id', '=', 'a.id_jenis_kebutuhan')
            ->select(['a.nik', 'a.nama', 'a.kelurahan', 'a.kecamatan','a.alamat', 'b.nama_kebutuhan', 'a.dokumentasi'])
            ->when($request->filled('bulan_pengajuan'), function ($query) use ($request) {
                return $query->whereMonth('b.tanggal_pengajuan', $request->bulan_pengajuan)
                    ->whereYear('b.tanggal_pengajuan', date('Y'));
            })
            ->where('id_jenis_kebutuhan', $id_jenis_bantuan)
            ->where('a.deleted_at', null)
            ->get();
    }

    public function findPenyaluranById($request, $id_jenis_bantuan)
    {
        return DB::table('pengajuan_kebutuhans as a')
            ->join('penyaluran_kebutuhans as b', 'a.id', '=', 'b.id_pengajuan')
            ->join('m_jenis_kebutuhans as c', 'c.id', '=', 'a.id_jenis_kebutuhan')
            ->select(['a.nik', 'a.nama', 'a.kelurahan', 'a.kecamatan', 'a.alamat', 'c.nama_kebutuhan', 'b.foto_penyaluran'])
            ->when($request->filled('bulan_penyaluran'), function ($query) use ($request) {
                return $query->whereMonth('b.tanggal_salur', $request->bulan_penyaluran)
                    ->whereYear('b.tanggal_salur', date('Y'));
            })
            ->where('a.id_jenis_kebutuhan', $id_jenis_bantuan)
            ->where('a.deleted_at', null)
            ->get();
    }
}
