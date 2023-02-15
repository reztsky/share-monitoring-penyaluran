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
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="app-page-title">Monitoring Bantuan Modal</h3>
        <div class="d-flex justify-content-center mb-3">
            <a href="{{route('bantuanmodal.monitoring.create')}}" class="button" style="padding-top: 5px">Tambah
                Monitoring</a>
        </div>
        <div class="app-card shadow bg-white mt-4">
            <div class="app-card-body">
                <div class="table-responsive p-2">
                    <table class="table table-hover mb-0 text-left">
                        <thead style="background-color: #5EC2AF;color:white">
                            <tr>
                                <th class="cell">No.</th>
                                <th class="cell">NIK</th>
                                <th class="cell">Nama</th>
                                <th class="cell">Jenis Modal Bantuan</th>
                                <th class="cell">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($monitorings as $monitoring)
                            <tr>
                                <td>{{$monitorings->currentPage()+$loop->index}}</td>
                                <td>{{$monitoring->kpm->nik}}</td>
                                <td>{{$monitoring->kpm->nama}}</td>
                                <td>{{$monitoring->kpm->jenis_bantuan_modal}}</td>
                                <td>
                                    <a href="{{route('bantuanmodal.monitoring.show',$monitoring->id)}}" class="col-md-5 btn btn-sm" style="background-color: #4CBCA1">
                                        <i class="bi bi-eye-fill white"></i>
                                    </a>
                                    <a class="col-md-5 btn btn-sm" style="background-color: #BC4C4C;color:white"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Found Record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-2">
                    {{$monitorings->links()}}
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
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #BC4C4C;color:white"
                    data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn" style="background-color: #4CBCA1;color:white">Ya</button>
            </div>
        </div>
    </div>
</div>
@endsection