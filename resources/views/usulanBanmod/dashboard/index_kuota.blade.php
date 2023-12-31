@extends('layout')
@push('style')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        .expand{
            cursor: pointer;
        }
    </style>
@endpush
@section('link-active-usulan-bantuan-modal', 'active')
@section('content')
    <h1 class="app-page-title">Usulan Bantuan Modal > Dashboard Kuota</h1>
    <div class="col-md-12 col-12">
        <div class="bg-white p-3 my-2 shadow rounded-3">
            <div class="table-responsive">
                <table class="table table-hover mb-0 text-left" id="table-dashboard">
                    <thead class="" style="background-color: #5EC2AF;color:white">
                        <tr class="kecamatan">
                            <th>No.</th>
                            <th>KECAMATAN / KELURAHAN</th>
                            <th>KUOTA AWAL</th>
                            <th>KUOTA TERSEDIA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kuotas->groupBy('kecamatan') as $kuota)
                            <tr class="kecamatan table-success">
                                <th>{{ $loop->iteration }}</th>
                                <th class="expand">{{ $kuota->first()->kecamatan }} <span>+</span></th>
                                <th>{{ $kuota->sum('kuota_awal') }}</th>
                                <th>{{ $kuota->sum('kuota_sisa') }}</th>
                            </tr>
                            @foreach ($kuotas->where('kecamatan', $kuota->first()->kecamatan) as $kelurahan)
                                <tr class="">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kelurahan->kelurahan }}</td>
                                    <td>{{ $kelurahan->kuota_awal }}</td>
                                    <td>{{ $kelurahan->kuota_sisa }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="kecamatan">
                            <th colspan="2">Total</th>
                            <th>{{ $kuotas->sum('kuota_awal') }}</th>
                            <th>{{ $kuotas->sum('kuota_sisa') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        // let table = new DataTable('#table-dashboard');
    </script>
    <script>
        $(document).ready(function() {
            $('tr:not(.kecamatan)').hide();

            $('tr.kecamatan').click(function() {
                $(this).find('span').text(function(_, value) {
                    return value == '+' ? '-' : '+'
                });

                $(this).nextUntil('tr.kecamatan').slideToggle(100, function() {});
            });
        })
    </script>
@endpush
