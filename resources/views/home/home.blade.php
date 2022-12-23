@extends('layout')
@section('link-active-home','active')

@section('content')
    <div class="col-md-6 col-12">
        <div class="bg-white shadow rounded-3 p-3 my-3 border-1 border">
            <canvas id="chart-1" style="max-height: 350px; min-height: 350px"></canvas>
        </div>
    </div>    
    <div class="col-md-6 col-12">
        <div class="bg-white shadow rounded-3 p-3 my-3 border-1 border">
            {{-- <canvas id="chart-2" style="max-height: 350px; min-height: 350px;"></canvas> --}}
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="b-white shadow rounded-3 p-3 my-3 border-1 border">
            <h5>Rekap Penyaluran BLT DBHCHT 2020 Buruh Pabrik</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>No.</th>
                            <th>Pabrik</th>
                            <th>Total Data</th>
                            <th>Tersalur</th>
                            <th>Belum Salur</th>
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
                                <td>{{$loop->iteration}}</td>
                                <td>{{$buruhPabrik['pabrik']}}</td>
                                <td>
                                    <a href="{{route('landing.detail',['lokasi'=>$buruhPabrik['pabrik'],'jenis'=>'TOTAL','statuskpm'=>1])}}">{{$buruhPabrik['total_data']}}</a>
                                </td>
                                <td><a href="{{route('landing.detail',['lokasi'=>$buruhPabrik['pabrik'],'jenis'=>'TERSALUR','statuskpm'=>1])}}">{{$buruhPabrik['tersalur']}}</a></td>
                                <td><a href="{{route('landing.detail',['lokasi'=>$buruhPabrik['pabrik'],'jenis'=>'SISA','statuskpm'=>1])}}">{{$buruhPabrik['sisa']}}</a></td>
                            </tr>
                            @php
                                $totalSalur+=$buruhPabrik['tersalur'];
                                $totalKpm+=$buruhPabrik['total_data'];
                                $totalSisa+=$buruhPabrik['sisa'];
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th>{{number_format($totalKpm,0,',','.')}}</th>
                            <th>
                                {{number_format($totalSalur,0,',','.')}}
                            </th>
                            <th>{{number_format($totalSisa,0,',','.')}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="bg-white shadow rounded-3 p-3 my-3 border-1 border">
            <h5>Rekap Penyaluran BLT DBHCHT 2022 Masyarakat Umum</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>No.</th>
                            <th>Kecamatan</th>
                            <th>Total Data</th>
                            <th>Tersalur</th>
                            <th>Belum Salur</th>
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
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row['x']}}</td>
                                
                                <td>
                                    <a href="{{route('landing.detail',['lokasi'=>$row['x'],'jenis'=>'TOTAL','statuskpm'=>2])}}">{{$row['total_data']}}</a>
                                </td>
                                <td><a href="{{route('landing.detail',['lokasi'=>$row['x'],'jenis'=>'TERSALUR','statuskpm'=>2])}}">{{$row['tersalur']}}</a></td>
                                <td><a href="{{route('landing.detail',['lokasi'=>$row['x'],'jenis'=>'SISA','statuskpm'=>2])}}">{{$row['sisa']}}</a></td>
                            </tr>
                            @php
                                $totalSalur+=$row['tersalur'];
                                $totalKpm+=$row['total_data'];
                                $totalSisa+=$row['sisa'];
                            @endphp
                        @empty
                            
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th>{{number_format($totalKpm,0,',','.')}}</th>
                            <th>
                                {{number_format($totalSalur,0,',','.')}}
                            </th>
                            <th>{{number_format($totalSisa,0,',','.')}}</th>
                        </tr>
                    </tfoot>
                </table>
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
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
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