<?php

namespace App\Http\Controllers;

use App\Models\PengajuanKebutuhan;
use Illuminate\Http\Request;

class PenyaluranBantuanModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanpa_diperiksa=PengajuanKebutuhan::selectCustom()->isDiukur('f')->diterima()->with('kebutuhan');
        $siap_salurs=PengajuanKebutuhan::selectCustom()->isDiukur('t')->diterima()->whereHas('pemeriksaan',function($query){
            return $query->where('verifikasi',1);
        })->with('kebutuhan')->union($tanpa_diperiksa)->paginate(1);
        
        return view('pelayananBantuanModal.penyaluran.index',compact('siap_salurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {

        return view('pelayananBantuanModal.penyaluran.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
