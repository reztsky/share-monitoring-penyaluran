@extends('layout')
@section('link-active-monitoring','active')
@section('content')
<div class="col-md-12 col-sm-12 col-12">
    <div class="bg-white shadow p-3 rounded-3 my-3">
        <label style="font-size: 20px" class="form-label"><b>Data KPM</b></label><hr/>
            <dl class="row">
                @foreach ($kpmBlt->toArray() as $key=>$value)
                    @continue($key=='transaksi')
                    <dt class="col-md-2 col-12">{{Str::upper(str_replace('_',' ',$key))}}</dt>
                    <dl class="col-md-10 col-12">{{Str::upper($value)}}</dl>
                @endforeach
                @if (!is_null($kpmBlt->transaksi))
                    <dt class="col-md-2 col-12">DI ENTRY PADA</dt>
                    <dl class="col-md-10 col-12">{{$kpmBlt->transaksi->updated_at}}</dl>
                    <dt class="col-md-2 col-12">FOTO PENGAMBILAN</dt>
                    <dl class="col-md-10 col-12"><img src="{{asset('storage/foto_pengambilan/'.$kpmBlt->transaksi->foto_pengambilan)}}" alt="" class="img-thumbnail" style="max-width:300px"></dl>
                @endif
            </dl>
          
            <div class="d-flex">
                <div class="col-md-12 col-12">
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="kecamatan" value="#">
                        <input type="hidden" name="kelurahan" value="#">
                        <input type="hidden" name="id_kpm" value="#">
                        
                        <div class="mb-2">
                            <label for="" class="form-label"><b>Foto Pengambilan</b></label>
                            <input type="file" class="form-control" name="foto_pengambilan" id="foto_pengambilan" accept="image/*">

                            @error('foto_pengambilan')<div class="form-text text-danger">{{$message}}</div>@enderror
                            @error('kecamatan')<div class="form-text text-danger">{{$message}}</div>@enderror
                            @error('kelurahan')<div class="form-text text-danger">{{$message}}</div>@enderror
                            @error('id_kpm')<div class="form-text text-danger">{{$message}}</div>@enderror

                        </div>
                        <div id="root"></div>
                        <div class="d-flex justify-content-end gap-2">
                            @if (!is_null($kpmBlt->transaksi))
                                <a href="#" id="btn-delete" class="btn btn-sm" style="background-color: #BC4C4C;color:white;">Batalkan</a>
                            @endif
                            <button class="btn-sm btn" type="submit" style="background-color: #4CBCA1;color:white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection