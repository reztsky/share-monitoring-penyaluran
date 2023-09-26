@extends('layout')
@section('link-active-blt','active')
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
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
            text-align: center;
        }

        .button:hover {
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: ##747B80;
            transform: translateY(-7px);
        }

        .white,
        .white a {
            color: #fff;
        }

        th {
            cursor: pointer;
        }
    </style>
@endpush
@section('content')

<div class="col-md-12 col-sm-12 col-12">
    <div class="bg-white shadow p-3 rounded-3 my-3">
        <form action="{{route('blt.transaksi.find')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Tahun Anggaran</label>
                <input type="text" class="form-control" name="tahun_anggaran" value="{{date('Y')}}" readonly>
                {{-- <select name="tahun_anggaran" id="" class="form-select">
                    @foreach (range(date('Y'),2022) as $year)
                        <option value="{{$year}}" @selected($year==date('Y'))>{{$year}}</option>
                    @endforeach
                </select> --}}
                <div class="form-text text-danger">
                    @error('tahun_anggaran') {{$message}} @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tahap</label>
                <input type="number" class="form-control" min="1" name="tahap" placeholder="Tahap Penyaluran" value="{{$tahap_max->tahap}}">
                <div class="form-text text-danger">
                    @error('tahap') {{$message}} @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"><b>Tuliskan No. Urut / NIK KPM</b></label>
                <input type="text" class="form-control" placeholder="No. Urut / NIK KPM" name="key">
                <div class="form-text text-danger">
                    @error('key') {{$message}} @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="button">Cari</button>
            </div>
        </form>
    </div>
</div>
@endsection