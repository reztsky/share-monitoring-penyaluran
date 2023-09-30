@extends('layout')
@section('link-active-blt', 'active')
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
            margin-top:5px;
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
    <h1 class="app-page-title">Dashboard</h1>
    <div class="col-md-12 col-12">
        <div class="app-card shadow-sm rounded-3 p-3 my-3 border-1 border">
            <form action="{{ route('blt.dashboard.index') }}" method="get">
                <div class="d-flex justify-content-center">
                    <div class="col-md-6" style="margin-horizontal: 10px;padding-right: 15px" >
                        <label for="" class="form-label">Tahun Anggaran</label>
                        <select name="tahun_anggaran" id="" class="form-select">
                            @foreach (range(date('Y'), 2022) as $year)
                                <option value="{{ $year }}" @selected($year == request('tahun_anggaran'))>{{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6" style="margin-horizontal: 10px;padding-right: 15px" >
                        <label for="" class="form-label">Tahap</label>
                        <select name="tahap" id="" class="form-select">
                            @foreach (range(1, 3) as $tahap)
                                <option value="{{ $tahap }}" @selected($tahap == request('tahap'))>{{ $tahap }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center" style="padding-top:15px">
                    <button class="button">Filter</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="app-card shadow-sm rounded-3 p-3 my-3 border-1 border">
                <div class="app-card-body">
                    <canvas id="chart-1" style="max-height: 350px; min-height: 350px"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-12">
            <div class="mt-2 app-card shadow-sm mb-5">
                <h5 class="d-flex justify-content-center" style="padding-top:20px">Rekap Penyaluran BLT DBHCHT
                    {{ is_null(request('tahun_anggaran')) ? date('Y') : request('tahun_anggaran') }} Buruh Pabrik, Tahap
                    {{ is_null(request('tahap')) ? $tahap_max->tahap : request('tahap') }}
                </h5>
                <div class="app-card-body">
                    <div class="table-responsive p-4">
                        <table class="table table-hover mb-0 text-left">
                            <thead style="background-color: #5EC2AF;color:white">
                                <tr>
                                    <th class="cell">No.</th>
                                    <th class="cell">Pabrik</th>
                                    <th class="cell">Total Data</th>
                                    <th class="cell">Tersalur</th>
                                    <th class="cell">Belum Salur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalSalur = 0;
                                    $totalKpm = 0;
                                    $totalSisa = 0;
                                @endphp
                                @forelse ($buruhPabriks as $buruhPabrik)
                                    <tr>
                                        <td class="cell">{{ $loop->iteration }}</td>
                                        <td class="cell">{{ $buruhPabrik['pabrik'] }}</td>
                                        <td class="cell">
                                            <a
                                                href="{{ route('blt.dashboard.detail', ['lokasi' => $buruhPabrik['pabrik'], 'jenis' => 'TOTAL', 'statuskpm' => 1, 'tahun_anggaran' => request('tahun_anggaran'), 'tahap' => request('tahap')]) }}">{{ $buruhPabrik['total_data'] }}</a>
                                        </td>
                                        <td class="cell"><a
                                                href="{{ route('blt.dashboard.detail', ['lokasi' => $buruhPabrik['pabrik'], 'jenis' => 'TERSALUR', 'statuskpm' => 1, 'tahun_anggaran' => request('tahun_anggaran'), 'tahap' => request('tahap')]) }}">{{ $buruhPabrik['tersalur'] }}</a>
                                        </td>
                                        <td class="cell"><a
                                                href="{{ route('blt.dashboard.detail', ['lokasi' => $buruhPabrik['pabrik'], 'jenis' => 'SISA', 'statuskpm' => 1, 'tahun_anggaran' => request('tahun_anggaran'), 'tahap' => request('tahap')]) }}">{{ $buruhPabrik['sisa'] }}</a>
                                        </td>
                                    </tr>
                                    @php
                                        $totalSalur += $buruhPabrik['tersalur'];
                                        $totalKpm += $buruhPabrik['total_data'];
                                        $totalSisa += $buruhPabrik['sisa'];
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center fw-bold">Data Tidak Ditemukan !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot style="background-color: #5EC2AF;color:white">
                                <tr>
                                    <th class="cell" colspan="2">Total</th>
                                    <th class="cell">{{ number_format($totalKpm, 0, ',', '.') }}</th>
                                    <th class="cell">
                                        {{ number_format($totalSalur, 0, ',', '.') }}
                                    </th>
                                    <th class="cell">{{ number_format($totalSisa, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <div class="app-card  shadow-sm mb-5">
                <h5 class="d-flex justify-content-center" style="padding-top:20px">Rekap Penyaluran BLT DBHCHT
                    {{ is_null(request('tahun_anggaran')) ? date('Y') : request('tahun_anggaran') }} Masyarakat Umum, Tahap
                    {{ is_null(request('tahap')) ? $tahap_max->tahap : request('tahap') }}
                </h5>

                <div class="app-card-body">
                    <div class="table-responsive p-4">
                        <table class="table table-hover mb-0 text-left">
                            <thead style="background-color: #5EC2AF;color:white">
                                <tr>
                                    <th class="cell">No.</th>
                                    <th class="cell">Kecamatan</th>
                                    <th class="cell">Total Data</th>
                                    <th class="cell">Tersalur</th>
                                    <th class="cell">Belum Salur</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalSalur = 0;
                                    $totalKpm = 0;
                                    $totalSisa = 0;
                                @endphp
                                @forelse ($masyarakatUmum as $row)
                                    <tr>
                                        <td class="cell">{{ $loop->iteration }}</td>
                                        <td class="cell">{{ $row['x'] }}</td>

                                        <td class="cell">
                                            <a
                                                href="{{ route('blt.dashboard.detail', ['lokasi' => $row['x'], 'jenis' => 'TOTAL', 'statuskpm' => 2, 'tahun_anggaran' => request('tahun_anggaran'), 'tahap' => request('tahap') ]) }}">{{ $row['total_data'] }}</a>
                                        </td>
                                        <td class="cell"><a
                                                href="{{ route('blt.dashboard.detail', ['lokasi' => $row['x'], 'jenis' => 'TERSALUR', 'statuskpm' => 2, 'tahun_anggaran' => request('tahun_anggaran'), 'tahap' => request('tahap')]) }}">{{ $row['tersalur'] }}</a>
                                        </td>
                                        <td class="cell"><a
                                                href="{{ route('blt.dashboard.detail', ['lokasi' => $row['x'], 'jenis' => 'SISA', 'statuskpm' => 2, 'tahun_anggaran' => request('tahun_anggaran'), 'tahap' => request('tahap')]) }}">{{ $row['sisa'] }}</a>
                                        </td>
                                    </tr>
                                    @php
                                        $totalSalur += $row['tersalur'];
                                        $totalKpm += $row['total_data'];
                                        $totalSisa += $row['sisa'];
                                    @endphp
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center fw-bold">Data Tidak Ditemukan !</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot style="background-color: #5EC2AF;color:white">
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th class="cell">{{ number_format($totalKpm, 0, ',', '.') }}</th>
                                    <th class="cell">
                                        {{ number_format($totalSalur, 0, ',', '.') }}
                                    </th>
                                    <th class="cell">{{ number_format($totalSisa, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script>
        const data_2 = {
            labels: [
                'Tersalur',
                'Sisa',
            ],
            datasets: [{
                label: 'Rekap Penyaluran',
                backgroundColor: [
                    'rgb(188, 76, 76)',
                    'rgb(94, 194, 175)',
                ],
                data: {{ Js::from($chartTersalur) }}
            }]
        };

        const config_2 = {
            type: 'pie',
            data: data_2,
            options: {}
        };

        const myChart2 = new Chart(
            document.getElementById('chart-1'),
            config_2
        );
    </script>
@endpush
