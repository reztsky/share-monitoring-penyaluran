@extends('layout')
@section('link-active-pengajuan-modal', 'active')
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
            box-shadow: 0px 8px 15px rgba(109, 91, 91, 0.1);
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

        .ff {
            text-align: left;
            display: inline-block;
        }

        th {
            cursor: pointer;
        }

        .view {
            margin: auto;
            width: auto;
        }

        .wrapper {
            position: relative;
            overflow: auto;
            white-space: nowrap;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css">
@endpush
@section('content')
    <div class="row">
        <h3 class="app-page-title">Pemeriksaan dan Pengukuran Bantuan Alat Disabilitas</h3>
        <div class="col-md-12 col-sm-12 col-12">
            <div class="app-card shadow-sm mb-5">
                <div class="app-card-body p-3">
                    <div class="view">
                        <form action="{{route('pelayanan.dashboard.index')}}" method="get">
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-6">
                                    <label for="">Tanggal Pengajuan</label>
                                    <input type="date" class="form-control" name="tanggal_pengajuan" value="{{request('tanggal_pengajuan')}}">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <button type="submit" class="btn btn-sm" style="background-color: #5EC2AF;color:white;">Filter</button>
                                </div>
                                {{-- <div class="col-md-4 align-item-end">
                                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                </div> --}}
                            </div>
                        </form>
                        <div class="wrapper">
                            <table id="example" class="table-responsive table-striped pt-2 pb-2" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="background-color: #5EC2AF;color:white;">No</th>
                                        <th style="background-color: #5EC2AF;color:white;">Jenis Alat Bantu</th>
                                        <th style="background-color: #5EC2AF;color:white;">Jumlah Pengajuan</th>
                                        <th style="background-color: #5EC2AF;color:white;">Jumlah Tersalur</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($rekaps as $rekap)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rekap->nama_kebutuhan }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('pelayanan.dashboard.detail', ['jenis_bantuan' => $rekap->id, 'kategori' => 'PENGAJUAN']) }}">{{ $rekap->pengajuan_count }}</a>
                                            </td>
                                            <td><a
                                                    href="{{ route('pelayanan.dashboard.detail', ['jenis_bantuan' => $rekap->id, 'kategori' => 'PENYALURAN']) }}">{{ $rekap->penyaluran_count }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr style="background-color: #5EC2AF;color:white;">
                                        <th colspan="2">Total</th>
                                        <th>{{ number_format($rekaps->sum('pengajuan_count'), 0, ',', '.') }}</th>
                                        <th>{{ number_format($rekaps->sum('penyaluran_count'), 0, ',', '.') }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
        @push('script')
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
        @endpush
