@extends('layout')
@section('link-active-blt','active')
@section('content')
<div class="col-md-12 col-12">
    <div class="app-card shadow p-3 rounded-3 my-3">
        <div class="app-card-body">
            <h5 class="h5  text-center">Daftar Nama
                @if (request('jenis')=='TERSALUR')
                Penerima BLT DBHCT Sudah Tersalur
                @elseif(request('jenis')=='SISA')
                Penerima BLT DBHCT Belum Tersalur
                @else
                Penerima BLT DBHCT
                @endif
                {{request('lokasi')}} </h5>
 
            <div class="table-responsive p-2">
                <table class="table table-hover mb-0 text-left">
                    <thead style="background-color: #5EC2AF;color:white">
                        <tr>
                            @if ($result->count()>0)
                            <th>No.</th>
                            @forelse ($result->first() as $key=>$value)
                            @continue(in_array($key,['id','created_at','updated_at']))
                            <th>{{Str::upper(str_replace("_"," ",$key))}}</th>
                            @empty

                            @endforelse

                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($result as $row)
                        <tr>
                            <td>{{$result->firstItem() + $loop->index}}</td>
                            @foreach ($row as $key=>$value)
                            @continue(in_array($key,['id','created_at','updated_at']))
                            @if (in_array($key,['nik','no_kk']))
                            <td>{{Str::mask($value,'*',-10,9)}}</td>
                            @elseif($key=='status_kpm_sebagai')
                            <td>{{$value==1 ? 'Buruh Pabrik' : 'Masyarakat Lainnya'}}</td>
                            @elseif($key=='foto_pengambilan')
                            <td><a href="{{asset('storage/foto_pengambilan/'.$value)}}" target="_blank"
                                    rel="noopener noreferrer">Dokumentasi</a></td>
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
                {{$result->links()}}
            </div>
        </div>
    </div>
</div>
@endsection