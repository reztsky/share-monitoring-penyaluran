@extends('layout')
@section('link-active-pengajuan-modal','active')
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

    table.dataTable {
     padding-top: 10px;
}

</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.2.2/css/fixedColumns.dataTables.min.css">
@endpush
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="app-card shadow-sm mb-5">
            <div class="app-card-body p-3">
                <div class="view">
                    <div class="wrapper">
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{route('pelayanan.dashboard.index')}}" class="btn px-2 py-1"
                                style="background-color: #BC4C4C;color:white;width:100px">Kembali</a>
                        </div>

                        <div class="table-responsive table-striped" style="width:100%">
                            <table id="dataa" class="table table-hover mb-3 text-left" >
                                <thead style="background-color: #5EC2AF;color:white">
                                    <tr>
                                        @if ($data->count()>0)
                                        <th>No.</th>
                                        @forelse ($data->first() as $key=>$value)
                                        @continue(in_array($key,['id','created_at','updated_at']))
                                        <th>{{Str::upper(str_replace("_"," ",$key))}}</th>
                                        @empty
            
                                        @endforelse
            
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $datas)
                                    <tr>
                                        <td>{{$data->firstItem() + $loop->index}}</td>
                                        @foreach ($datas as $key=>$value)
                                        @continue(in_array($key,['id','created_at','updated_at']))
                                        @if (in_array($key,['nik','no_kk','nama_kebutuhan']))
                                        <center><td>{{$value}}</td></center>
                                        @elseif($key=='foto_penyaluran')
                                        <td><a href="{{asset('storage/foto_penyaluran/'.$value)}}" target="_blank"
                                                rel="noopener noreferrer">Bukti Penyaluran</a></td>
                                        @elseif($key=='dokumentasi')
                                        <td><a href="{{asset('storage/dokumentasi/'.$value)}}" target="_blank"
                                                rel="noopener noreferrer">Bukti Dokumentasi</a></td>
                                        @else
                                        <td>{{$value}}</td>
                                        @endif
                                        @endforeach
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" align="center">NO FOUND RECORD</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{$data->links()}}
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script>
    $(document).ready(function () {
    $('#dataa').DataTable();
});
</script>
@endpush