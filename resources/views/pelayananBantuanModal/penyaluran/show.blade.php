@extends('layout')
@section('link-active-pelayanan-modal','active')
@section('content')
<div class="app-card-body">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{url()->previous()}}" class="btn px-2 py-1"
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
                            <h5 class="mb-4">HASIL PENYALURAN ALAT BANTUAN</h5>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Asal Surat</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->asal_surat}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->nik}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">No. KK</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->no_kk}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Nama Penerima</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->nama}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8 pt-2">
                                    {{$pengajuan_kebutuhan->jenis_kelamin}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->tempat_lahir}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->tanggal_lahir}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->kecamatan}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kelurahan</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->kelurahan}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RW</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->rw}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RT</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->rt}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->alamat}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label fw-bold">No. Hp</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->no_hp}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Alat Bantu Disabilitas</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->kebutuhan->nama_kebutuhan}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tanggal Salur</label>
                                <div class="col-sm-8">
                                    {{$pengajuan_kebutuhan->penyaluran->tanggal_salur}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Dokumentasi Penyaluran</label>
                                <div class="col-sm-8">
                                    <img data-action="zoom" src="{{asset('storage/dokumentasi_penyaluran/'.$pengajuan_kebutuhan->penyaluran->foto_penyaluran)}}" alt="" class="img-fluid img-thumbnail" style="object-fit: cover;width:150px">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">BAP Penyaluran</label>
                                <div class="col-sm-8">
                                    <a href="{{asset('storage/bap_penyaluran/'.$pengajuan_kebutuhan->penyaluran->bap)}}">{{$pengajuan_kebutuhan->penyaluran->bap}}</a>
                                </div>
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