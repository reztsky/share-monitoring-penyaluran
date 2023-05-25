@extends('layout')
@section('link-active-pelayanan-modal', 'active')
@section('content')
<div class="col-md-12 col-sm-12 col-12">
    <div class="bg-white shadow p-3 rounded-3 my-3">
        <form action="#" method="post">
            @csrf
            <div class="mb-2">
                <label for="" class="form-label"><b>Tulis NIK Penerima</b></label>
                <input type="number" class="form-control" placeholder="NIK" name="nik">
                <div class="form-text text-danger">
                    @error('nik') {{$message}} @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn" style="background-color: #4CBCA1;color:white">Cari</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>NIK</td>
                        <td>Nama</td>
                        <td>Jenis Kebutuhan</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siap_salurs as $siap_salur)
                        <tr>
                            <td>{{$siap_salurs->firstItem() + $loop->index}}</td>
                            <td>{{$siap_salur->nik}}</td>
                            <td>{{$siap_salur->nama}}</td>
                            <td>{{$siap_salur->kebutuhan->nama_kebutuhan}}</td>
                            <td>
                                <a href="{{route('pelayanan.penyaluran.create',$siap_salur->id)}}">Salurkan</a>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>

            {{$siap_salurs->links()}}
        </div>
    </div>
</div>
@endsection