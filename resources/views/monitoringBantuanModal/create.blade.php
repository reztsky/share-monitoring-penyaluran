@extends('layout')
@section('link-active-monitoring','active')
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="app-page-title">Tambah Data Monitoring Bantuan Modal</h3>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{route('bantuanmodal.monitoring.index')}}" class="btn px-2 py-1" style="background-color: #BC4C4C;color:white;width:100px">Kembali</a>
        </div>
        <div class="row app-card shadow-sm bg-white p-3">
            <div class="app-card-body">
                <form action="{{route('bantuanmodal.monitoring.store')}}" method="post">
                    @csrf
                    {{-- Data Penerima --}}
                    @include('monitoringBantuanModal.form.form_data_penerima')
                </form>
            </div>
        </div>

        <div class="row app-card shadow-sm bg-white p-3 mt-4">
            <div class="app-card-body">
                <form action="{{route('bantuanmodal.monitoring.store')}}" method="post">
                    @csrf
                    {{-- Pengelolaan Modal Usaha --}}
                    @include('monitoringBantuanModal.form.form_pengelolaan_modal_usaha')
                    <hr/>
                    {{-- Hasil Usaha --}}
                    @include('monitoringBantuanModal.form.form_hasil_usaha')
                </form>
            </div>
        </div>

        {{-- <div class="row app-card shadow-sm bg-white p-3 mt-4" >
            <div class="app-card-body">
                <form action="{{route('bantuanmodal.monitoring.store')}}" method="post">
                    @csrf
                    {{-- Hasil Usaha 
                    @include('monitoringBantuanModal.form.form_hasil_usaha')
                </form>
            </div>
        </div> --}}

        <div class="row app-card shadow-sm bg-white p-3 mt-4">
            <div class="app-card-body">
                <form action="{{route('bantuanmodal.monitoring.store')}}" method="post">
                   @csrf
                   {{-- Lain Lain --}}
                   @include('monitoringBantuanModal.form.form_lain_lain')
                </form>
            </div>
        </div>

        
    </div>
</div>
@endsection