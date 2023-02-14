@extends('layout')
@section('link-active-blt','active')

@section('content')
<h1 class="app-page-title">Dashboard</h1>
<div class="row">
    <div class="col-md-12 col-12">
        <div class="app-card shadow-sm rounded-3 p-3 my-3 border-1 border">
            <div class="app-card-body">
                <canvas id="chart-1" style="max-height: 350px; min-height: 350px"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-md-12 col-12">
        <h5 class="mt-4">Rekap Penyaluran BLT DBHCHT 2020 Buruh Pabrik</h5>
        <div class="mt-2 app-card shadow-sm mb-5">
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
                            $totalSalur=0;
                            $totalKpm=0;
                            $totalSisa=0;
                            @endphp
                            @foreach ($buruhPabriks as $buruhPabrik)
                            <tr>
                                <td class="cell">{{$loop->iteration}}</td>
                                <td class="cell">{{$buruhPabrik['pabrik']}}</td>
                                <td class="cell">
                                    <a
                                        href="{{route('blt.dashboard.detail',['lokasi'=>$buruhPabrik['pabrik'],'jenis'=>'TOTAL','statuskpm'=>1])}}">{{$buruhPabrik['total_data']}}</a>
                                </td>
                                <td class="cell"><a
                                        href="{{route('blt.dashboard.detail',['lokasi'=>$buruhPabrik['pabrik'],'jenis'=>'TERSALUR','statuskpm'=>1])}}">{{$buruhPabrik['tersalur']}}</a>
                                </td>
                                <td class="cell"><a
                                        href="{{route('blt.dashboard.detail',['lokasi'=>$buruhPabrik['pabrik'],'jenis'=>'SISA','statuskpm'=>1])}}">{{$buruhPabrik['sisa']}}</a>
                                </td>
                            </tr>
                            @php
                            $totalSalur+=$buruhPabrik['tersalur'];
                            $totalKpm+=$buruhPabrik['total_data'];
                            $totalSisa+=$buruhPabrik['sisa'];
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot style="background-color: #5EC2AF;color:white">
                            <tr>
                                <th class="cell" colspan="2">Total</th>
                                <th class="cell">{{number_format($totalKpm,0,',','.')}}</th>
                                <th class="cell">
                                    {{number_format($totalSalur,0,',','.')}}
                                </th>
                                <th class="cell">{{number_format($totalSisa,0,',','.')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-12">
        <h5>Rekap Penyaluran BLT DBHCHT 2022 Masyarakat Umum</h5>
        <div class="app-card  shadow-sm mb-5">
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
                            $totalSalur=0;
                            $totalKpm=0;
                            $totalSisa=0;
                            @endphp
                            @forelse ($masyarakatUmum as $row)
                            <tr>
                                <td class="cell">{{$loop->iteration}}</td>
                                <td class="cell">{{$row['x']}}</td>

                                <td class="cell">
                                    <a
                                        href="{{route('blt.dashboard.detail',['lokasi'=>$row['x'],'jenis'=>'TOTAL','statuskpm'=>2])}}">{{$row['total_data']}}</a>
                                </td>
                                <td class="cell"><a
                                        href="{{route('blt.dashboard.detail',['lokasi'=>$row['x'],'jenis'=>'TERSALUR','statuskpm'=>2])}}">{{$row['tersalur']}}</a>
                                </td>
                                <td class="cell"><a
                                        href="{{route('blt.dashboard.detail',['lokasi'=>$row['x'],'jenis'=>'SISA','statuskpm'=>2])}}">{{$row['sisa']}}</a>
                                </td>
                            </tr>
                            @php
                            $totalSalur+=$row['tersalur'];
                            $totalKpm+=$row['total_data'];
                            $totalSisa+=$row['sisa'];
                            @endphp
                            @empty

                            @endforelse
                        </tbody>
                        <tfoot style="background-color: #5EC2AF;color:white">
                            <tr>
                                <th colspan="2">Total</th>
                                <th class="cell">{{number_format($totalKpm,0,',','.')}}</th>
                                <th class="cell">
                                    {{number_format($totalSalur,0,',','.')}}
                                </th>
                                <th class="cell">{{number_format($totalSisa,0,',','.')}}</th>
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
        data: {{Js::from($chartTersalur)}}
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