@extends('layout')
@section('link-active-home','active')
@section('content')
    <div class="col-md-12 col-12">
        <div class="bg-white shadow p-3 rounded-3 border-2 border my-3">
            <h5 class="h5  text-center">Daftar Nama
                @if (request('jenis')=='TERSALUR')
                    Penerima BLT DBHCT Sudah Tersalur
                @elseif(request('jenis')=='SISA')
                    Penerima BLT DBHCT Belum Tersalur
                @else
                    Penerima BLT DBHCT
                @endif
                Kecamatan {{request('kecamatan')}} </h5>
            <hr>
            <div class="table table-responsive">
                <table class="table">
                    <thead>
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
                                <td>{{$result->currentPage() + $loop->index}}</td>
                                @foreach ($row as $key=>$value)
                                    @continue(in_array($key,['id','created_at','updated_at']))
                                    <td>{{$value}}</td>
                                @endforeach
                            </tr>
                        @empty
                            <tr><td colspan="3" align="center">NO FOUND RECORD</td></tr>
                        @endforelse
                    </tbody>
                </table>
                {{$result->links()}}
            </div>
        </div>
    </div>
@endsection