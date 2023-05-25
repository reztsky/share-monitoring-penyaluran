<?php

namespace Database\Seeders;

use App\Models\MKecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $kecamatans = array(
        array("kecamatan" => "ASEM ROWO"),
        array("kecamatan" => "BENOWO"),
        array("kecamatan" => "BUBUTAN"),
        array("kecamatan" => "BULAK"),
        array("kecamatan" => "DUKUH PAKIS"),
        array("kecamatan" => "GAYUNGAN"),
        array("kecamatan" => "GENTENG"),
        array("kecamatan" => "GUBENG"),
        array("kecamatan" => "GUNUNG ANYAR"),
        array("kecamatan" => "JAMBANGAN"),
        array("kecamatan" => "KARANG PILANG"),
        array("kecamatan" => "KENJERAN"),
        array("kecamatan" => "KREMBANGAN"),
        array("kecamatan" => "LAKARSANTRI"),
        array("kecamatan" => "MULYOREJO"),
        array("kecamatan" => "PABEAN CANTIAN"),
        array("kecamatan" => "PAKAL"),
        array("kecamatan" => "RUNGKUT"),
        array("kecamatan" => "SAMBIKEREP"),
        array("kecamatan" => "SAWAHAN"),
        array("kecamatan" => "SEMAMPIR"),
        array("kecamatan" => "SIMOKERTO"),
        array("kecamatan" => "SUKOLILO"),
        array("kecamatan" => "SUKOMANUNGGAL"),
        array("kecamatan" => "TAMBAKSARI"),
        array("kecamatan" => "TANDES"),
        array("kecamatan" => "TEGALSARI"),
        array("kecamatan" => "TENGGILIS MEJOYO"),
        array("kecamatan" => "WIYUNG"),
        array("kecamatan" => "WONOCOLO"),
        array("kecamatan" => "WONOKROMO")
    );
    public function run()
    {
        foreach ($this->kecamatans as $key => $kecamatan) {
            MKecamatan::create($kecamatan);
        }
    }
}
