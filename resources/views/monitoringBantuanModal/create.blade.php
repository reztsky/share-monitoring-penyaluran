@extends('layout')
@section('link-active-monitoring','active')
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="app-page-title">Tambah Data Monitoring Bantuan Modal</h3>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{route('bantuanmodal.monitoring.index')}}" class="btn btn-sm btn-danger px-2 py-1">Kembali</a>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="app-card shadow-sm bg-white p-3">
            <div class="app-card-body">
                <form action="{{route('bantuanmodal.monitoring.store')}}" method="post">
                    @csrf
                    {{-- Data Penerima --}}
                    @include('monitoringBantuanModal.form.form_data_penerima')
                    {{-- Pengelolaan Modal Usaha --}}
                    @include('monitoringBantuanModal.form.form_pengelolaan_modal_usaha')
                    {{-- Hasil Usaha --}}
                    @include('monitoringBantuanModal.form.form_hasil_usaha')
                    {{-- Lain Lain --}}
                    @include('monitoringBantuanModal.form.form_lain_lain')

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success px-3 py-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection