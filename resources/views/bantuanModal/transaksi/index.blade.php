@extends('layout')
@section('link-active-bantuan-modal','active')
@section('link-active-bantuan-modal-transaksi','active')

@section('content')
@if (session('notifikasi'))
<div class="position-relative">
    <div class="toast-conteiner position-absolute  top-0 end-0 p-3">
        <div class="toast align-items-center text-dark bg-light show">
            <div class="d-flex">
                <div class="toast-body">
                  {{session('notifikasi')}}
                </div>
                <button type="button" class="btn-close btn-close-dark me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>    
@endif

<div class="col-md-6 col-sm-12 col-12">
    <div class="bg-white shadow p-3 rounded-3 my-3">
        <form action="{{route('bantuanmodal.transaksi.find')}}" method="post">
            @csrf
            <div class="mb-2">
                <label for="" class="form-label">No. Urut / NIK KPM</label>
                <input type="text" class="form-control" placeholder="No. Urut / NIK KPM" name="id_kpm">
                <div class="form-text">Masukkan No. Urut / ID / NIK KPM</div>
                <div class="form-text text-danger">
                    @error('id_kpm') {{$message}} @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Cari</button>
            </div>
        </form>
    </div>
</div>
@endsection