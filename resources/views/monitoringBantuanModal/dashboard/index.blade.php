@extends('layout')
@section('link-active-monev-modal','active')
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
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="app-card shadow-sm mb-5">
            <div class="app-card-body p-3">
                <div class="d-flex">
                    <div class="col-md-4 col-sm-6 co-12">
                        <form action="{{route('bantuanmodal.monitoring.report.index')}}" method="get">
                            <div class="row mb-3">
                                <label class="h4 d-flex ">
                                    <strong>Periode Bulan Monitoring</strong></label>
                                <div class="col-md-10 pe-1">
                                    <select name="periode_monitoring" id="periode_monitoring" class="form-select mt-2">
                                        <option value="" @selected(request('periode_monitoring')=="" )>Pilih Periode</option>
                                        <option value="1" @selected(request('periode_monitoring')==1)>Januari</option>
                                        <option value="2" @selected(request('periode_monitoring')==2)>Februari</option>
                                        <option value="3" @selected(request('periode_monitoring')==3)>Maret</option>
                                        <option value="4" @selected(request('periode_monitoring')==4)>April</option>
                                        <option value="5" @selected(request('periode_monitoring')==5)>Mei</option>
                                        <option value="6" @selected(request('periode_monitoring')==6)>Juni</option>
                                        <option value="7" @selected(request('periode_monitoring')==7)>Juli</option>
                                        <option value="8" @selected(request('periode_monitoring')==8)>Agustus</option>
                                        <option value="9" @selected(request('periode_monitoring')==9)>September</option>
                                        <option value="10 @selected(request('periode_monitoring')==10)">Oktober</option>
                                        <option value="11 @selected(request('periode_monitoring')==11)">November</option>
                                        <option value="12 @selected(request('periode_monitoring')==12)">Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-2 ps-0">
                                    <button type="submit" class="btn mt-2"
                                        style="background-color: #5EC2AF;color:white;"><span>
                                            Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-end">
                    <div class="col-md-4 col-sm-12 co-12">
                        <form action="{{route('bantuanmodal.monitoring.report.index')}}" method="get">
                            <div class="input-group mb-3 shadow">
                                <input type="text" placeholder="Cari Data" class="form-control" name="keyword"
                                    value="{{request('keyword')}}">
                                <button type="submit" class="btn" style="background-color: #5EC2AF;color:white">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-left">
                        <thead style="background-color: #5EC2AF;color:white;">
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">Nama</th>
                                <th rowspan="2">Jenis Modal Bantuan</th>
                                <th colspan="12" style="text-align:center">Penghasilan Per Bulan</th>
                                <th rowspan="2">Detail</th>
                            </tr>
                            <tr>
                                <th>Januari</th>
                                <th> 
                                    Februari ^
                                </th>
                                <th>Maret</th>
                                <th>April</th>
                                <th>Mei</th>
                                <th>Juni</th>
                                <th>Juli</th>
                                <th>Agustus</th>
                                <th>September</th>
                                <th>Oktober</th>
                                <th>November</th>
                                <th>Desember</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                                <tr>
                                    <td>{{$report->kpm->nama}}</td>
                                    <td>{{$report->kpm->jenis_bantuan_modal}}</td>
                                    @php
                                        $
                                    @endphp
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{$reports->links()}}
            </div>
        </div>
    </div>
</div>
@endsection