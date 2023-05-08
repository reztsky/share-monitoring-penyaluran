@extends('layout')
@section('link-active-monev-modal','active')
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="app-page-title">Edit Data Monitoring Bantuan Modal</h3>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url()->previous() }}" class="btn px-2 py-1"
                style="background-color: #BC4C4C;color:white;width:100px">Kembali</a>
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
        <form action="{{route('bantuanmodal.monitoring.update',$monitoring->id)}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row app-card shadow-sm bg-white p-3">
                    <div class="app-card-body">
                        @include('monitoringBantuanModal.transaksi.form_edit.form_data_penerima')
                    </div>
                </div>

                <div class="row app-card shadow-sm bg-white p-3 mt-4">
                    <div class="app-card-body">
                        {{-- Pengelolaan Modal Usaha --}}
                        @include('monitoringBantuanModal.transaksi.form_edit.form_pengelolaan_modal_usaha')
                        <hr />
                        {{-- Hasil Usaha --}}
                        @include('monitoringBantuanModal.transaksi.form_edit.form_hasil_usaha')
                        
                        
                    </div>
                </div>

                <div class="row app-card shadow-sm bg-white p-3 mt-4">
                    <div class="app-card-body">
                        {{-- Lain Lain --}}
                        @include('monitoringBantuanModal.transaksi.form_edit.form_lain_lain')
                    </div>
                </div>
        </form>
    </div>
</div>
</div>
@endsection