<?php

namespace Database\Seeders;

use App\Models\KpmBlt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KPMBLTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KpmBlt::create([
            'nama'=>'sultan aulia',
            'nik'=>'3578160711980001',
            'kecamatan'=>'semampir',
            'kelurahan'=>'sidotopo',
            'status_kpm_sebagai'=>2
        ],[
            'nama'=>'sull',
            'nik'=>'1231242',
            'kecamatan'=>'Morokrembangan',
            'kelurahan'=>'kremabngan utara',
            'status_kpm_sebagai'=>1,
        ]);
    }
}
