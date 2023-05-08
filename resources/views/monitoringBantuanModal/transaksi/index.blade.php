@extends('layout')
@section('link-active-monitoring', 'active')
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
            background-color: white;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: ##747B80;
            transform: translateY(-7px);
        }

        .white,
        .white a {
            color: #fff;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Monitoring Bantuan Modal</h3>
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('bantuanmodal.monitoring.create') }}" class="button" style="padding-top: 5px">Tambah
                    Monitoring</a>
            </div>
            <div class="app-card shadow bg-white mt-4 pt-3 p-2">
                <div class="app-card-body">
                    <form action="{{ route('bantuanmodal.monitoring.index') }}" method="GET">
                        <div class="row g-3">
                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="input-group mb-3 shadow">
                                    <select name="periode_monitoring" id="periode_monitoring" class="form-select">
                                        <option value="" @selected(request('periode_monitoring')=="" )>Pilih Periode
                                        </option>
                                        <option value="1" @selected(request('periode_monitoring')==1)>Januari</option>
                                        <option value="2" @selected(request('periode_monitoring')==2)>Februari</option>
                                        <option value="3" @selected(request('periode_monitoring')==3)>Maret</option>
                                        <option value="4" @selected(request('periode_monitoring')==4)>April</option>
                                        <option value="5" @selected(request('periode_monitoring')==5)>Mei</option>
                                        <option value="6" @selected(request('periode_monitoring')==6)>Juni</option>
                                        <option value="7" @selected(request('periode_monitoring')==7)>Juli</option>
                                        <option value="8" @selected(request('periode_monitoring')==8)>Agustus</option>
                                        <option value="9" @selected(request('periode_monitoring')==9)>September</option>
                                        <option value="10 @selected(request('periode_monitoring')==10)">Oktober</option>
                                        <option value="11 @selected(request('periode_monitoring')==11)">November
                                        </option>
                                        <option value="12 @selected(request('periode_monitoring')==12)">Desember
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="input-group mb-3 shadow">
                                    <select name="sort_by" id="" class="form-select">
                                        <option value="">Pilih Jenis Sort</option>
                                        <option value="created_at,asc" @selected(request('sort_by')=='created_at,asc')>Tanggal Entry (Asc)</option>
                                        <option value="created_at,desc" @selected(request('sort_by')=='created_at,desc')>Tanggal Entry (Desc)</option>
                                        <option value="jenis_bantuan_modal,asc" @selected(request('sort_by')=='jenis_bantuan_modal,asc')>Jenis Modal Bantuan (Asc)</option>
                                        <option value="jenis_bantuan_modal,desc" @selected(request('sort_by')=='jenis_bantuan_modal,desc')>Jenis Modal Bantuan (Desc)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="input-group mb-3 shadow">
                                    <input type="text" placeholder="Cari Data" class="form-control" name="keyword"
                                        value="{{ request('keyword') }}">
                                    <button type="submit" class="btn shadow" style="background-color: #5EC2AF;color:white">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" /> 
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table table-hover mb-0 text-left">
                        <thead style="background-color: #5EC2AF;color:white">
                            <tr>
                                <th class="cell">No.</th>
                                <th class="cell">Dientry Pada</th>
                                <th class="cell">NIK</th>
                                <th class="cell">Nama</th>
                                <th class="cell">Jenis Modal Bantuan</th>
                                <th class="cell">Dientry Oleh</th>
                                <th class="cell">Aksi</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 0.9em">
                            @forelse ($monitorings as $monitoring)
                                <tr>
                                    <td>{{ $monitorings->firstItem() + $loop->index }}</td>
                                    <td>{{$monitoring->created_at}}</td>
                                    <td>{{ $monitoring->kpm->nik }}</td>
                                    <td>{{ $monitoring->kpm->nama }}</td>
                                    <td>{{ $monitoring->kpm->jenis_bantuan_modal }}</td>
                                    <td>{{ $monitoring->user->name }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('bantuanmodal.monitoring.show', $monitoring->id) }}"
                                                class="btn btn-sm" style="background-color: #4CBCA1;height:32px;">
                                                <i class="bi bi-eye-fill white"></i>
                                            </a>
                                            <a href="{{ route('bantuanmodal.monitoring.edit', $monitoring->id) }}"
                                                class="btn btn-sm" style="background-color:  #FFA17A;height:32px;">
                                                <i class="bi bi-pencil-fill white"></i>
                                            </a>
                                            <a class="btn btn-sm btn-delete" data-model-id="{{ $monitoring->id }}"
                                                style="background-color: #BC4C4C;color:white;height:32px;"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                    class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Found Record</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-2">
                    {{ $monitorings->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin Menghapus Data Ini ?
                </div>
                <a href=""></a>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #BC4C4C;color:white"
                        data-bs-dismiss="modal">Batal</button>
                    <a href="" class="btn" id="confirm-delete"
                        style="background-color: #4CBCA1;color:white">Ya</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.btn-delete').on('click', function(e) {
            var id = $(this).attr('data-model-id')
            var url = "{{ route('bantuanmodal.monitoring.delete', '') }}/" + id
            $('#confirm-delete').attr('href', url)
        })
    </script>
@endpush
