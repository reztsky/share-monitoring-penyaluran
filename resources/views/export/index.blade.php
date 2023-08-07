@extends('layout')
@if ($kategori == 'BLT')
    @section('link-active-blt', 'active')
@else
    @section('link-active-bantuan-modal', 'active')
@endif

@section('content')

    <div class="col-md-12 col-sm-12 col-12">
        <div class="bg-white shadow p-3 rounded-3 my-3">
            <form action="{{ route('exportfoto.export') }}" method="post">
                @csrf
                <input type="hidden" name="kategori" value="{{ $kategori }}">
                <div class="col-md-6">
                    <div class="mb-2">
                        <label for="" class="form-label">Limit</label>
                        <input type="number" class="form-control" placeholder="limit" name="limit" value="100">
                        @error('limit')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="" class="form-label">Offset</label>
                        <input type="number" class="form-control" placeholder="Offset" name="offset" value="0">
                        @error('offset')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary">Export</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
