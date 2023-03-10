<hr/><h5 class="mb-4">Hasil Usaha {{$jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label">Range Penghasilan Bersih dalam sebulan</label>
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
    <label for="" class="col-sm-2 col-form-label">Hasil dari usaha digunakan untuk </label>
    <div class="col-sm-8">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Kebutuhan sehari-hari" id="1"
                name="kegunaan_hasil_usaha[]">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="1">Kebutuhan sehari-hari</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="kegunaan_hasil_usaha[]" value="Pengembangan Usaha"
                id="2">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="2">Pengembangan Usaha</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" style="margin-top:10px" type="checkbox" id="3"
                onmousedown="this.form.kegunaan_hasil_usaha.disabled=this.checked">
            <input type="text" class="form-control" name="kegunaan_hasil_usaha[]" id="kegunaan_hasil_usaha" for="3"
                placeholder="Lain - lain" disabled>
        </div>
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="table-responsive">
    <div class="panel-group">
        <table class="table table-bordered app-table-hover text-left" id="table-kelontong">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Awal</th>
                    <th>Jumlah Terjual</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>
            <tbody id="items-tbody">
                @foreach ($items as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{$item['nama_barang']}}
                        <input type="hidden" name="nama_barang[{{$loop->iteration}}]" value="{{$item['nama_barang']}}">
                    </td>
                    <td>
                        {{$item['jumlah_awal']}}
                        <input type="hidden" name="jumlah_awal[{{$loop->iteration}}]" value="{{$item['jumlah_awal']}}">
                    </td>
                    <td>
                        <input type="number" min=1 class="form-control" name="jumlah_terjual[{{$loop->iteration}}]"
                            placeholder="Jumlah Terjual">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="harga[{{$loop->iteration}}]"
                            placeholder="Harga Jual" min=1000>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            <button type="button" id="btn-tambah-item" class="btn rounded-pill"
                style="background-color: #5EC2AF;color:white;">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-plus" viewBox="0 0 16 16">
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                </span>&nbsp;Tambah Barang
            </button>
        </div>
    </div>
</div>
{{-- <div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Catatan ?</label>
    <div class="col-sm-10">
        <textarea class="form-control" value="" id="catatan" name="catatan" placeholder="Catatan"
            style=" min-height:100px;max-height:100px"></textarea>
        @error('catatan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div> --}}