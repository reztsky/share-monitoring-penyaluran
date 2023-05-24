<?php

namespace Database\Seeders;

use App\Models\MJenisKebutuhan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKebetuhanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_kebutuhans=[
            'Kaki Palsu',
            'Tangan Palsu',
            'Alat Bantu Dengar',
            'Kursi Roda',
            'Walker',
            'Stroller',
            'Kurk',
            'Tongkat Adaptif'
        ];

        foreach ($jenis_kebutuhans as $key => $jenis_kebutuhan) {
            MJenisKebutuhan::create([
                'nama_kebutuhan'=>$jenis_kebutuhan
            ]);
        }
    }
}
