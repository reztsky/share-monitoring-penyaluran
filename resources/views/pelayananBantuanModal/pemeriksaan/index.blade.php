@extends('layout')
@section('link-active-monitoring', 'active')
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
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Pemeriksaan dan Pengukuran Bantuan Modal</h3>

            <div class="app-card shadow bg-white mt-4 p-2">
                <div class="app-card-body">
                    <form action="{{ route('pelayanan.pemeriksaan.index') }}" method="get">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <select name="id_jenis_kebutuhan" id="id_jenis_kebutuhan" class="form-select"
                                    style="height: 40px">
                                    <option value="">Jenis Alat Bantu Disabilitas </option>
                                    @foreach ($jenis_kebutuhans as $jenis_kebutuhan)
                                        <option value="{{ $jenis_kebutuhan->id }}" @selected(request('id_jenis_kebutuhan') == $jenis_kebutuhan->id)>
                                            {{ $jenis_kebutuhan->nama_kebutuhan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" placeholder="Cari Data" class="form-control" name="keyword"
                                        value="{{ request('keyword') }}">
                                    <button type="submit" class="btn"
                                        style="background-color: #5EC2AF;color:white"><span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg></span></button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0 text-left">
                            <thead style="background-color: #5EC2AF;color:white">
                                <tr>
                                    <th class="cell">No.</th>
                                    <th class="cell">NIK</th>
                                    <th class="cell">Nama</th>
                                    <th class="cell">Jenis Alat Bantu</th>
                                    <th class="cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan_kebutuhans as $pengajuan_kebutuhan)
                                    <tr>
                                        <td>{{ $pengajuan_kebutuhans->firstItem() + $loop->index }}</td>
                                        <td>{{ $pengajuan_kebutuhan->nik }}</td>
                                        <td>{{ $pengajuan_kebutuhan->nama }}</td>
                                        <td>{{ $pengajuan_kebutuhan->kebutuhan->nama_kebutuhan }}</td>
                                        <td>
                                            <a href="{{ route('pelayanan.pemeriksaan.show', '') }}"
                                                class="col-md-4 btn btn-sm" style="background-color: #4CBCA1;height: 34px">
                                                <i class="bi bi-eye-fill white"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$pengajuan_kebutuhans->links()}}
                    </div>
                </div>
                
               
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin Menghapus Data Ini ?
            </div>
            <a href=""></a>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #BC4C4C;color:white"
                    data-bs-dismiss="modal">Batal</button>
                <a href="" class="btn" id="confirm-delete" style="background-color: #4CBCA1;color:white">Ya</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Acc-->
<div class="modal fade" id="exampleModals" aria-labelledby="exampleModalLabels" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabels">Verifikasi Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="{{ asset('img/warning.png') }}" alt="alert" width="200" height="200">
                    <p style="color:#BC4C4C"><strong>SETELAH VERIFIKASI TIDAK DAPAT DIUBAH, APAKAH ANDA MENYETUJUI PENGAJUAN ALAT BANTU INI ?</strong></p>
                </center>
            </div>
            <hr/>
            <div class="pb-3">
                <div class="row">
                    <div class="col" style="padding-left: 170px">
                        <form action="" method="post" id="verif-tolak" class="verifikasi" >
                            @csrf
                            <input type="hidden" name="status_pengajuan" id="" value="2">
                            <button type="submit" class="btn" id="btn-tolak" data-bs-dismiss="modal"
                                style="background-color: #BC4C4C;color:white">Tolak</a>
                        </form>
                    </div>
                    <div class="col" style="padding-right: 170px">
                        <form action="" method="post" id="verif-terima" class="verifikasi">
                            @csrf
                            <input type="hidden" name="status_pengajuan" id="" value="1">
                            <button type="submit" class="btn" id="btn-terima" data-bs-dismiss="modal"
                                style="background-color: #257BB7;color:white">Terima</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @push('script')
<script>
    $('.btn-delete').on('click',function(e){
            var id=$(this).attr('data-model-id')
            var url="{{route('bantuanmodal.monitoring.delete','')}}/"+id
            $('#confirm-delete').attr('href',url)
        })
</script>
@endpush --}}
