<div class="g-3">
    <div id="form-hasil-usaha">
        @switch($monitoring->jenis_bantuan_modal)
            @case('MENJAHIT')
                @include('monitoringBantuanModal.form_edit.hasilUsaha.menjahit')
            @break
            @case('CUCI KENDARAAN')
                @include('monitoringBantuanModal.form_edit.hasilUsaha.cuci_kendaraan')
            @break
            @case('KOPI KELILING')
                @include('monitoringBantuanModal.form_edit.hasilUsaha.kopi_keliling')
            @break
            @case('LAUNDRY')
                @include('monitoringBantuanModal.form_edit.hasilUsaha.laundry')
            @break
            @case('TOKO KELONTONG')
                @include('monitoringBantuanModal.form_edit.hasilUsaha.toko_kelontong')
            @break
        @default
            @include('monitoringBantuanModal.form_edit.hasilUsaha.warung_kopi')
        @endswitch
    </div>
</div>
@push('script')
<script>
    $('#form-hasil-usaha').on('click','#btn-tambah-item',function(){
        var row=addRowCustom();
        $('#items-tbody').append(row)
    })
    $.fn.rowCount=function(){
        return $('tr', $(this).find('tbody')).length;
    }
    function addRowCustom(){
        var rowCount=parseInt($('#table-kelontong').rowCount())+1
        var template=`<tr>
                <td>${rowCount}</td>
                <td>
                    <input type="text" name="nama_barang[${rowCount}]" class="form-control" placeholder="Nama Barang"/> 
                </td>
                <td>
                    <input type="text" name="jumlah_awal[${rowCount}]" class="form-control" placeholder="Jumlah Awal"/> 
                </td>
                <td>
                    <input type="text" name="jumlah_saat_ini[${rowCount}]" class="form-control" placeholder="Jumlah Saat Ini"/> 
                </td>
                <td>
                    <input type="text" name="harga_jual[${rowCount}]" class="form-control" placeholder="Harga Jual"/> 
                </td>
            </tr>`
        // <button type="button" class="btn btn-danger">X</button>
        return template
    }
    
</script>
@endpush