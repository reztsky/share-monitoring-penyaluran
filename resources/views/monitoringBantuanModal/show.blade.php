@extends('layout')
@section('link-active-monitoring','active')
@push('style')
<style>
    .button {
        width: 200px;
        height: 35px;
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        /* letter-spacing: 2.5px; */
        font-weight: 500;
        color: white;
        background-color: #5EC2AF;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        text-align: center;
    }

    .button:hover {
        background-color: white;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: ##747B80;
        transform: translateY(-7px);
    }

    .white,
    .white a {
        color: #fff;
    }

    .bold {
        font-weight: bold;
    }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="app-page-title">Hasil Monitoring Bantuan Modal</h3>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{route('bantuanmodal.monitoring.index')}}" class="btn px-2 py-1"
                style="background-color: #BC4C4C;color:white;width:100px">Kembali</a>
        </div>
        <div class="row app-card shadow-sm bg-white p-3 mt-4">
            <div class="app-card-body">
                <div class="g-3">
                    <h5 class="mb-4">DATA PENERIMA</h5>
                    <div class="row mb-3 ">
                        <label for="" class="col-sm-3 col-form-label">NIK</label>
                        <p id="nik" class="bold col-sm-9 col-form-label form-label">{{$monitoring->kpm->nik}}</p>
                    </div>

                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Nama Penerima</label>
                        <p id="nama_penerima" class="bold col-sm-9 col-form-label form-label">{{$monitoring->kpm->nama}}
                        </p>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Alamat KTP</label>
                        <p id="alamat_ktp" class="bold col-sm-9 col-form-label form-label">{{$monitoring->kpm->alamat}}
                        </p>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Alamat Tempat Usaha</label>
                        <p id="alamat_tempat_usaha" class="bold col-sm-9 col-form-label form-label">
                            {{$monitoring->alamat_tempat_usaha}}</p>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">No. Hp</label>
                        <p id="no_hp" class="bold col-sm-9 col-form-label form-label">{{$monitoring->no_hp}}</p>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Jenis Modal Usaha</label>
                        <p id="jenis_bantuan_modal" class="bold col-sm-9 col-form-label form-label">
                            {{$monitoring->jenis_bantuan_modal}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row app-card shadow-sm bg-white p-3 mt-4">
            <div class="app-card-body">
                <div class="g-3">
                    <h5 class="mb-4">Pengelolaan Modal Usaha</h5>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Pengelolaan Usaha</label>
                        <p class="bold col-sm-9 col-form-label form-label" id="pengelolaan_usaha">
                            {{$monitoring->pengelolaan_usaha}}</p>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Bentuk Usaha</label>
                        <p class="bold col-sm-9 col-form-label form-label" id="bentuk_usaha">
                            {{$monitoring->bentuk_usaha}}</p>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label">Pengunaan Bantuan</label>
                        <p class="bold col-sm-9 col-form-label form-label" id="penggunaan_bantuan">
                            {{$monitoring->penggunaan_bantuan}}</p>
                    </div>
                    <div class="row mb-3" id="form-alasan-penggunaan-bantuan">
                        <label for="" class="col-sm-3 col-form-label">Alasan Belum Digunakan</label>
                        <p class="bold col-sm-9 col-form-label form-label" id="alasan_penggunaan_bantuan">
                            {{$monitoring->alasan_penggunaan_bantuan}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row app-card shadow-sm bg-white p-3 mt-4">
            <div class="app-card-body">
                @switch($monitoring->jenis_bantuan_modal)
                    @case('MENJAHIT')
                        @include('monitoringBantuanModal.show.menjahit')
                    @break
                    @case('CUCI KENDARAAN')
                        @include('monitoringBantuanModal.show.cuci_kendaraan')
                    @break
                    @case('KOPI KELILING')
                        @include('monitoringBantuanModal.show.kopi_keliling')
                    @break
                    @case('LAUNDRY')
                        @include('monitoringBantuanModal.show.laundry')
                    @break
                    @case('TOKO KELONTONG')
                        @include('monitoringBantuanModal.show.toko_kelontong')
                    @break
                @default
                    @include('monitoringBantuanModal.show.warung_kopi')
                @endswitch
            </div>
        </div>

        <div class="row app-card shadow-sm bg-white p-3 mt-4">
            <div class="app-card-body">
                <div class="g-3">
                    <h5 class="mb-4">Lain - Lain</h5>
                    <div class="row mb-3 ">
                        <label for="" class="col-sm-2 col-form-label">Kendala</label>
                        <div class="col-sm-10">
                            <p class="text" id="kendala">{{$monitoring->kendala}}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Harapan</label>
                        <div class="col-sm-10">
                            <p class="text" id="harapan">{{$monitoring->harapan}}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Dokumentasi</label>
                        <div class="col-sm-10">
                            <img src="{{asset('storage/foto_monitoring/'.$monitoring->dokumentasi)}}" alt="" class="img-fluid img-thumbnail" style="object-fit:contain; max-width:150px; max-height:150px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection