@extends('layout')
@section('link-active-monitoring','active')
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
    <div class="col-12">
        <h3 class="app-page-title">Monitoring Bantuan Modal</h3>
        <div class="d-flex justify-content-center mb-3">
            <a href="{{route('bantuanmodal.monitoring.create')}}" class="button" style="padding-top: 5px">Tambah
                Monitoring</a>
        </div>

        <div class="app-card shadow bg-white mt-4 p-2">
            <div class="d-flex mb-3 justify-content-center">
                <div class="col-md-4 col-sm-6 co-12">
                    <form action="{{route('bantuanmodal.monitoring.index')}}" method="get">
                        <div class="row mb-3">
                            <label class="h4 d-flex mt-3 justify-content-left"
                                style="margin-left: 40px;"><strong>Periode Bulan Monitoring</strong></label>
                            <div class="col-md-10">
                                <select name="periode_monitoring" id="periode_monitoring" class="form-select">
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
                                <button type="submit" class="btn" style="background-color: #5EC2AF;color:white"><span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr />

            <div class="app-card-body">

                <div class="d-flex mb-3 justify-content-end">
                    <div class="col-md-4 col-sm-6 co-12">
                        <form action="{{route('bantuanmodal.monitoring.index')}}" method="get">
                            <div class="input-group shadow">
                                <input type="text" placeholder="Cari Data" class="form-control" name="keyword"
                                    value="{{request('keyword')}}">
                                <button type="submit" class="btn" style="background-color: #5EC2AF;color:white"><span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg></span></button>
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
                                
                                <td>
                                    <a href="{{route('bantuanmodal.monitoring.show',$monitoring->id)}}"
                                        class="center  btn btn-sm" style="background-color: #4CBCA1;height: 34px">
                                        <i class="bi bi-eye-fill white" style="align:center"></i>
                                    </a>
                                    {{-- <a href="{{route('bantuanmodal.monitoring.edit',$monitoring->id)}}"
                                        class="col-md-3 btn btn-sm" style="background-color:  #FFA17A;height: 34px">
                                        <i class="bi bi-pencil-fill white"></i>
                                    </a> --}}
                                    <a class="center  btn btn-sm btn-delete" data-model-id="{{$monitoring->id}}"
                                        style="background-color: #BC4C4C;color:white;height: 34px"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                            class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Found Record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-2">
                    {{$monitorings->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin Menghapus Data Ini ?
            </div>
            <a href=""></a>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #BC4C4C;color:white"
                    data-bs-dismiss="modal">Batal</button>
                <a href="" class="btn" id="confirm-delete" style="background-color: #4CBCA1;color:white">Ya</a>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $('.btn-delete').on('click',function(e){
            var id=$(this).attr('data-model-id')
            var url="{{route('bantuanmodal.monitoring.delete','')}}/"+id
            $('#confirm-delete').attr('href',url)
        })
</script>
@endpush