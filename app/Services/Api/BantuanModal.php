<?php
namespace App\Services\Api;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class BantuanModal {

    private $expired;

    public function __construct()
    {
        $this->expired=Carbon::now()->addMinutes(5);
    }

    public function rekap(){
        return Cache::remember('rekap',$this->expired,function(){
            return ;
        });
    }
}