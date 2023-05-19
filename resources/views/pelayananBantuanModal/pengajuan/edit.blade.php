@extends('layout')
@section('link-active-pelayanan-modal','active')
@section('content')
<div class="app-card-body">
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Edit Data Pengajuan Bantuan Modal</h3>
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
                                <label for="" class="col-sm-4 col-form-label">Jenis Bantuan</label>
                                <div class="col-sm-8">
                                    <select name="jenis_banmod" id="jenis_banmod" class="form-select">
                                        <option value="">Jenis Bantuan </option>
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
@push('script')

@endpush
@endsection