<?php

namespace App\Http\Controllers;

use App\Models\MJenisKebutuhan;
use App\Models\PengajuanKebutuhan;
use Illuminate\Http\Request;

class PemeriksaanBantuanModalController extends Controller
{
    
    public function index(Request $request)
    {
        $pengajuan_kebutuhans=PengajuanKebutuhan::selectCustom()->isDiukur('t')->diterima()->search($request)->filterJenisKebutuhan($request)->with('kebutuhan')->paginate(10)->withQueryString();
        $jenis_kebutuhans=MJenisKebutuhan::all(['nama_kebutuhan','id']);
        return view('pelayananBantuanModal.pemeriksaan.index',compact('pengajuan_kebutuhans','jenis_kebutuhans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelayananBantuanModal.pemeriksaan.create');
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
    public function show($id)
    {
        return view('pelayananBantuanModal.pemeriksaan.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
