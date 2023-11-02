@extends('layout')
@section('link-active-bantuan-modal', 'active')
@section('link-active-bantuan-modal-dashboard', 'active')

@section('content')
    <div class="col-md-12 col-12">

        <div class="app-card shadow">

            <div class="app-card-body">
                <h5 class="h5  text-center pt-3">Daftar Nama
                    @if ($kategori == 'TERSALUR')
                        Penerima BLT Bantuan Modal Sudah Tersalur
                    @elseif($kategori == 'SISA')
                        Penerima BLT Bantuan Modal Belum Tersalur
                    @else
                        Penerima BLT Bantuan Modal
                    @endif
                </h5>

                <div class="table table-responsive p-2">
                    <table class="table table-hover mb-0 text-left">
                        <thead style="background-color: #5EC2AF;color:white">
                            <tr>
                                @if ($details->count() > 0)
                                    <th>No.</th>
                                    @forelse ($details->first() as $key=>$value)
                                        @continue(in_array($key, ['id', 'created_at', 'updated_at', 'status_aktif', 'kelurahan', 'tahap', 'opd_verif_pimpinan', 'opd_asal', 'sumber_dana']))
                                        <th>{{ Str::upper(str_replace('_', ' ', $key)) }}</th>
                                    @empty
                                    @endforelse

                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($details as $row)
                                <tr>
                                    <td>{{ $details->firstItem() + $loop->index }}</td>
                                    @foreach ($row as $key => $value)
                                        @continue(in_array($key, ['id', 'created_at', 'updated_at', 'status_aktif', 'kelurahan', 'tahap', 'opd_verif_pimpinan', 'opd_asal', 'sumber_dana']))
                                        @if (in_array($key, ['nik', 'no_kk']))
                                            <td>{{ Str::mask($value, '*', -10, 9) }}</td>
                                        @elseif($key == 'foto_pemberian')
                                            <td>
                                                @foreach (json_decode($value) as $key => $foto)
                                                    <a href="{{ asset('storage/foto_pemberian/' . $foto) }}" target="_blank"
                                                        rel="noopener noreferrer">Foto Pemberian {{ $key + 1 }}</a><br>
                                                @endforeach
                                            </td>
                                        @elseif($key == 'foto_kpm')
                                            <x-bantuan-modal.dashboard.detail-are-null :fileName="$value"
                                                :folder="'foto_kpm'"></x-bantuan-modal.dashboard.detail-are-null>
                                        @elseif($key == 'ba_kpm')
                                            <x-bantuan-modal.dashboard.detail-are-null :fileName="$value"
                                                :folder="'ba_kpm'"></x-bantuan-modal.dashboard.detail-are-null>
                                        @elseif($key == 'ba_kecamatan')
                                            <x-bantuan-modal.dashboard.detail-are-null :fileName="$value"
                                                :folder="'ba_kecamatan'"></x-bantuan-modal.dashboard.detail-are-null>
                                        @else
                                            <td>{{ $value }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" align="center">NO FOUND RECORD</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $details->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
