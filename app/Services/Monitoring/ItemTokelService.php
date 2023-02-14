<?php

namespace App\Services\Monitoring;

class ItemTokelService{

    public static function getItem(){
        $item=collect([
            [
                'nama_barang'=>'Kopi Bubuk 3 In 1',
                'jumlah_awal'=>'6 Box'
            ],
            [
                'nama_barang'=>'Gula Pasir',
                'jumlah_awal'=>'6 Kg'
            ],
            [
                'nama_barang'=>'Teh Celup',
                'jumlah_awal'=>'6 Pax'
            ],
            [
                'nama_barang'=>'Shammpoo 170 Ml',
                'jumlah_awal'=>'10 Botol'
            ],
            [
                'nama_barang'=>'Refill Sabun Mandi Cair 450 Ml',
                'jumlah_awal'=>'10 Buah'
            ],
            [
                'nama_barang'=>'Sabun Cuci Pakaian Cair 750 Ml',
                'jumlah_awal'=>'10 Bungkus'
            ],
            [
                'nama_barang'=>'Sabun Cuci Pakaian 900 Gr',
                'jumlah_awal'=>'10 Buah'
            ],
            [
                'nama_barang'=>'Sabun Mandi Batang',
                'jumlah_awal'=>'10 Buah'
            ],
            [
                'nama_barang'=>'Refill Sabun Cuci Piring Cair 800 Ml',
                'jumlah_awal'=>'10 Buah'
            ],
            [
                'nama_barang'=>'Tepung Terigu',
                'jumlah_awal'=>'10 Kg'
            ],
            [
                'nama_barang'=>'Minyak Goreng',
                'jumlah_awal'=>'10 Liter'
            ],
            [
                'nama_barang'=>'Telur Ayam Negri / Ras',
                'jumlah_awal'=>'10 Kg'
            ],
            [
                'nama_barang'=>'Beras',
                'jumlah_awal'=>'25 Kg'
            ],
            [
                'nama_barang'=>'Kopi Bubuk',
                'jumlah_awal'=>'6 Bungkus'
            ],
        ]);
        return $item;
    }
}