@extends('layout')
@section('link-active-bantuan-modal', 'active')
@section('link-active-bantuan-modal-dashboard', 'active')
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
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: ##747B80;
            transform: translateY(-7px);
        }

        .white,
        .white a {
            color: #fff;
        }

        th {
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
        <div class="app-card shadow-sm rounded-3 p-3 my-3 border-1 border">
            <form action="{{ route('bantuanmodal.dashboard.index') }}" method="get">
                <div class="row mb-3">
                    <label for="" class="form-label">Tahun Anggaran</label>
                    <div class="col-md-12" style="margin-horizontal: 10px;padding-right: 15px" >
                        <select name="tahun_anggaran" id="" class="form-select">
                            @foreach (range(date('Y'), 2022) as $year)
                                <option value="{{ $year }}" @selected($year == request('tahun_anggaran'))>{{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-center" style="padding-top:15px">
                        <button class="button">Filter</button>
                    </div>
                </div>
            </form>
        </div>

    <div class="row">
        <h5 class="mt-4">Rekap Bantuan Modal {{ $tahun_anggaran }}</h5>
        <div class="col-md-12 col-sm-12 col-12">
            <div class="app-card shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive p-4">
                        <table class="table table-hover mb-0 text-left">
                            <thead style="background-color: #5EC2AF;color:white">
                                <tr>
                                    <th>No.</th>
                                    <th>Jenis Bantuan Modal</th>
                                    <th>Total</th>
                                    <th>Tersalur</th>
                                    <th>Belum Salur</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{dd($rekap)}} --}}
                                @forelse ($rekap as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row['jenis_bantuan_modal'] }}</td>
                                        <td> <a
                                                href="{{ route('bantuanmodal.dashboard.detail', [
                                                    'tahun'=>is_null(request('tahun_anggaran')) ? date('Y') : request('tahun_anggaran'),
                                                    'jenis_bantuan' => $row['jenis_bantuan_modal'],
                                                    'kategori' => 'TOTAL',
                                                ]) }}">{{ $row['total'] }}</a>
                                        </td>
                                        <td> <a
                                                href="{{ route('bantuanmodal.dashboard.detail', [
                                                    'tahun'=>is_null(request('tahun_anggaran')) ? date('Y') : request('tahun_anggaran'),
                                                    'jenis_bantuan' => $row['jenis_bantuan_modal'],
                                                    'kategori' => 'TERSALUR',
                                                ]) }}">{{ $row['tersalur'] }}</a>
                                        </td>
                                        <td> <a
                                                href="{{ route('bantuanmodal.dashboard.detail', [
                                                    'tahun'=>is_null(request('tahun_anggaran')) ? date('Y') : request('tahun_anggaran'),
                                                    'jenis_bantuan' => $row['jenis_bantuan_modal'],
                                                    'kategori' => 'SISA',
                                                ]) }}">{{ $row['sisa'] }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="fw-bold text-center">Data Tidak Ditemukan !</td>
                                    </tr>
                                
                                @endforelse
                            </tbody>
                            <tfoot style="background-color: #5EC2AF;color:white">
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th>{{ $rekap->sum('total') }}</th>
                                    <th>{{ $rekap->sum('tersalur') }}</th>
                                    <th>{{ $rekap->sum('sisa') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
