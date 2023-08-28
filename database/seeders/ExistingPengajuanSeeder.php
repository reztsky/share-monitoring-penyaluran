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
        array("nik"=>3578304805100001,"no_kk"=>3578300810180004,"nama"=>"LAYLATUS SAHLA","jenis_kelamin"=>"P","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2010-05-08","kecamatan"=>"PAKAL","kelurahan"=>"BABAT JERAWAT","rw"=>4,"rt"=>9,"alamat"=>"DK. JERAWAT GG.IX","no_hp"=>'087853132671',"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578083006100002,"no_kk"=>3578033001170010,"nama"=>"NUR COKRO SASONGKO","jenis_kelamin"=>"P","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2010-06-30","kecamatan"=>"RUNGKUT","kelurahan"=>"PENJARINGANSARI","rw"=>10,"rt"=>2,"alamat"=>"RUSUN PENJARINGANSARI B-418","no_hp"=>'08113431345',"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578082210090004,"no_kk"=>3578080201081080 ,"nama"=>"MOHAMMAD ALIEF ALFIANSYAH","jenis_kelamin"=>"L","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2009-10-22","kecamatan"=>"GUBENG","kelurahan"=>"MOJO","rw"=>12,"rt"=>11,"alamat"=>"JOJORAN 3-D DALAM/16","no_hp"=>'085604317350',"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578035206050002,"no_kk"=>3578030201082646,"nama"=>"MAZAYA FADILAH","jenis_kelamin"=>"P","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2005-06-12","kecamatan"=>"RUNGKUT","kelurahan"=>"KEDUNG BARUK","rw"=>3,"rt"=>2,"alamat"=>"KEDUNG BARUK gg 9/8-A SURABAYA","no_hp"=>'089667995106',"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3309051008070004,"no_kk"=>3578090305160018,"nama"=>"MISBAH EKA MAULANA","jenis_kelamin"=>"L","tempat_lahir"=>"BOYOLALI","tanggal_lahir"=>"2007-08-10","kecamatan"=>"SUKOLILO","kelurahan"=>"KLAMPIS NGASEM","rw"=>6,"rt"=>2,"alamat"=>"MLETO 39 BELAKANG","no_hp"=>'085749445780',"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578261304090001,"no_kk"=>3578260101089249,"nama"=>"ACHMAD SHOBIRIN AULADI","jenis_kelamin"=>"L","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2009-04-13","kecamatan"=>"MULYOREJO","kelurahan"=>"MANYAR SABRANGAN","rw"=>2,"rt"=>5,"alamat"=>"MANYAR SABRANGAN 143 SBY","no_hp"=>'081330135235',"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578182502090001,"no_kk"=>3578180812100009,"nama"=>"NAJIBULLAH AMIEN","jenis_kelamin"=>"L","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2009-02-25","kecamatan"=>"LAKARSANTRI","kelurahan"=>"BANGKINGAN","rw"=>4,"rt"=>7,"alamat"=>"WISMA LIDAH KULON XI - 28","no_hp"=>'0859180700717',"asal_surat"=>"-","id_jenis_kebutuhan"=>5,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578121609070002 ,"no_kk"=>3578120303150004,"nama"=>"AKMALUL FIKRI","jenis_kelamin"=>"L","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2007-09-16","kecamatan"=>"PABEAN CANTIAN","kelurahan"=>"NYAMPLUNGAN","rw"=>1,"rt"=>2,"alamat"=>"BENTENG 17 FTR","no_hp"=>'083890219584',"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578060907060001,"no_kk"=>3578061008170009,"nama"=>"SANDY HABIZAL SAPUTRA","jenis_kelamin"=>"L","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2006-07-09","kecamatan"=>"SAWAHAN","kelurahan"=>"PUTAT JAYA","rw"=>15,"rt"=>2,"alamat"=>"SIMO GUNUNG BARU JAYA BLOK C/12","no_hp"=>'081357776663',"asal_surat"=>"-","id_jenis_kebutuhan"=>5,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578150307050001,"no_kk"=>3578150201088449,"nama"=>"GALIH RISDANTO","jenis_kelamin"=>"L","tempat_lahir"=>"NGANJUK","tanggal_lahir"=>"2005-07-03","kecamatan"=>"KREMBANGAN","kelurahan"=>"MOROKREMBANGAN","rw"=>6,"rt"=>2,"alamat"=>"TAMBAK ASRI 04/8-B","no_hp"=>'089666802306',"asal_surat"=>"-","id_jenis_kebutuhan"=>3,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23"),
        array("nik"=>3578090202090003,"no_kk"=>3578090202090003,"nama"=>"AHMAD ALI FIKRI","jenis_kelamin"=>"L","tempat_lahir"=>"SURABAYA","tanggal_lahir"=>"2009-02-02","kecamatan"=>"SUKOLILO","kelurahan"=>"MEDOKAN SEMAMPIR","rw"=>1,"rt"=>9,"alamat"=>"SEMAMPIR TENGAH 7/40","no_hp"=>'08970963824',"asal_surat"=>"-","id_jenis_kebutuhan"=>5,"status_pengajuan"=>3,"dokumentasi"=>"default.jpg","tanggal_pengajuan"=>"2023-08-23")
      );
    
    public function run()
    {
        foreach ($this->pengajuans as $pengajuan) {
            PengajuanKebutuhan::create($pengajuan);
        }
    }
}
