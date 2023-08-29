<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsulanDbhcht extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'alamat',
        'rt',
        'rw',
        'kecamatan',
        'kelurahan',
        'jenis_bantuan_modal',
        'inserted_by',
        'tahun_anggaran',
    ];

    public function scopeShowDataByRole($query,$user){
        $role=$user->roles->first()->name;

        $query->select([
            'id',
            'inserted_by',
            'nik',
            'nama',
            'kecamatan',
            'kelurahan',
            'jenis_bantuan_modal',
            'tahun_anggaran'
        ]);

        if($role=='Super Admin') return  $query;

        return $query->where('inserted_by',$user->id);
    }

    public function scopeCekData($query, $request)
    {
        return $query->where('nik', $request->nik)
            ->orWhere('no_kk', $request->no_kk);
    }

    public function scopeDashboard($query){
        
        return $query->select('jenis_bantuan_modal')
            ->selectRaw('count(id) as jumlah')
            ->groupBy('jenis_bantuan_modal');
    }
    
    public function scopeSearch($query,$request){
        return $query->when($request->filled('keyword'),function($q) use ($request){
            return $q->where(function($query) use ($request){
                return $query->where('nik',$request->keyword)
                ->orWhere('nama','like','%'.$request->keyword.'%')
                ->orWhere('alamat','like','%'.$request->keyword.'%');
            });
        });
    }

    public function scopeFilterByKelurahan($query,$user){
        $role=$user->roles->first()->name;
        $user_detail=explode("|",$user->name);
        return $query->when($role=='Kelurahan',function($q) use ($user_detail){
            return $q->where('kelurahan',$user_detail[1])
            ->where('kecamatan',$user_detail[2]);
        });
    }

    public function scopeFilterByJenisBanmod($query,$request){
        return $query->when($request->filled('jenis_bantuan_modal'),function($q) use ($request){
            $jenis_bantuan_modal=$request->jenis_bantuan_modal;
            $q->when($jenis_bantuan_modal==0,function($que){
                return $que->where('jenis_bantuan_modal',"");
            }, function($que) use ($jenis_bantuan_modal){
                return $que->where('jenis_bantuan_modal',$jenis_bantuan_modal);
            });
        });
    }
}
