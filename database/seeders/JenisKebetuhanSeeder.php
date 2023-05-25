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
            [
                'nama_kebutuhan'=>'Kaki Palsu',
                'is_diukur'=>'t'
            ],
            [
                'nama_kebutuhan'=>'Tangan Palsu',
                'is_diukur'=>'t'
            ],
            [
                'nama_kebutuhan'=>'Alat Bantu Dengar',
                'is_diukur'=>'t'
            ],
            [
                'nama_kebutuhan'=>'Sepatu Besi',
                'is_diukur'=>'t'
            ],
            [
                'nama_kebutuhan'=>'Kursi Roda',
                'is_diukur'=>'f'
            ],
            [
                'nama_kebutuhan'=>'Walker',
                'is_diukur'=>'f'
            ],
            [
                'nama_kebutuhan'=>'Stroller',
                'is_diukur'=>'f'
            ],
            [
                'nama_kebutuhan'=>'Kurk',
                'is_diukur'=>'f'
            ],
            [
                'nama_kebutuhan'=>'Tongkat Adaptif',
                'is_diukur'=>'f'
            ],
        ];

        foreach ($jenis_kebutuhans as $key => $jenis_kebutuhan) {
            MJenisKebutuhan::create($jenis_kebutuhan);
        }
    }
}
