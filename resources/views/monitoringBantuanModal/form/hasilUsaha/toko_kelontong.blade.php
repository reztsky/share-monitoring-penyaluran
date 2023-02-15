<h5 class="mb-4">Hasil Usaha {{$jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Berapa penghasilan dalam sebulan ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="" id="penghasilan_sebulan" name="penghasilan_sebulan"
            placeholder="Penghasilan dalam sebulan">
        @error('penghasilan_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Hasil dari usaha tersebut digunakan untuk apa ?</label>
    <div class="col-sm-10">
        <textarea class="form-control" value="" id="kegunaan_hasil_usaha" name="kegunaan_hasil_usaha"
            placeholder="Kegunaan Hasil Usaha" style=" min-height:100px;"></textarea>
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
{{-- <div class="d-flex justify-content-end mb-2">
    <button type="button" id="btn-tambah-item" class="btn btn-primary btn-sm py-1 px-2">Tambah Item</button>
</div> --}}
<div class="table-responsive">
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
                        <input type="text" class="form-control" name="jumlah_saat_ini[{{$loop->index}}]" placeholder="Jumlah Saat ini">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="harga[{{$loop->index}}]" placeholder="Harga Jual">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Catatan ?</label>
    <div class="col-sm-10">
        <textarea class="form-control" value="" id="catatan" name="catatan"
            placeholder="Catatan" style=" min-height:100px;"></textarea>
        @error('catatan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>