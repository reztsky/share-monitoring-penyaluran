@extends('layout')
@section('link-active-monitoring','active')
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="app-page-title">Tambah Data Monitoring Bantuan Modal</h3>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{route('bantuanmodal.monitoring.index')}}" class="btn px-2 py-1"
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
        
        <form action="{{route('bantuanmodal.monitoring.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row app-card shadow-sm bg-white p-3">
                    <div class="app-card-body">
                        @include('monitoringBantuanModal.form.form_data_penerima')
                    </div>
                </div>

                <div class="row app-card shadow-sm bg-white p-3 mt-4">
                    <h5 class="mb-4">Pengelolaan Modal Usaha</h5>
                    <div class="mb-3">
                        <center>
                            <label for="" class="col-form-label"><strong>Penggunaan Bantuan</strong></label><br/>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radio_penggunaan_bantuan" id="RadioOptions" value="1" onchange="showStatus(this)">
                                <label class="form-check-label" for="RadioOptions">Sudah Digunakan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radio_penggunaan_bantuan" id="RadioOptions" value="2" onchange="showStatus(this)">
                                <label class="form-check-label" for="RadioOptions">Belum Digunakan</label>
                            </div>
                        </center>
                    </div>
                    <div class="app-card-body">
                        {{-- Modal Usaha Belum Digunakan --}}
                        <div id="form-belum-digunakan" style="display: none">
                            @include('monitoringBantuanModal.form.form_belum_digunakan')
                        </div>

                        {{-- Pengelolaan Modal Usaha --}}
                        <div id="form-modal-usaha" style="display: none">
                            @include('monitoringBantuanModal.form.form_pengelolaan_modal_usaha')
                        </div>
                        
                        {{-- Hasil Usaha --}}
                        <div id="form-hasil-usaha" style="display: none">
                            @include('monitoringBantuanModal.form.form_hasil_usaha')
                        </div>
                        
                        
                    </div>
                </div>

                <div class="row app-card shadow-sm bg-white p-3 mt-4">
                    <div class="app-card-body">
                        {{-- Lain Lain --}}
                        @include('monitoringBantuanModal.form.form_lain_lain')
                    </div>
                </div>
        </form>
    </div>
</div>
@push('script')
<script>
    function showStatus(select) {
        if (select.value == 1) {
            document.getElementById('form-modal-usaha').style.display = "block"
            document.getElementById('form-hasil-usaha').style.display = "block"
            document.getElementById('form-belum-digunakan').style.display = "none"
        } else if (select.value == 2){
            document.getElementById('form-modal-usaha').style.display = "none"
            document.getElementById('form-hasil-usaha').style.display = "none"
            document.getElementById('form-belum-digunakan').style.display = "block"
        }
    }
</script>
@endpush
@endsection