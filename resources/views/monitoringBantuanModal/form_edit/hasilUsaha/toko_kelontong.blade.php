<h5 class="mb-4">Hasil Usaha {{$monitoring->jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Berapa penghasilan dalam sebulan ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="{{$monitoring->penghasilan_sebulan}}" id="penghasilan_sebulan" name="penghasilan_sebulan"
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
            placeholder="Kegunaan Hasil Usaha" style=" min-height:100px;">{{$monitoring->kegunaan_hasil_usaha}}</textarea>
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
{{-- <div class="d-flex justify-content-end mb-2">
    <button type="button" id="btn-tambah-item" class="btn btn-primary btn-sm py-1 px-2">Tambah Item</button>
</div> --}}
<div class="table-responsive">
    {{-- {{dd($detail)}} --}}
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
            @for ($i = 0; $i < count($detail->nama_barang); $i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>
                        {{$detail->nama_barang[$i]}}
                        <input type="hidden" name="nama_barang[{{$i}}]" value="{{$detail->nama_barang[$i]}}">
                    </td>
                    <td>
                        {{$detail->jumlah_awal[$i]}}
                        <input type="hidden" name="jumlah_awal[{{$i}}]" value="{{$detail->jumlah_awal[$i]}}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="jumlah_saat_ini[{{$i}}]" value="{{$detail->jumlah_saat_ini[$i]}}" placeholder="Jumlah Saat ini">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="harga[{{$i}}]" value="{{$detail->harga[$i]}}" placeholder="Harga Jual">
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Catatan ?</label>
    <div class="col-sm-10">
        <textarea class="form-control" value="" id="catatan" name="catatan"
            placeholder="Catatan" style=" min-height:100px;">{{$detail->catatan}}</textarea>
        @error('catatan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>