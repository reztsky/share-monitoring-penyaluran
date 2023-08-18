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
        array("id_pengajuan"=>"99dcfe6e-f619-4888-89af-0f6205dfdabf","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-383b-4e34-9649-5a2cc9d37d0f","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-3ac6-4255-be00-e0bb98a90b50","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-3cb9-4da7-b6cf-cd83b12312d7","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-3f9a-4acf-adad-6d88c32402af","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-4255-4ab9-91fc-411dd5eb929a","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-4446-45b8-8795-4f7f75f0b505","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-461c-404d-9eb1-0ea4cb13ae46","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-47e0-47bb-8734-6dfd50979b18","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-4984-4d9f-bca9-d6489297e4a1","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-4c45-4aa5-bc86-1d55e39aa483","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-4e45-450a-96c6-51ca29365a7d","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-50ef-4e32-871c-2bd07a10a546","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-52f5-48b2-861b-9b8e983319e6","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-5549-4390-9bb2-6d9592e2e303","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-5783-4a41-98aa-26af1c171a66","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-5984-482f-a470-3a28a4db19f4","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-5c04-4d35-8b42-266897cb4fe0","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-5e78-4e01-80cc-54d25b875acf","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-6149-44ba-a617-b84b8cbb290c","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-63bf-432a-9765-95082359ffed","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfe70-6613-4f09-a147-ebae0f9cfefc","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfed0-371a-49b1-9c2a-5650d3ce46d4","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfed0-4790-4d80-8def-a34461b18f19","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfed0-4a65-4f1a-8e20-d195fb0cf42b","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfed0-4d24-4e0b-9b65-819d70355bab","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS"),
        array("id_pengajuan"=>"99dcfed0-530a-4f64-9268-c7a35daaf13b","bap"=>"default.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-08-11","sumber_dana"=>"BAZNAS")
      );

    
    public function run()
    {
        foreach ($this->pengajuans as $pengajuan) {
            PenyaluranKebutuhan::create($pengajuan);
        }
    }
}
