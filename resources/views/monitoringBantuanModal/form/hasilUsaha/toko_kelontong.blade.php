<h5 class="mb-4">Hasil Usaha {{$jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label">Range Penghasilan Bersih  dalam sebulan</label>
    <div class="col-sm-8">
        <select name="penghasilan_sebulan" id="penghasilan_sebulan" class="form-select">
            <option value="1">Rp. 0</option>
            <option value="2">Rp. 1 - Rp. 299.999</option>
            <option value="3">Rp. 300.000 - Rp. 599.999</option>
            <option value="4">Rp. 600.000 - Rp. 999.999</option>
            <option value="5">Rp. 1.000.000 - Rp. 1.499.999</option>
            <option value="6">> Rp. 1.500.000</option>
        </select>
        {{-- <input type="number" class="form-control" value="" id="penghasilan_sebulan" name="penghasilan_sebulan"
            placeholder="Penghasilan dalam sebulan" min=1000> --}}
        @error('penghasilan_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label">Hasil dari usaha tersebut digunakan untuk apa ?</label>
    <div class="col-sm-8">
        <textarea class="form-control" value="" id="kegunaan_hasil_usaha" name="kegunaan_hasil_usaha"
            placeholder="Kegunaan Hasil Usaha" style=" min-height:100px;max-height:100px"></textarea>
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
{{-- <div class="d-flex justify-content-end mb-2">
    <button type="button" id="btn-tambah-item" class="btn btn-primary btn-sm py-1 px-2">Tambah Item</button>
</div> --}}
<div class="table-responsive">
    <div class="panel-group">
        <table class="table table-bordered app-table-hover text-left" id="table-kelontong">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Awal</th>
                    <th>Jumlah Saat ini</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>
            <tbody id="items-tbody">
                @foreach ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{$item['nama_barang']}}
                            <input type="hidden" name="nama_barang[{{$loop->index}}]" value="{{$item['nama_barang']}}">
                        </td>
                        <td>
                            {{$item['jumlah_awal']}}
                            <input type="hidden" name="jumlah_awal[{{$loop->index}}]" value="{{$item['jumlah_awal']}}">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="jumlah_saat_ini[{{$loop->index}}]" placeholder="Jumlah Saat ini" min=1>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="harga[{{$loop->index}}]" placeholder="Harga Jual" min=1000>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <button type="button" onclick="addRows()" class="btn btn-xs justify-content-center" style="background-color: #5EC2AF;color:white">+ Tambah Barang</button>
            <button type="button" onclick="deleteRows()" class="btn btn-xs justify-content-center" style="background-color: #BC4C4C;color:white">- Hapus Barang</button>
        </table>
    </div>
    
</div>
{{-- <div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Catatan ?</label>
    <div class="col-sm-10">
        <textarea class="form-control" value="" id="catatan" name="catatan"
            placeholder="Catatan" style=" min-height:100px;max-height:100px"></textarea>
        @error('catatan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div> --}}
<script type="text/javascript">
    function addRows(){ 
        var table = document.getElementById('table-kelontongs');
        var rowCount = table.rows.length;
        var cellCount = table.rows[0].cells.length; 
        var row = table.insertRow(rowCount);
        for(var i =0; i <= cellCount; i++){
            var cell = 'cell'+i;
            cell = row.insertCell(i);
            var copycel = document.getElementById('col'+i).innerHTML;
            cell.innerHTML=copycel;
            if(i == 3){ 
                var radioinput = document.getElementById('col3').getElementsByTagName('input'); 
                for(var j = 0; j <= radioinput.length; j++) { 
                    if(radioinput[j].type == 'radio') { 
                        var rownum = rowCount;
                        radioinput[j].name = 'gender['+rownum+']';
                    }
                }
            }
        }
    }
    function deleteRows(){
        var table = document.getElementById('emptbl');
        var rowCount = table.rows.length;
        if(rowCount > '2'){
            var row = table.deleteRow(rowCount-1);
            rowCount--;
        }
        else{
            alert('There should be atleast one row');
        }
    }
    </script>