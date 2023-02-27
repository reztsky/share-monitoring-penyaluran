<?php

namespace App\Services\Monitoring;

class ItemWarkop_KopKelService{

    public static function getItem(){
        $item=collect([
            [
                'nama_barang'=>'Kopi Bubuk 3 In 1',
                'jumlah_awal'=>'6 Box'
            ],
            [
                'nama_barang'=>'Kopi Bubuk',
                'jumlah_awal'=>'6 Bungkus'
            ],
            [
                'nama_barang'=>'Teh Celup',
                'jumlah_awal'=>'6 Pax'
            ],
        ]);
        return $item;
    }
}