@extends('layout')
@section('link-active-monitoring','active')
@section('content')
<div class="col-md-12 col-sm-12 col-12">
    <div class="bg-white shadow p-3 rounded-3 my-3">
        <form action="#" method="post">
            @csrf
            <div class="mb-2">
                <label for="" class="form-label"><b>NIK KPM</b></label>
                <input type="number" class="form-control" placeholder="NIK KPM" name="id_kpm">
                <div class="form-text text-danger">
                    @error('id_kpm') {{$message}} @enderror
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn" style="background-color: #4CBCA1;color:white">Cari</button>
            </div>
        </form>
    </div>
</div>
@endsection