@extends('layout')
@section('link-active-blt', 'active')
@section('content')
    <div class="col-md-12 col-12">
        <div class="app-card shadow p-3 rounded-3 my-3">
            <div class="app-card-body">
                <h5 class="h5  text-center">Daftar Nama
                    @if (request('jenis') == 'TERSALUR')
                        Penerima BLT DBHCT Sudah Tersalur
                    @elseif(request('jenis') == 'SISA')
                        Penerima BLT DBHCT Belum Tersalur
                    @else
                        Penerima BLT DBHCT
                    @endif
                    {{ request('lokasi') }}
                </h5>

                <form
                    action="{{ route('blt.dashboard.detail')}}" method="get">
                    <div class="d-flex">
                        <div class="col-12">
                            <div class="input-group">
                                <input type="hidden" name="lokasi" value="{{request('lokasi')}}">
                                <input type="hidden" name="jenis" value="{{request('jenis')}}">
                                <input type="hidden" name="statuskpm" value="{{request('statuskpm')}}">
                                <input type="text" placeholder="Search(NIK/No. Urut)..." class="form-control"
                                    name="keyword" value="{{ request('keyword') }}">
                                <button type="submit" class="btn" style="background-color: #5EC2AF;color:white"><span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg></span></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive p-2">
                    <table class="table table-hover mb-0 text-left">
                        <thead style="background-color: #5EC2AF;color:white">
                            <tr>
                                @if ($result->count() > 0)
                                    <th>No.</th>
                                    @forelse ($result->first() as $key=>$value)
                                        @continue(in_array($key, ['id', 'created_at', 'updated_at']))
                                        <th>{{ Str::upper(str_replace('_', ' ', $key)) }}</th>
                                    @empty
                                    @endforelse

                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($result as $row)
                                <tr>
                                    <td>{{ $result->firstItem() + $loop->index }}</td>
                                    @foreach ($row as $key => $value)
                                        @continue(in_array($key, ['id', 'created_at', 'updated_at']))
                                        @if (in_array($key, ['nik', 'no_kk']))
                                            <td>{{ Str::mask($value, '*', -10, 9) }}</td>
                                        @elseif($key == 'status_kpm_sebagai')
                                            <td>{{ $value == 1 ? 'Buruh Pabrik' : 'Masyarakat Lainnya' }}</td>
                                        @elseif($key == 'foto_pengambilan')
                                            <td><a href="{{ asset('storage/foto_pengambilan/' . $value) }}" target="_blank"
                                                    rel="noopener noreferrer">Dokumentasi</a></td>
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
                    {{ $result->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
