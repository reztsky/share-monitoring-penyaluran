<?php

namespace Database\Seeders;

use App\Models\PemeriksaanKebutuhan;
use App\Models\PengajuanKebutuhan;
use App\Models\PenyaluranKebutuhan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExistingPengajuanSeeder extends Seeder
{
    private $pengajuans =array(
        array("id_pengajuan"=>"99cf14f5-5db6-4055-a140-3fb6650ac394","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf14f6-1a0e-4161-8e6e-efbbe3212255","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf14f6-1ca3-4309-87c6-c673d379b51f","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf14f6-1f4e-474f-91ec-c1d3931641b6","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf14f6-2117-46f4-8045-0e28cca94d6a","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf14f6-2351-4bc6-a2cb-f2556303d9a1","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf14f6-252b-4e0f-9f6f-a017fc0ef5e7","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-bacd-4b6a-9639-77a0b9ed61f3","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-c28e-4642-949e-b90107ebe8b0","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-c4ba-47e0-9b1a-8e169e04a9a5","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-c6a9-4bc9-8dc5-40eab5729a40","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-c8e0-413c-9e5a-3619ee4fa278","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-cb45-425c-8a02-710529f5e688","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-ce00-4876-aab5-ff273a51cfaa","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-cff6-42b7-896d-24e217ce9917","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-d27a-4322-9328-02aaef776201","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-d6f8-429b-baba-3e7775558bc6","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-dbe6-4ae6-b380-9818a4bf5d35","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-de3b-4203-a3c7-6df79bc71ea9","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-e075-4eb2-995f-8e918e6509b4","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-e272-45cc-8ce5-2051104904c6","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-e4f0-4410-878b-507fd8548a3d","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-e6d5-44d8-974c-01cf7decc408","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-e86b-48f9-bdc9-d185a3276e13","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-ea0f-4a27-aa6d-a5ff0de29641","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-ebb2-4e7e-b5c6-f2b934325bab","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-ed37-471f-8952-da23d30ab2da","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-efd9-4069-9ee4-f0d8f738c4e4","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-f177-4ea5-b335-61325b00be94","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-f3c9-412c-bbc3-e82f81141f07","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-f579-451b-bd33-598af332af46","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-f714-4904-9d01-ff352db6310c","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf157b-f8c0-4ba7-a3e0-a11d23b12eb2","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-12a4-49fc-8c2e-2de2f7020202","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-1a92-4b32-96f7-05469dd2ce87","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-1c78-4e69-b53d-796bd8d3325e","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-1e3e-422d-b29f-5b4dd4915076","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-2075-4f0c-91d7-d4fe87fd4414","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-229c-4329-be77-aa6bf74828e2","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-2490-4f2c-80b1-dce46c80f7fa","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-269a-4527-95d5-8d922ff282c5","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-28b3-4c8a-adad-206e2f1b563c","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-2a6d-4872-ae9e-b6ecc1d733e9","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-2c12-4a87-810d-d8042e805ce1","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-2dc6-4243-bde2-7d98fbc97543","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-2fd9-442f-90a9-aa41166da614","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf16de-3227-4d11-9a3c-fe2460e84543","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99cf17a4-de44-48c3-8d50-c4aed62ab3e5","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99d07fe1-55f1-494a-8b78-529a3a06d8d5","bap"=>"deafult.pdf","foto_penyaluran"=>"dokumentasi.pdf","tanggal_salur"=>"2023-08-04","sumber_dana"=>"BAZNAS")
      );

    
    public function run()
    {
        foreach ($this->pengajuans as $pengajuan) {
            PenyaluranKebutuhan::create($pengajuan);
        }
    }
}
