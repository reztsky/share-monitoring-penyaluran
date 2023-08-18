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
    <h1 class="app-page-title">Usulan Bantuan Modal DBHCHT</h1>
    <div class="col-md-12 col-12">
        <div class="bg-white p-3 my-2 shadow rounded-3">
            <form action="{{ route('usulan_dbhcht.store') }}" method="post" id="form-usulan" class="form-usulan">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label for="" class="form-label fw-bold">NIK Calon Penerima</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="NIK Calon Penerima" id="nik"
                                name="nik">
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
                    <button class="btn btn-success" type="submit" id="submit-btn">Usulkan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#jenis-bantuan-modal').on('change', function(e) {
            $('#keterangan-jenis-bantuan-modal').html('')
            var value = $(this).val()
            if (value === '') return

            var jenisBanmods = {!! $jenisBanmods !!}
            var index = jenisBanmods.findIndex(object => object.jenis_bantuan_modal === value)
            var details = jenisBanmods[index]['detail']
            var html = `<h4>Detail</h4><ol class="">`
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
                    if (result.status == 0) return $('#message-cekgakin').html('Tidak Terdaftar GAKIN/PRAMIS')
                    if(result.isDiusulkan){
                        var url="{{route('usulan_dbhcht.delete','')}}/"+result.data.nik
                        $('#form-usulan').attr('action',url)
                        $('#submit-btn').html('Batalkan Usulan').removeClass('btn-success').addClass('btn-danger')
                    }
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
                            <dl class="col-sm-9">${data.no_rt}</dl>
                            <input type="hidden" name="rt" value="${parseInt(data.no_rt)}">

                            <dt class="col-sm-3">RW</dt>
                            <dl class="col-sm-9">${data.no_rw}</dl>
                            <input type="hidden" name="rw" value="${parseInt(data.no_rw)}">

                            <dt class="col-sm-3">Kecamatan</dt>
                            <dl class="col-sm-9">${data.kecamatan}</dl>
                            <input type="hidden" name="kecamatan" value="${data.kecamatan}">

                            <dt class="col-sm-3">Kelurahan</dt>
                            <dl class="col-sm-9">${data.kelurahan}</dl>
                            <input type="hidden" name="kelurahan" value="${data.kelurahan}">
                        </dl>
        `
        }

        $(document).on('click','#submit-btn',function(event) {
            event.preventDefault();
            var form=$('.form-usulan');
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
