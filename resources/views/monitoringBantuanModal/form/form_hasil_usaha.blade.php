<div class="g-3">
    <div id="form-hasil-usaha">

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
                    <input type="text" name="jumlah_terjual[${rowCount}]" class="form-control" placeholder="Jumlah Terjual"/> 
                </td>
                <td>
                    <input type="text" name="harga[${rowCount}]" class="form-control" placeholder="Harga Jual"/> 
                </td>
            </tr>`
        // <button type="button" class="btn btn-danger">X</button>
        return template
    }
    
</script>
@endpush