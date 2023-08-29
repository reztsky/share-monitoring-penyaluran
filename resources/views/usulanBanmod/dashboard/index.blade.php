@extends('layout')
@section('link-active-usulan-bantuan-modal', 'active')
@section('content')
    <h1 class="app-page-title">Usulan Bantuan Modal > Dashboard</h1>
    <div class="col-md-12 col-12">
        <div class="bg-white p-3 my-2 shadow rounded-3">
            <div class="table-responsive">
                <table class="table table-hover mb-0 text-left">
                    <thead class="" style="background-color: #5EC2AF;color:white">
                        <tr>
                            <th>No.</th>
                            <th>Jenis Bantuan Modal</th>
                            <th>Jumlah Usulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenisBanmods->pluck('jenis_bantuan_modal') as $jenisBanmod)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jenisBanmod }}</td>
                                <td><a
                                        href="{{ route('usulan_dbhcht.detail', [
                                            'jenis_bantuan_modal' => $jenisBanmod,
                                        ]) }}">
                                        {{ $count_dashboard->where('jenis_bantuan_modal', $jenisBanmod)->first()->jumlah ?? 0 }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th>{{ $count_dashboard->where('jenis_bantuan_modal','<>',"")->sum('jumlah') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
