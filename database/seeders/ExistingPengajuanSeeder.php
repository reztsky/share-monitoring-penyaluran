<?php

namespace Database\Seeders;

use App\Http\Controllers\PenyaluranBantuanModalController;
use App\Models\PemeriksaanKebutuhan;
use App\Models\PengajuanKebutuhan;
use App\Models\PenyaluranKebutuhan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExistingPengajuanSeeder extends Seeder
{
    private $pengajuans = array(
        array("id_pengajuan"=>"9a8da9ce-37fe-43fa-8a8e-80b36e25954b","bap"=>"LjvfXVuQd1sktc3DX1klnizNGPJ238ZmMn3ULMqU.pdf","verifikasi"=>1),
        array("id_pengajuan"=>"9a8da9ce-39d9-4da3-8f07-35d2a2e55839","bap"=>"LjvfXVuQd1sktc3DX1klnizNGPJ238ZmMn3ULMqU.pdf","verifikasi"=>1),
        array("id_pengajuan"=>"9a8da9ce-3bd7-4bb3-832f-019d250721d8","bap"=>"LjvfXVuQd1sktc3DX1klnizNGPJ238ZmMn3ULMqU.pdf","verifikasi"=>1)
      );
    
    public function run()
    {
        foreach ($this->pengajuans as $pengajuan) {
            PemeriksaanKebutuhan::create($pengajuan);
        }
    }
}
