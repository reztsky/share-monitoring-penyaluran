@extends('layout')
@section('link-active-bantuan-modal','active')
@section('link-active-bantuan-modal-transaksi','active')

@section('content')
<div class="col-md-12 col-sm-12 col-12">
    <div class="bg-white shadow p-3 rounded-3 my-3">
        <form action="{{route('bantuanmodal.transaksi.find')}}" method="post">
            @csrf
            <div class="mb-2">
                <label for="" class="form-label"><b>Tuliskan No. Urut / NIK KPM</b></label>
                <input type="text" class="form-control" placeholder="No. Urut / NIK KPM" name="id_kpm">
                <div class="form-text text-danger">
                    @error('id_kpm') {{$message}} @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn" style="background-color: #5EC2AF;color:white;width:100px">Cari</button>
            </div>
        </form>
    </div>
</div>
@endsection