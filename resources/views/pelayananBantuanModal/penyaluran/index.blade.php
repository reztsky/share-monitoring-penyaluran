@extends('layout')
@section('link-active-pelayanan-modal', 'active')
@section('content')
    <div class="col-md-12 col-sm-12 col-12">
        <h3 class="app-page-title">Penyaluran Bantuan Alat Disabilitas</h3>
        <div class="bg-white shadow p-3 rounded-3 my-3">
            <form action="{{ route('pelayanan.penyaluran.index') }}" method="get">
                <div class="row mb-2">
                    <div class="col-md-4">
                        <select name="id_jenis_kebutuhan" id="id_jenis_kebutuhan" class="form-select" style="height: 40px">
                            <option value="">Jenis Alat Bantu Disabilitas </option>
                            @foreach ($jenis_kebutuhans as $jenis_kebutuhan)
                                <option value="{{ $jenis_kebutuhan->id }}" @selected($jenis_kebutuhan->id == request('id_jenis_kebutuhan'))>
                                    {{ $jenis_kebutuhan->nama_kebutuhan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="status_penyaluran" id="status_penyaluran" class="form-select" style="height: 40px">
                            <option value="">Status Penyaluran</option>
                            <option value="1" @selected(request('status_penyaluran')==1)>Sudah Disalurkan</option>
                            <option value="2" @selected(request('status_penyaluran')==2)>Belum Disalurkan</option>
                        </select>
                    </div>
                    <div class="col-md-4">
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
            </form><hr/>
            <h5 >Data Penerima Salur Alat Bantu Disabilitas</h5>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td style="color: white;background-color: #5EC2AF;">No.</td>
                            <th style="color: white;background-color: #5EC2AF;"><strong>@sortablelink('nik_custom','NIK', ['parameter' => 'nik'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></strong></th>
                            <td style="color: white;background-color: #5EC2AF;"><strong>@sortablelink('nama_custom','Nama', ['parameter' => 'nama'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></strong></td>
                            <td style="color: white;background-color: #5EC2AF;"><strong>@sortablelink('kelurahan_custom','Kelurahan', ['parameter' => 'kelurahan'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></strong></td>
                            <td style="color: white;background-color: #5EC2AF;"><strong>@sortablelink('jenis_kebutuhan_custom','Jenis Kebutuhan', ['parameter' => 'jenis_kebutuhan'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></strong></td>
                            <td style="color: white;background-color: #5EC2AF;"><center>Status Salur</center></td>
                            <td style="color: white;background-color: #5EC2AF;"><center>Aksi</center></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siap_salurs as $siap_salur)
                            <tr>
                                <td>{{ $siap_salurs->firstItem() + $loop->index }}</td>
                                <td>{{ $siap_salur->nik }}</td>
                                <td>{{ $siap_salur->nama }}</td>
                                <td>{{ $siap_salur->kelurahan }}</td>
                                <td>{{ $siap_salur->kebutuhan->nama_kebutuhan }}</td>
                                <td>
                                    <center>
                                        @if( is_null($siap_salur->penyaluran))
                                            <strong>
                                                <p class="center"
                                                    style="color: #FFA17A">
                                                    Belum Disalurkan
                                                </p>
                                            </strong>
                                        @else
                                            <strong>
                                                <p class="center"
                                                    style="color: #257BB7">
                                                    Sudah Disalurkan
                                                </p>
                                            </strong>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if (is_null($siap_salur->penyaluran))
                                            <a href="{{ route('pelayanan.penyaluran.create', $siap_salur->id) }}" class="btn" style="background-color: #257BB7;color:white" >Salurkan</a>
                                        @endif
                                        @if (!is_null($siap_salur->penyaluran))
                                            <strong><a href="{{ route('pelayanan.penyaluran.show', $siap_salur->id) }}" style="color:#A0ACBD" >Detail</a></strong>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>

                {!! $siap_salurs->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
@endsection
@push('script')
            <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
        @endpush
