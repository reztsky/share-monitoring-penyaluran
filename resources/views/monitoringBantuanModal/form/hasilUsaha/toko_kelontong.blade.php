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
    <label for="" class="col-sm-4 col-form-label">Hasil usaha digunakan untuk</label>
    <div class="col-sm-8">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="1">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="1">Kebutuhan sehari-hari</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="2">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="2">Pengembangan Usaha</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" style="margin-top:10px" type="checkbox" id="3" onmousedown="this.form.kegunaan_hasil_usaha.disabled=this.checked">
            <input type="text" class="form-control" value="" id="kegunaan_hasil_usaha" for="3" placeholder="Lain - lain" disabled>
        </div>
        {{-- <textarea class="form-control" value="" id="kegunaan_hasil_usaha" name="kegunaan_hasil_usaha" placeholder="Kegunaan Hasil Usaha" style=" min-height:40px;max-height40px"></textarea> --}}
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
                        {{-- <td><input type="button" id="delPOIbutton" value="Delete" onclick="deleteRow(this)"/></td>
                        <td><input type="button" id="addmorePOIbutton" value="Add More POIs" onclick="insRow()"/></td> --}}
                    </tr>
                    <tr id="templateRow" style="display:none">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <input type="text" class="form-control" name="jumlah_saat_ini[{{$loop->index}}]" placeholder="Jumlah Saat ini">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="jumlah_saat_ini[{{$loop->index}}]" placeholder="Jumlah Saat ini">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="jumlah_saat_ini[{{$loop->index}}]" placeholder="Jumlah Saat ini" min=1>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="jumlah_saat_ini[{{$loop->index}}]" placeholder="Jumlah Saat ini" min=1>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button onclick="addRow();">Go</button>
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


<!--ADD ROW-->
{{-- <script type="text/javascript">
    function deleteRow(row){
            var i=row.parentNode.parentNode.rowIndex;
            document.getElementById('table-kelontong').deleteRow(i);
        }


    function insRow(){
        var x=document.getElementById('table-kelontong');
        // deep clone the targeted row
        var new_row = x.rows[1].cloneNode(true);
        // get the total number of rows
        var len = x.rows.length;
        // set the innerHTML of the first row 
        new_row.cells[0].innerHTML = len;

        // grab the input from the first cell and update its ID and value
        var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
        inp1.id += len;
        inp1.value = '';

        // grab the input from the first cell and update its ID and value
        var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
        inp2.id += len;
        inp2.value = '';

        // append the new row to the table
        x.appendChild( new_row );
    }
</script> --}}

<script>
    var maxID = 0;
    function getTemplateRow() {
    var x = document.getElementById("templateRow").cloneNode(true);
    x.id = "";
    x.style.display = "";
    x.innerHTML = x.innerHTML.replace(/{id}/, ++maxID);
    return x;
    }
    function addRow() {
    var t = document.getElementById("table-kelontong");
    var rows = t.getElementsByTagName("tr");
    var r = rows[rows.length - 1];
    r.parentNode.insertBefore(getTemplateRow(), r);
    
    }
    </script>