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
        th{
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Pengajuan dan Pengecekan Bantuan Modal</h3>
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('pelayanan.pengajuan.create') }}" class="button" style="padding-top: 5px">Tambah
                    Pengajuan</a>
            </div>
            <div class="app-card shadow bg-white mt-4 p-2">
                <div class="app-card-body">
                    <form action="{{ route('pelayanan.pengajuan.index') }}" method="get">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <select name="id_jenis_kebutuhan" id="id_jenis_kebutuhan" class="form-select"
                                    style="height: 40px">
                                    <option value="">Jenis Alat Bantu Disabilitas </option>
                                    @foreach ($jenis_kebutuhans as $jenis_kebutuhan)
                                        <option value="{{ $jenis_kebutuhan->id }}" @selected($jenis_kebutuhan->id==request('id_jenis_kebutuhan'))>{{ $jenis_kebutuhan->nama_kebutuhan }}</option>
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
                        <table id="myTable2" class="table table-hover mb-0 text-left">
                            <thead style="background-color: #5EC2AF;color:white">
                                <tr>
                                    <th class="cell" onclick="sortTable(0)">
                                        <center>No.</center>
                                    </th>
                                    {{-- <th class="cell">@sortablelink('nik') </th> --}}
                                    <th class="cell">@sortablelink('nik', 'NIK', ['parameter' => 'nik'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></th>
                                    <th class="cell">@sortablelink('nama', 'NAMA', ['parameter' => 'nama'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></th>
                                    <th class="cell">@sortablelink('kelurahan', 'KELURAHAN', ['parameter' => 'kelurahan'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></th>
                                    <th class="cell"><center>@sortablelink('id_jenis_kebutuhan', 'ALAT BANTU', ['parameter' => 'id_jenis_kebutuhan'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></center></th>
                                    <th class="cell"><center>@sortablelink('status_pengajuan', 'STATUS PENGAJUAN', ['parameter' => 'status_pengajuan'],  ['style' => 'color:white'])<i class="bi bi-caret-down-fill" style="margin-left:4px"></i></center></th>
                                    <th class="cell"><center>Aksi</center></th>
                                    <th class="cell"><center>Verifikasi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengajuan_kebutuhans as $pengajuan_kebutuhan)
                                    <tr>
                                        <td>
                                            <center>{{ $pengajuan_kebutuhans->firstItem() + $loop->index }}</center>
                                        </td>
                                        <td>{{ $pengajuan_kebutuhan->nik }}</td>
                                        <td>{{ $pengajuan_kebutuhan->nama }}</td>
                                        <td>{{ $pengajuan_kebutuhan->kelurahan }}</td>
                                        <td>
                                            <center>{{ $pengajuan_kebutuhan->kebutuhan->nama_kebutuhan }}</center>
                                        </td>
                                        <td>
                                            <strong>
                                                @if ($pengajuan_kebutuhan->getRawOriginal('status_pengajuan') == 3)
                                                    <center>
                                                        <p style="color:#FFA17A" id="status"
                                                            value="{{ $pengajuan_kebutuhan->status_pengajuan }}">
                                                            {{ $pengajuan_kebutuhan->status_pengajuan }}</p>
                                                    </center>
                                                @elseif($pengajuan_kebutuhan->getRawOriginal('status_pengajuan') == 2)
                                                    <center>
                                                        <p style="color:#BC4C4C" id="status"
                                                            value="{{ $pengajuan_kebutuhan->status_pengajuan }}">
                                                            {{ $pengajuan_kebutuhan->status_pengajuan }}</p>
                                                    </center>
                                                @else
                                                    <center>
                                                        <p style="color:#257BB7" id="status"
                                                            value="{{ $pengajuan_kebutuhan->status_pengajuan }}">
                                                            {{ $pengajuan_kebutuhan->status_pengajuan }}</p>
                                                    </center>
                                                @endif
                                            </strong>
                                        </td>
                                        <td>
                                            <a href="{{ route('pelayanan.pengajuan.show', $pengajuan_kebutuhan->id) }}"
                                                class="center  btn btn-sm" style="background-color: #4CBCA1;padding-top:10px">
                                                <i class="bi bi-eye-fill white"></i>
                                            </a>

                                            <a href="{{ route('pelayanan.pengajuan.edit', $pengajuan_kebutuhan->id) }}"
                                                class="center  btn btn-sm" style="background-color:  #FFA17A;padding-top:10px">
                                                <i class="bi bi-pencil-fill white"></i>
                                            </a>
                                            <a class="btn btn-sm btn-delete" data-model-id="{{ $pengajuan_kebutuhan->id }}"
                                                style="background-color: #BC4C4C;color:white;padding-top:10px"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                    class="bi bi-trash-fill"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="center btn-verifikasi  btn btn-sm"
                                                {{ $pengajuan_kebutuhan->getRawOriginal('status_pengajuan') != 3 ? 'disabled' : '' }}
                                                style="background-color: {{ $pengajuan_kebutuhan->getRawOriginal('status_pengajuan') != 3 ? '#A0ACBD' : '#257BB7' }};padding-top:10px"
                                                data-bs-toggle="modal" data-bs-target="#exampleModals" id="button"
                                                data-idpengajuan="{{ $pengajuan_kebutuhan->id }}">
                                                <i class="bi bi-person-check white"> Verifikasi</i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-2">
                        {!! $pengajuan_kebutuhans->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Delete-->
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

    <!-- Modal Acc-->
    <div class="modal fade" id="exampleModals" aria-labelledby="exampleModalLabels" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabels">Verifikasi Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="{{ asset('img/warning.png') }}" alt="alert" width="200" height="200">
                        <p style="color:#BC4C4C"><strong>SETELAH VERIFIKASI STATUS PENGAJUAN TIDAK DAPAT DIUBAH, APAKAH ANDA MENYETUJUI PENGAJUAN ALAT BANTU INI ?</strong></p>
                    </center>
                </div>
                <hr/>
                <div class="pb-3">
                    <div class="row">
                        <div class="col" style="padding-left: 170px">
                            <form action="" method="post" id="verif-tolak" class="verifikasi" >
                                @csrf
                                <input type="hidden" name="status_pengajuan" id="" value="2">
                                <button type="submit" class="btn" id="btn-tolak" data-bs-dismiss="modal"
                                    style="background-color: #BC4C4C;color:white">Tolak</a>
                            </form>
                        </div>
                        <div class="col" style="padding-right: 170px">
                            <form action="" method="post" id="verif-terima" class="verifikasi">
                                @csrf
                                <input type="hidden" name="status_pengajuan" id="" value="1">
                                <button type="submit" class="btn" id="btn-terima" data-bs-dismiss="modal"
                                    style="background-color: #257BB7;color:white">Terima</a>
                            </form>
                        </div>
                    </div>
                </div>
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

    <script>
        $('.btn-delete').on('click', function(e) {
            var id = $(this).attr('data-model-id')
            var url = "{{ route('pelayanan.pengajuan.delete', '') }}/" + id
            $('#confirm-delete').attr('href', url)
        })

        $('.btn-verifikasi').on('click', function(e) {
            var id = $(this).attr('data-idpengajuan');
            var url = "{{ route('pelayanan.pengajuan.verifikasi', '') }}/" + id
            $('.verifikasi').attr('action', url)
        })
    </script>

<script>
    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("myTable2");
      switching = true;
      // Set the sorting direction to ascending:
      dir = "asc";
      /* Make a loop that will continue until
      no switching has been done: */
      while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
          // Start by saying there should be no switching:
          shouldSwitch = false;
          /* Get the two elements you want to compare,
          one from current row and one from the next: */
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /* Check if the two rows should switch place,
          based on the direction, asc or desc: */
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /* If a switch has been marked, make the switch
          and mark that a switch has been done: */
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          // Each time a switch is done, increase this count by 1:
          switchcount ++;
        } else {
          /* If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again. */
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
    </script>
@endpush