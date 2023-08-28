<?php

namespace App\Services\UsulanBanmod;

use App\Models\KuotaKelurahan;

class KuotaTersedia
{
    public $user;
    public function __construct($user)
    {
        $this->user=$user;
    }

    public function kuota()
    {
        $role = $this->user->roles->first()->name;
        if ($role == 'Super Admin') return KuotaKelurahan::sum('kuota_sisa');

        $user_detail=explode("|",$this->user->name);
        return KuotaKelurahan::where([
            'kecamatan' => $user_detail[2],
            'kelurahan' => $user_detail[1]
        ])->first()->kuota_sisa;
    }
}
