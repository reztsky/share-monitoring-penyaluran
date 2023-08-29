@extends('layout')
@section('link-active-usulan-bantuan-modal', 'active')
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

        th {
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <div class="d-flex justify-content-center mb-3">
        <a href="{{ route('usulan_dbhcht.create') }}" class="button" style="padding-top: 5px">Tambah
            Pengajuan</a>
    </div>
    <div class="col-md-12 col-12">
        <div class="app-card bg-white p-3 rounded rounded-3 shadow my-2">
            <form action="{{ route('usulan_dbhcht.index') }}" method="get">
                <div class="d-flex justify-content-end">
                    <div class="col-md-4 mx-3">
                        <select name="jenis_bantuan_modal" id="jenis_bantuan_modal" class="form-select"
                            style="height: 40px">
                            <option value="">Jenis Bantuan Modal</option>
                            <option value="0" @selected(request('jenis_bantuan_modal') == '0')>BELUM DIPILIH JENIS BANTUAN</option>
                            @foreach ($jenisBanmods as $jenisBanmod)
                                <option value="{{ $jenisBanmod }}" @selected($jenisBanmod == request('jenis_bantuan_modal'))>{{ $jenisBanmod }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" placeholder="Cari Data (NIK/Nama....)" class="form-control shadow"
                                name="keyword" value="{{ request('keyword') }}">
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
            <div class="table-responsive my-3">
                <table class="table table-hover mb-0 text-left">
                    <thead style="background-color: #5EC2AF;color:white">
                        <tr>
                            <td>No.</td>
                            <td>NIK</td>
                            <td>Nama</td>
                            <td>Kecamatan</td>
                            <td>Kelurahan</td>
                            <td>Jenis BanMod</td>
                            <td>TA</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usulans as $usulan)
                            <tr>
                                <td>{{ $usulans->currentPage() + $loop->index }}</td>
                                <td>{{ $usulan->nik }}</td>
                                <td>{{ $usulan->nama }}</td>
                                <td>{{ $usulan->kecamatan }}</td>
                                <td>{{ $usulan->kelurahan }}</td>
                                <td>{{ $usulan->jenis_bantuan_modal }}</td>
                                <td>{{ $usulan->tahun_anggaran }}</td>
                                <td>
                                    <a href="{{ route('usulan_dbhcht.edit', $usulan->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm btn-delete"
                                        data-id="{{ $usulan->id }}">Delete</button>
                                    <form action="{{ route('usulan_dbhcht.delete', $usulan->id) }}"
                                        id="form-delete-{{ $usulan->id }}" method="POST" class="form-delete">@csrf
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" align="center">No Found Record</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $usulans->links() }}
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.btn-delete').on('click', function(e) {
            var id = $(this).attr('data-id')
            Swal.fire({
                    title: 'Apakah Yakin Ingin Membatalkan KPM Tersebut ?',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $('#form-delete-' + id).submit()
                    }
                });
        })
    </script>
    <script></script>
@endpush
