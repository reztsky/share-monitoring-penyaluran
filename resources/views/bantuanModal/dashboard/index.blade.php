@extends('layout')
@section('link-active-bantuan-modal','active')
@section('link-active-bantuan-modal-dashboard','active')

@section('content')
@if (session('notifikasi'))
<div class="position-relative">
    <div class="toast-conteiner position-absolute  top-0 end-0 p-3">
        <div class="toast align-items-center text-dark bg-light show">
            <div class="d-flex">
                <div class="toast-body">
                  {{session('notifikasi')}}
                </div>
                <button type="button" class="btn-close btn-close-dark me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>    
@endif
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="bg-white rounded-3 shadow p-3 mt-3 border border-1">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Jenis Bantuan Modal</th>
                            <th>Total</th>
                            <th>Tersalur</th>
                            <th>Belum Salur</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rekap as $row)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row['jenis_bantuan_modal']}}</td>
                                <td> <a href="{{route('bantuanmodal.dashboard.detail',[
                                    'jenis_bantuan'=>$row['jenis_bantuan_modal'],
                                    'kategori'=>"TOTAL"
                                ])}}">{{$row['total']}}</a></td>
                                <td> <a href="{{route('bantuanmodal.dashboard.detail',[
                                    'jenis_bantuan'=>$row['jenis_bantuan_modal'],
                                    'kategori'=>"TERSALUR"
                                ])}}">{{$row['tersalur']}}</a></td>
                                <td> <a href="{{route('bantuanmodal.dashboard.detail',[
                                    'jenis_bantuan'=>$row['jenis_bantuan_modal'],
                                    'kategori'=>"SISA"
                                ])}}">{{$row['sisa']}}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total</th>
                            <th>{{$rekap->sum('total')}}</th>
                            <th>{{$rekap->sum('tersalur')}}</th>
                            <th>{{$rekap->sum('sisa')}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection