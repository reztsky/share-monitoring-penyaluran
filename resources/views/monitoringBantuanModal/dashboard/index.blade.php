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
            <div class="app-card-body">
                <div class="d-flex mb-3 justify-content-between">
                    <div class="col-md-4 col-sm-6 co-12">
                        <form action="#" method="get">
                            <div class="row mb-3">
                                <label class="h4 d-flex mt-3" style="margin-left: 40px;">
                                    <strong>Periode Bulan Monitoring</strong></label>
                                <div class="col-md-10">
                                    <select name="periode_monitoring" id="periode_monitoring" class="form-select mt-2" style="margin-left:35px">
                                        <option value="">Pilih Periode</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn mt-2" style="background-color: #5EC2AF;color:white;margin-left:15px"><span>
                                            Filter
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><hr style="margin-left:30px;margin-right:30px" />

                <div class="table-responsive p-4">
                    <h3 class="mb-4">Report Bantuan Modal Bulan xx 2023</h3>
                    <table id="tabs" class="table table-hover mb-0 text-left">
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
                                <th>Februari</th>
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
                            <tbody>
                                @forelse ($monitorings as $key=>$monitoring)
                                @continue($key=='penghasilan_sebulan')
                                <tr>
                                    <td>{{$monitorings->firstItem()+$loop->index}}</td>
                                    <td>{{$monitoring->kpm->nama}}</td>
                                    <td>{{$monitoring->kpm->jenis_bantuan_modal}}</td>
                                    @php
                                    $penghasilan_sebulan=$monitorings['penghasilan_sebulan']->where('id_kpm_modal',$monitoring->id_kpm_modal);
                                    @endphp
                                    
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',1)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',1)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',2)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',2)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',3)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',3)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',4)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',4)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',5)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',5)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',6)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',6)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',7)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',7)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',8)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',8)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',9)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',9)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',10)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',10)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',11)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',11)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',12)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',12)->first()->penghasilan_sebulan}}</td>
                                    <td>{{is_null($penghasilan_sebulan->where('bulan',12)->first()) ? 'Belum Digunakan' : $penghasilan_sebulan->where('bulan',12)->first()->penghasilan_sebulan}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">No Found Record</td>
                                </tr>
                                @endforelse
                            </tbody>
                        {{-- <tfoot style="background-color: #5EC2AF;color:white">
                            <tr>
                                <th colspan="2">Total</th>
                                <th>x</th>
                                <th>x</th>
                                <th>x</th>
                            </tr> --}}
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection