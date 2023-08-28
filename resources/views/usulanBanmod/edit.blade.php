@extends('layout')
@section('link-active-usulan-bantuan-modal', 'active')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="app-page-title">Edit > Usulan Bantuan Modal DBHCHT</h1>
        <button class="btn-primary btn" data-bs-toggle="modal" data-bs-target="#ketentuanModal" id="btn-modal">Ketentuan</button>
    </div>
    {{-- MODAL KENTENTUAN --}}

    <!-- Vertically centered modal -->
    <div class="modal fade" id="ketentuanModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kententuan</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <ol>
                        <li>KPM Harus Termasuk Dalam Data Keluarga Miskin</li>
                        <li>Dalam 1 KK Hanya Boleh 1 Anggota Keluarga Yang Diusulkan</li>
                        <li>KPM Belum Pernah Terdaftar Sebagai Penerima Bantuan Modal DBHCHT</li>
                        <li>Kelurahan Hanya Bisa Mengusulkan KPM yang tercatat dalam Wilayah Administrasi Kelurahan Tersebut
                        </li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Saya Mengerti !</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-12">
        <div class="bg-white p-3 my-2 shadow rounded-3">
            <form action="{{ route('usulan_dbhcht.update',$usulan->id)}}" method="post" id="form-usulan" class="form-usulan">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">NIK Calon Penerima</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="NIK Calon Penerima" id="nik"
                                name="nik" value="{{$usulan->nik}}">
                            <button type="button" class="input-group-text btn-success btn" id="cari-btn">Cari</button>
                        </div>
                        <div class="form-text text-danger" id="message-cekgakin"></div>
                    </div>
                    <div id="detail-kpm" class=""></div>
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">Jenis Bantuan Modal</label>
                        <select name="jenis_bantuan_modal" id="jenis-bantuan-modal" class="form-select">
                            <option value="">Silahkan Pilih</option>
                            @foreach ($jenisBanmods->pluck('jenis_bantuan_modal') as $jenisBanmod)
                                <option value="{{ $jenisBanmod }}">{{ $jenisBanmod }}</option>
                            @endforeach
                        </select>
                        <div id="keterangan-jenis-bantuan-modal" class="my-2 py-2"></div>
                    </div>
                </div>
                <input type="hidden" name="tahun_anggaran" value="2023">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success" type="submit" id="submit-btn">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        
        $('document').ready(function(){
            $('#btn-modal').trigger('click')
            $('#cari-btn').trigger('click')
            cekKuota();
        })
        
        function cekKuota(){
            var url="{{route('usulan_dbhcht.cekKuota')}}"
            $.ajax({
                url:url,
                type:'GET',
                success:function(result){
                    $('#kuota-tersedia').html(result)
                }
            })
        }
    </script>
    <script>
        $('#jenis-bantuan-modal').on('change', function(e) {
            $('#keterangan-jenis-bantuan-modal').html('')
            var value = $(this).val()
            if (value === '') return

            var jenisBanmods = {!! $jenisBanmods !!}
            var index = jenisBanmods.findIndex(object => object.jenis_bantuan_modal === value)
            var details = jenisBanmods[index]['detail']
            var html = `<h4>Rincian Peralatan Usaha</h4><ol class="">`
            details.forEach((detail, index) => {
                html += ` <li>${detail}</li>`
            });
            html += '<ol>'

            $('#keterangan-jenis-bantuan-modal').html(html)
        })

        $('#cari-btn').on('click', function(e) {
            $('#detail-kpm').html('')
            $('#message-cekgakin').html('')
            var nik = $('#nik').val()
            var url = "{{ route('usulan_dbhcht.cekGakin', '') }}/"
            $.ajax({
                type: 'get',
                url: url + nik,
                success: function(result) {
                    if (result.status == 0) return $('#message-cekgakin').html(result.message)
                    // if (result.isDiusulkan) {
                    //     var url = "{{ route('usulan_dbhcht.delete', '') }}/" + result.data.nik
                    //     $('#jenis-bantuan-modal').val(result.detail_usulan.jenis_bantuan_modal).change()
                    //     $('#form-usulan').attr('action', url)
                    //     $('#submit-btn').html('Batalkan Usulan').removeClass('btn-success').addClass(
                    //         'btn-danger')
                    // }
                    $('#jenis-bantuan-modal').val(result.detail_usulan.jenis_bantuan_modal).change()
                    return $('#detail-kpm').html(setData(result))
                }
            })
        })

        function setData(result) {
            var data = result.data
            return `
                    <h4 class="h4">Detail KPM</h4>
                        <dl class="row">
                            <dt class="col-sm-3">Nama</dt>
                            <dl class="col-sm-9">${data.nama}</dl>
                            <input type="hidden" name="nama" value="${data.nama}">

                            <dt class="col-sm-3">NO. KK</dt>
                            <dl class="col-sm-9">${data.no_kk}</dl>
                            <input type="hidden" name="no_kk" value="${data.no_kk}">

                            <dt class="col-sm-3">Alamat</dt>
                            <dl class="col-sm-9">${data.alamat}</dl>
                            <input type="hidden" name="alamat" value="${data.alamat}">

                            <dt class="col-sm-3">RT</dt>
                            <dl class="col-sm-9">${data.no_rt===null ? 0 : parseInt(data.no_rt)}</dl>
                            <input type="hidden" name="rt" value="${data.no_rt===null ? 0 : parseInt(data.no_rt)}">

                            <dt class="col-sm-3">RW</dt>
                            <dl class="col-sm-9">${data.no_rw===null ? 0 : parseInt(data.no_rw)}</dl>
                            <input type="hidden" name="rw" value="${data.no_rw===null ? 0 : parseInt(data.no_rw)}">

                            <dt class="col-sm-3">Kecamatan</dt>
                            <dl class="col-sm-9">${data.kecamatan}</dl>
                            <input type="hidden" name="kecamatan" value="${data.kecamatan}">

                            <dt class="col-sm-3">Kelurahan</dt>
                            <dl class="col-sm-9">${data.kelurahan}</dl>
                            <input type="hidden" name="kelurahan" value="${data.kelurahan}">
                        </dl>
        `
        }

        $(document).on('click', '#submit-btn', function(event) {
            event.preventDefault();
            var form = $('.form-usulan');
            Swal.fire({
                    title: 'Apakah Yakin Dengan Aksi Tersebut ?',
                    // text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
        });
    </script>
@endpush
