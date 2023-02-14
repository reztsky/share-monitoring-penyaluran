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
            .white, .white a {
            color: #fff;
            }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Monitoring Bantuan Modal</h3>
            <div class="d-flex justify-content-center mb-3">
                <a href="{{route('bantuanmodal.monitoring.create')}}" class="button" style="padding-top: 5px">Tambah Monitoring</a>
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
                                <tr>
                                    <td class="cell">No.</td>
                                    <td class="cell">No.</td>
                                    <td class="cell">No.</td>
                                    <td class="cell">No.</td>
                                    <td>
                                        <a href="#" class="col-md-5 btn btn-sm" style="background-color: #4CBCA1">
                                            <i class="bi bi-eye-fill white"></i>
                                        </a>
                                        
                                        <a class="col-md-5 btn btn-sm"
                                            style="background-color: #BC4C4C;color:white"
                                            href="#"
                                            onclick="return confirm('Yakin Ingin Menghapus Data ?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection