<div class="g-3">
    <h5 class="mb-4">DATA PENERIMA</h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-2 col-form-label">NIK</label>
        <div class="col-sm-10">
            <div class="input-group">
                <input type="text" class="form-control" value="" id="nik" placeholder="NIK" name="nik">
                <span class="input-group-text d-none" id="spinner">
                    <div class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </span>
            </div>
            <input type="hidden" name="id_kpm_modal" id="id_kpm_modal">
            <div class="form-text text-danger" id="nik-message"></div>
        </div>
    </div>
    {{-- <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">No. KK</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="" id="no_kk" placeholder="No. KK" name="no_kk" readonly>
        </div>
    </div> --}}
    <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Nama Penerima</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="" id="nama_penerima" placeholder="Nama Penerima"
                name="nama_penerima" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Alamat KTP</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="" id="alamat_ktp" placeholder="Alamat KTP" name="alamat_ktp"
                readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Alamat Tempat Usaha</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="" id="alamat_tempat_usaha" placeholder="Alamat Tempat Usaha"
                name="alamat_tempat_usaha" >
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">No. Hp</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" value="" id="no_hp" placeholder="No. Hp" name="no_hp" min=0>
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Jenis Modal Usaha</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" value="" id="jenis_bantuan_modal" placeholder="Jenis modal Usaha"
                name="jenis_bantuan_modal" readonly>
        </div>
    </div>
</div>
@push('script')
<script>
    $('#nik').on('keyup',function(e){
        var nik=$(this).val();
        if(nik.length!=16) return;
        find(nik)
    })

    function find(nik){
        var url="{{route('bantuanmodal.monitoring.find','')}}/"+nik
        $.ajax({
            type: 'GET',
            url: url,
            beforeSend:function(){
                $('#spinner').removeClass('d-none')
            },
            success: function (data) {
                $('#spinner').addClass('d-none')
                if(data.data==null) $('#nik-message').html('KPM Tidak Ditemukan / NIK Invalid');
                setData(data.data)
                setFormHasilUsaha(data.template)
                // console.log(data.data);

            }
        });
    }

    function setFormHasilUsaha(template){
        $('#form-hasil-usaha').html(template)
    }
    function setData(data){
        $('#nama_penerima').val(data.nama)
        $('#no_kk').val(data.no_kk)
        $('#alamat_ktp').val(data.alamat)
        $('#jenis_bantuan_modal').val(data.jenis_bantuan_modal)
        $('#id_kpm_modal').val(data.id)
    }
</script>
@endpush