@extends('layout')
@section('link-active-pelayanan-modal', 'active')
@section('content')
    <div class="col-md-12 col-sm-12 col-12">
        <div class="bg-white shadow p-3 rounded-3 my-3">
            <form action="{{ route('pelayanan.penyaluran.index') }}" method="get">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <select name="id_jenis_kebutuhan" id="id_jenis_kebutuhan" class="form-select" style="height: 40px">
                            <option value="">Jenis Alat Bantu Disabilitas </option>
                            @foreach ($jenis_kebutuhans as $jenis_kebutuhan)
                                <option value="{{ $jenis_kebutuhan->id }}" @selected($jenis_kebutuhan->id == request('id_jenis_kebutuhan'))>
                                    {{ $jenis_kebutuhan->nama_kebutuhan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" placeholder="Cari Data" class="form-control" name="keyword"
                                value="{{ request('keyword') }}">
                            <button type="submit" class="btn" style="background-color: #5EC2AF;color:white">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
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
                            <td>Status Salur</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siap_salurs as $siap_salur)
                            <tr>
                                <td>{{ $siap_salurs->firstItem() + $loop->index }}</td>
                                <td>{{ $siap_salur->nik }}</td>
                                <td>{{ $siap_salur->nama }}</td>
                                <td>{{ $siap_salur->kebutuhan->nama_kebutuhan }}</td>
                                <td>{{ is_null($siap_salur->penyaluran) ? 'Belum Disalurkan' : 'Sudah Disalurkan' }}</td>
                                <td>
                                    @if (is_null($siap_salur->penyaluran))
                                        <a href="{{ route('pelayanan.penyaluran.create', $siap_salur->id) }}">Salurkan</a>
                                    @endif
                                    @if (!is_null($siap_salur->penyaluran))
                                        <a href="{{ route('pelayanan.penyaluran.show', $siap_salur->id) }}">Detail</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                {{ $siap_salurs->links() }}
            </div>
        </div>
    </div>
@endsection
