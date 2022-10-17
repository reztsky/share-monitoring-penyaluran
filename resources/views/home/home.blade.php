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
            <canvas id="chart-2" style="max-height: 350px; min-height: 350px"></canvas>
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="bg-white shadow rounded-3 p-3 my-3 border-1 border">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kecamatan</th>
                            <th>Total Data</th>
                            <th>Tersalur</th>
                            <th>Sisa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($chartKecamatan as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row['x']}}</td>
                                <td>
                                    <a href="{{route('landing.detail',['kecamatan'=>$row['x'],'jenis'=>'TOTAL'])}}">{{$row['total_data']}}</a>
                                </td>
                                <td><a href="{{route('landing.detail',['kecamatan'=>$row['x'],'jenis'=>'TERSALUR'])}}">{{$row['tersalur']}}</a></td>
                                <td><a href="{{route('landing.detail',['kecamatan'=>$row['x'],'jenis'=>'SISA'])}}">{{$row['sisa']}}</a></td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script>
// Register the plugin to all charts:
// Chart.register(ChartDataLabels);

const chartKecamatan={{Js::from($chartKecamatan)}}
const pluck = (arr, key) => arr.map(i => i[key]);
const data_1 = {
    labels: pluck(chartKecamatan,'x'),
    datasets: [{
            label: 'Tersalur',
            data: chartKecamatan,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderWidth: 1,
            parsing: {
                yAxisKey: 'tersalur'
            }
        }, {
            label: 'Total Data',
            data: chartKecamatan,
            backgroundColor: 'rgba(255, 159, 64, 0.5)',
            borderWidth: 1,
            parsing: {
                yAxisKey: 'total_data'
            }
        }, {
            label: 'Sisa',
            data: chartKecamatan,
            backgroundColor:'rgba(255, 99, 132, 0.5)',
            borderWidth: 1,
            parsing: {
                yAxisKey: 'sisa'
            }
            
        }]
  };
  const config_1 = {
    type: 'bar',
    data: data_1,
  };

  const myChart1 = new Chart(
    document.getElementById('chart-2'),
    config_1
  );
</script>
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