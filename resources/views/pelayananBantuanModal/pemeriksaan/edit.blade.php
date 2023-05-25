@extends('layout')
@section('link-active-pelayanan-modal', 'active')
@section('content')
    <div class="app-card-body">
        <div class="row">
            <div class="col-12">
                <h3 class="app-page-title">Pemeriksaan dan Pengukuran Alat Bantu Disabilitas</h3>
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('pelayanan.pemeriksaan.index') }}" class="btn px-2 py-1"
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
                @if ($pemeriksaan_kebutuhan->getRawOriginal('verifikasi')!=0)
                    <div class="alert alert-warning">
                        <p class="m-0 p-0 fw-bold fs-5">Data Sudah Diverifkasi</p>
                    </div>
                @endif
                <div class="row app-card shadow-sm bg-white p-3">
                    <div class="app-card-body">
                        <div class="g-3">
                            <h5 class="mb-4">DATA PENERIMA</h5>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->nik }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">No. KK</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->no_kk }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Nama Penerima</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->nama }} </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8 pt-2">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->jenis_kelamin }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->tempat_lahir }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->tanggal_lahir }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->kecamatan }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kelurahan</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->kelurahan }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RW</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->rw }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RT</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->rt }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->alamat }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label fw-bold">No. Hp</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->no_hp }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Alat Bantu
                                    Disabilitas</label>
                                <div class="col-sm-8">
                                    {{ $pemeriksaan_kebutuhan->pengajuan->kebutuhan->nama_kebutuhan }}
                                </div>
                            </div>
                            <hr />
                            <form action="{{ route('pelayanan.pemeriksaan.update', $pemeriksaan_kebutuhan->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="app-card-body">
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-4 col-form-label">Dokumentasi Pengukuran</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" name="bap"
                                                id="bap" accept="pdf/*" style="min-height:45px">
                                            <a class="text-decoration-underline" href="{{asset('storage/bap_pemeriksaan/'.$pemeriksaan_kebutuhan->bap)}}">{{$pemeriksaan_kebutuhan->bap}}</a>
                                            @error('bap')
                                                <div class="form-text text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-4 col-form-label">Verifikasi</label>
                                        <div class="col-sm-8">
                                            <select name="verifikasi" id="" class="form-select">
                                                <option value="">Silahkan Pilih</option>
                                                <option value="1" @selected($pemeriksaan_kebutuhan->getRawOriginal('verifikasi')==1)>Setuju</option>
                                                <option value="2" @selected($pemeriksaan_kebutuhan->getRawOriginal('verifikasi')==2)>Tolak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button class="btn btn-success px-3 py-1">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
