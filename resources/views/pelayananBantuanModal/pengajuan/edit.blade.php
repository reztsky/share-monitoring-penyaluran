@extends('layout')
@section('link-active-pelayanan-modal', 'active')
@section('content')
    <div class="app-card-body">
        <div class="row">
            <div class="col-12">
                <h3 class="app-page-title">Tambah Data Pengajuan Alat Bantu Disabilitas</h3>
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('pelayanan.pengajuan.index') }}" class="btn px-2 py-1"
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

                <form action="{{ route('pelayanan.pengajuan.update', $pengajuan_kebutuhan->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row app-card shadow-sm bg-white p-3">
                        <div class="app-card-body">
                            <div class="g-3">
                                <h5 class="mb-4">DATA PENERIMA</h5>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Tanggal Pengajuan</label>
                                    <div class="col-sm-8">
                                        <input type="date"  class="form-control" value="{{$pengajuan_kebutuhan->tanggal_pengajuan}}" id="tanggal_pengajuan" placeholder="tanggal_pengajuan" name="tanggal_pengajuan" >
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">NIK</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{ $pengajuan_kebutuhan->nik }}"
                                            id="nik" placeholder="NIK" name="nik">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">No. KK</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" value="{{ $pengajuan_kebutuhan->no_kk }}"
                                            id="no_kk" placeholder="No. KK" name="no_kk">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Nama Penerima</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{ $pengajuan_kebutuhan->nama }}"
                                            id="nama" placeholder="Nama Penerima" name="nama">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-8 pt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="p" value="P" @checked($pengajuan_kebutuhan->getRawOriginal('jenis_kelamin') == 'P')>
                                            <label class="form-check-label" for="p">Perempuan</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="l" value="L" @checked($pengajuan_kebutuhan->getRawOriginal('jenis_kelamin') == 'L')>
                                            <label class="form-check-label" for="l">Laki - laki</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                            value="{{ $pengajuan_kebutuhan->tempat_lahir }}" id="tempat_lahir"
                                            placeholder="Tempat Lahir" name="tempat_lahir">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control"
                                            value="{{ $pengajuan_kebutuhan->tanggal_lahir }}" id="tanggal_lahir"
                                            name="tanggal_lahir">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Kecamatan</label>
                                    <div class="col-sm-8">
                                        <select name="kecamatan" id="kecamatan" class="form-select">
                                            <option value="">Kecamatan</option>
                                            @foreach ($kecamatans as $kecamatan)
                                                <option value="{{ $kecamatan->kecamatan }}" data-idKecamatan="{{$kecamatan->id}}" @selected($pengajuan_kebutuhan->kecamatan == $kecamatan->kecamatan)>
                                                    {{ $kecamatan->kecamatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Kelurahan</label>
                                    <div class="col-sm-8">
                                        <select name="kelurahan" id="kelurahan" class="form-select">
                                            <option value="">Kelurahan</option>
                                            @foreach ($kelurahans as $kelurahan)
                                                <option value="{{ $kelurahan->kelurahan }}" @selected($pengajuan_kebutuhan->kelurahan == $kelurahan->kelurahan)>
                                                    {{ $kelurahan->kelurahan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">RW</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control"
                                            value="{{ $pengajuan_kebutuhan->rw }}" id="rw" placeholder="RW"
                                            name="rw">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">RT</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control"
                                            value="{{ $pengajuan_kebutuhan->rt }}" id="rt" placeholder="RT"
                                            name="rt">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control"
                                            value="{{ $pengajuan_kebutuhan->alamat }}" id="alamat_ktp"
                                            placeholder="Alamat KTP" name="alamat">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label fw-bold">No. Hp</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control"
                                            value="{{ $pengajuan_kebutuhan->no_hp }}" id="no_hp"
                                            placeholder="No. Hp" name="no_hp">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Jenis Alat Bantu
                                        Disabilitas</label>
                                    <div class="col-sm-8">
                                        <select name="id_jenis_kebutuhan" id="jenis_banmod" class="form-select">
                                            <option value="">Jenis Alat Bantu Disabilitas </option>
                                            @foreach ($jenis_kebutuhans as $jenis_kebutuhan)
                                                <option value="{{ $jenis_kebutuhan->id }}" @selected($jenis_kebutuhan->id == $pengajuan_kebutuhan->id_jenis_kebutuhan)>
                                                    {{ $jenis_kebutuhan->nama_kebutuhan }}</option>
                                            @endforeach
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
@push('script')
    <script>
        $('#kecamatan').on('change', function(e) {
            var id_kecamatan = $(this).find('option:selected').attr('data-idKecamatan');
            var url = "{{ route('pelayanan.pengajuan.findKecamatan', '') }}/"
            $.ajax({
                url: url + id_kecamatan,
                success: function(kelurahans) {
                    var opt = `<option value="">Silahkan Pilih</option>`
                    $.each(kelurahans, (index, kelurahan) => {
                        opt +=
                            `<option value="${kelurahan.kelurahan}">${kelurahan.kelurahan}</option>`
                    })
                    $('#kelurahan').html(opt)
                }
            })
        })
    </script>
@endpush
