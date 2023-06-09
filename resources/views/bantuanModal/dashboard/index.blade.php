@extends('layout')
@section('link-active-bantuan-modal', 'active')
@section('link-active-bantuan-modal-dashboard', 'active')

@section('content')
    <div class="row">
        <h5 class="mt-4">Rekap Bantuan Modal 2023</h5>
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
                                @foreach ($rekap as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row['jenis_bantuan_modal'] }}</td>
                                        <td> <a
                                                href="{{ route('bantuanmodal.dashboard.detail', [
                                                    'jenis_bantuan' => $row['jenis_bantuan_modal'],
                                                    'kategori' => 'TOTAL',
                                                ]) }}">{{ $row['total'] }}</a>
                                        </td>
                                        <td> <a
                                                href="{{ route('bantuanmodal.dashboard.detail', [
                                                    'jenis_bantuan' => $row['jenis_bantuan_modal'],
                                                    'kategori' => 'TERSALUR',
                                                ]) }}">{{ $row['tersalur'] }}</a>
                                        </td>
                                        <td> <a
                                                href="{{ route('bantuanmodal.dashboard.detail', [
                                                    'jenis_bantuan' => $row['jenis_bantuan_modal'],
                                                    'kategori' => 'SISA',
                                                ]) }}">{{ $row['sisa'] }}</a>
                                        </td>
                                    </tr>
                                @endforeach
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
