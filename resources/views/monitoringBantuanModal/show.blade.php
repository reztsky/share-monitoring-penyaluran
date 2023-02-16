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
    .bold{
        font-weight: bold;
    }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="app-page-title">Hasil Monitoring Bantuan Modal</h3>
            <div class="row app-card shadow-sm bg-white p-3 mt-4">
                <div class="app-card-body">
                    <div class="g-3">
                        <h5 class="mb-4">DATA PENERIMA</h5>
                        <div class="row mb-3 ">
                            <label for="" class="col-sm-3 col-form-label">NIK</label>
                            <p id="nik" class="bold col-sm-9 col-form-label form-label">NIK</p>
                        </div>

                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Nama Penerima</label>
                            <p id="nama_penerima" class="bold col-sm-9 col-form-label form-label">Nama</p>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Alamat KTP</label>
                            <p id="alamat_ktp" class="bold col-sm-9 col-form-label form-label">Alamat</p>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Alamat Tempat Usaha</label>
                            <p id="alamat_tempat_usaha" class="bold col-sm-9 col-form-label form-label">Alamat Tempat Usaha</p>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">No. Hp</label>
                            <p id="no_hp" class="bold col-sm-9 col-form-label form-label">No. Hp</p>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Jenis Modal Usaha</label>
                            <p id="jenis_bantuan_modal" class="bold col-sm-9 col-form-label form-label">Jenis modal Usaha</p>
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
                            <p class="bold col-sm-9 col-form-label form-label" id="pengelolaan_usaha">Pengelolaan Usaha</p>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Bentuk Usaha</label>
                            <p class="bold col-sm-9 col-form-label form-label" id="bentuk_usaha">Bentuk Usaha</p>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-3 col-form-label">Pengunaan Bantuan</label>
                            <p class="bold col-sm-9 col-form-label form-label" id="penggunaan_bantuan">Pengunaan Bantuan</p>
                        </div>
                        <div class="row mb-3" id="form-alasan-penggunaan-bantuan">
                            <label for="" class="col-sm-3 col-form-label">Alasan Belum Digunakan</label>
                            <p class="bold col-sm-9 col-form-label form-label" id="alasan_penggunaan_bantuan">Alasan Belum Digunakan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row app-card shadow-sm bg-white p-3 mt-4">
                <div class="app-card-body">

                </div>
            </div>

            <div class="row app-card shadow-sm bg-white p-3 mt-4">
                <div class="app-card-body">
                    <div class="g-3">
                        <h5 class="mb-4">Lain - Lain</h5>
                        <div class="row mb-3 ">
                            <label for="" class="col-sm-2 col-form-label">Kendala</label>
                            <div class="col-sm-10">
                                <p class="text" id="kendala">Kendala</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Harapan</label>
                            <div class="col-sm-10">
                                <p class="text" id="harapan">Harapan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection