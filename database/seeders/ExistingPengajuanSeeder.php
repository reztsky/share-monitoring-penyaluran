<?php

namespace Database\Seeders;

use App\Models\PengajuanKebutuhan;
use App\Models\PenyaluranKebutuhan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExistingPengajuanSeeder extends Seeder
{
    private $pengajuans= array(
        array("id_pengajuan"=>"997cf814-ff38-4d6c-84b6-0ff6cd80d0ad","bap"=>"bap.pdf","foto_penyaluran"=>"default.jpg","tanggal_salur"=>"2023-06-25","sumber_dana"=>"BAZNAS"),
    );



    public function run()
    {
        foreach ($this->pengajuans as $pengajuan) {
            PenyaluranKebutuhan::create($pengajuan);
        }
    }
}
