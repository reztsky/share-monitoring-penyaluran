@extends('layout')
@section('link-active-pelayanan-modal','active')
@section('content')
<div class="app-card-body">
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Tambah Data Pengajuan Alat Bantu Disabilitas</h3>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('pelayanan.pengajuan.index')}}" class="btn px-2 py-1"
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

            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row app-card shadow-sm bg-white p-3">
                    <div class="app-card-body">
                        <div class="g-3">
                            <h5 class="mb-4">DATA PENERIMA</h5>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    <input type="number"  class="form-control" value="" id="nik" placeholder="NIK" name="NIK" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">No. KK</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" value="" id="no_kk" placeholder="No. KK" name="no_kk" >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Nama Penerima</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('nama_penerima')}}" id="nama_penerima" placeholder="Nama Penerima"
                                        name="nama_penerima">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8 pt-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenkel"
                                            id="p" value="1">
                                        <label class="form-check-label" for="p">Perempuan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenkel"
                                            id="l" value="2">
                                        <label class="form-check-label" for="l">Laki - laki</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('tempat_lahir')}}" id="tempat_lahir" placeholder="Tempat Lahir"
                                        name="tempat_lahir">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" value="{{old('tanggal_lahir')}}" id="tanggal_lahir" name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    <select name="kecamatan" id="kecamatan" class="form-select">
                                        <option value="">Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kelurahan</label>
                                <div class="col-sm-8">
                                    <select name="kelurahan" id="kelurahan" class="form-select">
                                        <option value="">Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RW</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" value="{{old('rw')}}" id="rw" placeholder="RW"
                                        name="rw">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RT</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" value="{{old('rt')}}" id="rt" placeholder="RT"
                                        name="rt">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('alamat_ktp')}}" id="alamat_ktp" placeholder="Alamat KTP" name="alamat_ktp"
                                    >
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label fw-bold">No. Hp</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" value="{{old('no_hp')}}" id="no_hp" placeholder="No. Hp" name="no_hp" min=0>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Alat Bantu Disabilitas</label>
                                <div class="col-sm-8">
                                    <select name="jenis_banmod" id="jenis_banmod" class="form-select">
                                        <option value="">Jenis Alat Bantu Disabilitas </option>
                                        <option value="01">Kaki Palsu</option>
                                        <option value="02">Tangan Palsu</option>
                                        <option value="03">Alat Bantu Dengar</option>
                                        <option value="04">Kursi Roda</option>
                                        <option value="05">Walker</option>
                                        <option value="06">Stroller</option>
                                        <option value="07">Kurk</option>
                                        <option value="08">Tongkat Adaptif</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-success px-3 py-1">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection