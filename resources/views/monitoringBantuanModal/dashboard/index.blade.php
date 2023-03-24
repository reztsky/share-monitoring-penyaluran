@extends('layout')
@php
    function penghasilan_sebulan ($value) {
        if ($value == 1) return 'Rp. 0';
        if ($value == 2) return 'Rp. 1 - Rp. 299.999';
        if ($value == 3) return 'Rp. 300.000 - Rp. 599.999';
        if ($value == 4) return 'Rp. 600.000 - Rp. 999.999';
        if ($value == 5) return 'Rp. 1.000.000 - Rp. 1.499.999';
        if ($value == 6) return '>= Rp. 1.500.000';
        return 'Belum Digunakan';
    }
@endphp
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

    th {
        cursor: pointer;
    }

    .view {
        margin: auto;
        width: auto;
    }

    .wrapper {
        position: relative;
        overflow: auto;
        white-space: nowrap;
    }

    .sticky-col {
        position: -webkit-sticky;
        position: sticky;
        /* background-color: #5EC2AF !important; */
    }

    .no-col {
        width: 60px;
        min-width: 60px;
        max-width: 60px;
        left: 0px;
    }

    .first-col {
        width: 200px;
        min-width: 200px;
        max-width: 200px;
        left: 0px;
    }

    .second-col {
        width: 250px;
        min-width: 250px;
        max-width: 250px;
        left: 200px;
    }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
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
                                        <option value="" @selected(request('periode_monitoring')=="" )>Pilih Periode
                                        </option>
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
                                        <option value="11 @selected(request('periode_monitoring')==11)">November
                                        </option>
                                        <option value="12 @selected(request('periode_monitoring')==12)">Desember
                                        </option>
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
                <div>
                    <div class="view">
                        <div class="wrapper">
                            <table class="table my-2 pt-2" id="coba">
                                <thead>
                                    <tr>
                                        <th rowspan="2" 
                                            style="background-color: #5EC2AF;color:white;">No</th>
                                        <th rowspan="2"
                                            style="background-color: #5EC2AF;color:white;">Nama</span>
                                        </th>
                                        <th rowspan="2"
                                            style="background-color: #5EC2AF;color:white;">Jenis
                                        </th>
                                        <th colspan="12"
                                            style="background-color: #5EC2AF;color:white;text-align:center">Penghasilan
                                            Per Bulan</th>
                                    </tr>
                                    <tr>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Januari</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Februari</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Maret</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">April</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Mei</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Juni</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Juli</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Agustus</th>
                                        <th style="background-color: #5EC2AF;color:white;width:300px">September</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Oktober</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">November</th>
                                        <th style="background-color: #5EC2AF;color:white;width:200px">Desember</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($monitorings as $key=>$monitoring)
                                        @continue($key=='penghasilan_sebulan')
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$monitoring->nama}}</td>
                                            <td>{{$monitoring->jenis_bantuan_modal}}</td>
                                            @php
                                            $penghasilan_sebulan=$monitorings['penghasilan_sebulan']->where('id_kpm_modal',$monitoring->id_kpm_modal);
                                            @endphp
                                             <td>{{is_null($penghasilan_sebulan->where('bulan',1)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',1)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',2)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',2)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',3)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',3)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',4)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',4)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',5)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',5)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',6)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',6)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',7)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',7)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',8)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',8)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',9)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',9)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',10)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',10)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',11)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',11)->first()->penghasilan_sebulan)}}</td>
                                            <td>{{is_null($penghasilan_sebulan->where('bulan',12)->first()) ? '-' :
                                                penghasilan_sebulan($penghasilan_sebulan->where('bulan',12)->first()->penghasilan_sebulan)}}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No Found Record</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
    $('#coba').DataTable();
} );
    </script>
@endpush