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
        <div class="bg-white p-3 rounded rounded-3 shadow my-2">
            <div class="table-responsive">
                <table class="table">
                    <thead>
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
                        @foreach ($usulans as $usulan)
                            <tr>
                                <td>{{ $usulans->currentPage() + $loop->index }}</td>
                                <td>{{ $usulan->nik }}</td>
                                <td>{{ $usulan->nama }}</td>
                                <td>{{ $usulan->kecamatan }}</td>
                                <td>{{ $usulan->kelurahan }}</td>
                                <td>{{ $usulan->jenis_bantuan_modal }}</td>
                                <td>{{ $usulan->tahun_anggaran }}</td>
                                <td>
                                    <a href="{{route('usulan_dbhcht.edit',$usulan->id)}}" class="btn btn-success btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm btn-delete"
                                        data-id="{{ $usulan->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$usulans->links()}}
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.btn-delete').on('click', function(e) {
            var id=$(this).attr('data-id')
            var url="{{route('usulan_dbhcht.delete', '')}}/"+id
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
                        window.location = url
                    }
                });
        })
    </script>
    <script></script>
@endpush
