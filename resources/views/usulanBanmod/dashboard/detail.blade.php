@extends('layout')
@section('link-active-usulan-bantuan-modal', 'active')
@section('content')
    <h5 class="app-page-title">Usulan Bantuan Modal > Dashboard > Detail</h5>
    <div class="col-md-12 col-12">
        <div class="bg-white p-3 my-2 shadow rounded-3">
            <form action="{{ route('usulan_dbhcht.detail') }}" method="get">
                <div class="d-flex jusitfy-content-end">
                    <div class="input-group mb-2">
                        <input type="hidden" value="{{ request('jenis_bantuan_modal') }}" name="jenis_bantuan_modal">
                        <input type="text" class="form-control" placeholder="Search... (NIK/Nama/Alamat)" name="keyword"
                            value="{{ request('keyword') }}">
                        <button type="submit" class="btn" style="background-color: #5EC2AF;color:white">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table">
                    <thead class="" style="background-color: #5EC2AF;color:white">
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>No. KK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Bantuan Modal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usulans as $usulan)
                            <tr>
                                <td>{{ $usulans->firstItem() + $loop->index }}</td>
                                <td>{{ $usulan->nik }}</td>
                                <td>{{ $usulan->no_kk }}</td>
                                <td>{{ $usulan->nama }}</td>
                                <td>{{ $usulan->alamat }}</td>
                                <td>{{ $usulan->jenis_bantuan_modal }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Found Record</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $usulans->links() }}
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
