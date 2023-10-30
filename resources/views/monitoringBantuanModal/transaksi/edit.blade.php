@extends('layout')
@section('link-active-monev-modal', 'active')
@section('content')
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Edit Data Monitoring Bantuan Modal</h3>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ url()->previous() }}" class="btn px-2 py-1"
                    style="background-color: #BC4C4C;color:white;width:100px">Kembali</a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('bantuanmodal.monitoring.update', $monitoring->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="row app-card shadow-sm bg-white p-3">
                    <div class="app-card-body">
                        @include('monitoringBantuanModal.transaksi.form_edit.form_data_penerima')
                    </div>
                </div>
                <div class="row app-card shadow-sm bg-white p-3 mt-4">
                    <h5 class="mb-4">Periode Monitoring</h5>
                    <div class="row mb-3">
                        <label for="" class="col-sm-4 col-form-label">Periode Bulan Monitoring</label>
                        <div class="col-sm-8">
                            <select name="periode_monitoring" id="" class="form-select">
                                <option value="">Pilih Periode</option>
                                <option value="1" @selected($monitoring->periode_monitoring == 1)>Januari</option>
                                <option value="2" @selected($monitoring->periode_monitoring == 2)>Februari</option>
                                <option value="3" @selected($monitoring->periode_monitoring == 3)>Maret</option>
                                <option value="4" @selected($monitoring->periode_monitoring == 4)>April</option>
                                <option value="5" @selected($monitoring->periode_monitoring == 5)>Mei</option>
                                <option value="6" @selected($monitoring->periode_monitoring == 6)>Juni</option>
                                <option value="7" @selected($monitoring->periode_monitoring == 7)>Juli</option>
                                <option value="8" @selected($monitoring->periode_monitoring == 8)>Agustus</option>
                                <option value="9" @selected($monitoring->periode_monitoring == 9)>September</option>
                                <option value="10" @selected($monitoring->periode_monitoring == 10)>Oktober</option>
                                <option value="11" @selected($monitoring->periode_monitoring == 11)>November</option>
                                <option value="12" @selected($monitoring->periode_monitoring == 12)>Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-4 col-form-label">Periode Tahun Monitoring</label>
                        <div class="col-sm-8">
                            <select name="tahun_monitoring" id="" class="form-select">
                                @foreach (range(date('Y'), 2022) as $year)
                                    <option value="{{ $year }}" @selected($monitoring->tahun_monitoring == $year)>{{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row app-card shadow-sm bg-white p-3 mt-4">
                    <div class="app-card-body">
                        <h5 class="mb-4">Pengelolaan Modal Usaha</h5>
                        <div class="mb-3">
                            <center>
                                <label for="" class="col-form-label"><strong>Status Penggunaan
                                        Bantuan</strong></label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_penggunaan_bantuan"
                                        id="RadioOptions1" value="1" onchange="showStatus(this)"
                                        @checked($monitoring->getRawOriginal('status_penggunaan_bantuan') == 1)>
                                    <label class="form-check-label" for="RadioOptions1">Sudah Berjalan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_penggunaan_bantuan"
                                        id="RadioOptions2" value="2" onchange="showStatus(this)"
                                        @checked($monitoring->getRawOriginal('status_penggunaan_bantuan') == 2)>
                                    <label class="form-check-label" for="RadioOptions2">Belum Digunakan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_penggunaan_bantuan"
                                        id="RadioOptions3" value="3" onchange="showStatus(this)"
                                        @checked($monitoring->getRawOriginal('status_penggunaan_bantuan') == 3)>
                                    <label class="form-check-label" for="RadioOptions3">Dijual/Tidak Digunakan untuk
                                        Usaha</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status_penggunaan_bantuan"
                                        id="RadioOptions4" value="4" onchange="showStatus(this)"
                                        @checked($monitoring->getRawOriginal('status_penggunaan_bantuan') == 4)>
                                    <label class="form-check-label" for="RadioOptions4">Pindah/Tidak Ditemukan</label>
                                </div>
                            </center>
                        </div>

                        {{-- Keterangan Pendukung Pindah --}}
                        <div id="form-keterangan-pendukung-pindah"
                            class="{{ $monitoring->getRawOriginal('status_penggunaan_bantuan') == 4 ? '' : 'd-none' }}">
                            @include('monitoringBantuanModal.transaksi.form_edit.form_keterangan_pendukung_pindah')
                        </div>

                        {{-- Modal Usaha Belum Digunakan --}}
                        <div id="form-belum-digunakan"
                        class="{{ in_array($monitoring->getRawOriginal('status_penggunaan_bantuan'),[2, 3]) ? '' : 'd-none' }}">
                            @include('monitoringBantuanModal.transaksi.form_edit.form_belum_digunakan')
                        </div>

                        {{-- Pengelolaan Modal Usaha --}}
                        <div id="form-modal-usaha"
                            class="{{ $monitoring->getRawOriginal('status_penggunaan_bantuan') == 1 ? '' : 'd-none' }}">
                            @include('monitoringBantuanModal.transaksi.form_edit.form_pengelolaan_modal_usaha')
                        </div>

                        {{-- Hasil Usaha --}}
                        {{-- <div id="form-hasil-usaha" class="d-none">
                        @include('monitoringBantuanModal.transaksi.form.form_hasil_usaha')
                        </div> --}}
                    </div>
                </div>

                <div class="row app-card shadow-sm bg-white p-3 mt-4">
                    <div class="app-card-body">
                        {{-- Lain Lain --}}
                        @include('monitoringBantuanModal.transaksi.form_edit.form_lain_lain')
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script>
        function showStatus(select) {
            if (select.value == 1) {
                document.getElementById('form-modal-usaha').classList.remove("d-none")
                document.getElementById('form-keterangan-pendukung-pindah').classList.add("d-none")
                document.getElementById('form-belum-digunakan').classList.add("d-none")
                // document.getElementById('form-hasil-usaha').classList.remove("d-none")
            } else if (select.value == 2 || select.value == 3) {
                document.getElementById('form-modal-usaha').classList.add("d-none")
                document.getElementById('form-keterangan-pendukung-pindah').classList.add("d-none")
                document.getElementById('form-belum-digunakan').classList.remove("d-none")
                // document.getElementById('form-hasil-usaha').classList.add("d-none")
            } else if (select.value == 4) {
                document.getElementById('form-keterangan-pendukung-pindah').classList.remove("d-none")
                document.getElementById('form-modal-usaha').classList.add("d-none")
                document.getElementById('form-belum-digunakan').classList.add("d-none")
            }
        }
    </script>
@endpush
