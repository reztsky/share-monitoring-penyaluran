@extends('layout')
@section('link-active-bantuan-modal','active')
@section('link-active-bantuan-modal-dashboard','active')

@section('content')
<div class="col-md-12 col-12">
    <div class="bg-white shadow p-3 rounded-3 border-2 border my-3">
        <h5 class="h5  text-center">Daftar Nama
            @if ($kategori=='TERSALUR')
                Penerima BLT Bantuan Modal Sudah Tersalur
            @elseif($kategori=='SISA')
                Penerima BLT Bantuan Modal Belum Tersalur
            @else
                Penerima BLT Bantuan Modal
            @endif
        </h5>
        <hr>
        {{-- {{dd($details->first())}} --}}
        <hr>
        <div class="table table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        @if ($details->count()>0)
                            <th>No.</th>
                        @forelse ($details->first() as $key=>$value)
                            @continue(in_array($key,['id','created_at','updated_at','status_aktif','kelurahan']))
                            <th>{{Str::upper(str_replace("_"," ",$key))}}</th>
                        @empty

                        @endforelse
                           
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($details as $row)
                    <tr>
                        <td>{{$details->firstItem() + $loop->index}}</td>
                        @foreach ($row as $key=>$value)
                            @continue(in_array($key,['id','created_at','updated_at','status_aktif','kelurahan']))
                            @if (in_array($key,['nik','no_kk']))
                                <td>{{Str::mask($value,'*',-10,9)}}</td>
                            @elseif($key=='foto_pemberian')
                                <td><a href="{{asset('storage/foto_pemberian/'.$value)}}" target="_blank" rel="noopener noreferrer">Dokumentasi</a></td>
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
            {{$details->links()}}
        </div>
    </div>
</div>
@endsection