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
        array("id"=>null,"nik"=>3578086705820001,"no_kk"=>3578080201080941,"nama"=>"UMI","jenis_kelamin"=>"P","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2002-01-01","kecamatan"=>"GUBENG","kelurahan"=>"GUBENG","rw"=>2,"rt"=>15,"alamat"=>"GUBENG JAYA 2/69-A","no_hp"=>0,"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-09-03","deleted_at"=>null,"created_at"=>null,"updated_at"=>null)
      );
    
    public function run()
    {
        foreach ($this->pengajuans as $pengajuan) {
            PengajuanKebutuhan::create($pengajuan);
        }
    }
}
