<hr/><h5 class="mb-4">Hasil Usaha {{$jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label form-label"> Harga Cuci Kering</label>
    <div class="col-md-8">
        <input type="number" class="form-control" value=" Harga Cuci Kering" min=0 id="harga_cuci_kering"
            placeholder="Harga Cuci Kering" name="harga_cuci_kering">
        @error('harga_cuci_kering')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci Basah</label>
    <div class="col-md-8">
        <input type="number" class="form-control" value="Harga Cuci Basah" min=0 id="harga_cuci_basah"
            placeholder="Harga Cuci Basah" name="harga_cuci_basah">
        @error('harga_cuci_basah')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci Setrika</label>
    <div class="col-md-8">
        <input type="number" class="form-control" value="Harga Cuci Setrika" min=0 id="harga_cuci_setrika"
            placeholder="Harga Cuci Setrika" name="harga_cuci_setrika">
        @error('harga_cuci_setrika')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label form-label">Harga Setrika</label>
    <div class="col-md-8">
        <input type="number" class="form-control" value="Harga Setrika" min=0 id="harga_setrika"
            placeholder="Harga Setrika" name="harga_setrika">
        @error('harga_setrika')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label">Range Penghasilan Bersih  dalam sebulan</label>
    <div class="col-md-8">
        <select name="penghasilan_sebulan" id="penghasilan_sebulan" class="form-select">
            <option value="">Silahkan Pilih</option>
            <option value="1">Rp. 0</option>
            <option value="2">Rp. 1 - Rp. 299.999</option>
            <option value="3">Rp. 300.000 - Rp. 599.999</option>
            <option value="4">Rp. 600.000 - Rp. 999.999</option>
            <option value="5">Rp. 1.000.000 - Rp. 1.499.999</option>
            <option value="6">>= Rp. 1.500.000</option>
        </select>
        {{-- <input type="number" class="form-control" value="Penghasilan dalam sebulan" min=1000 id="penghasilan_sebulan" name="penghasilan_sebulan" placeholder="Penghasilan dalam sebulan"> --}}
        @error('penghasilan_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 " style="margin-top: 0.5cm">
    <label for="" class="col-sm-4 col-form-label">Hasil usaha digunakan untuk</label>
    <div class="col-sm-8">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Kebutuhan sehari-hari" id="1" name="kegunaan_hasil_usaha[]">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="1">Kebutuhan sehari-hari</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="kegunaan_hasil_usaha[]" value="Pengembangan Usaha" id="2">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="2">Pengembangan Usaha</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" style="margin-top:10px" type="checkbox" id="3" onmousedown="this.form.kegunaan_hasil_usaha.disabled=this.checked">
            <input type="text" class="form-control" name="kegunaan_hasil_usaha[]" id="kegunaan_hasil_usaha" for="3" placeholder="Lain - lain" disabled>
        </div>
        {{-- <textarea class="form-control" value="" id="kegunaan_hasil_usaha" name="kegunaan_hasil_usaha" placeholder="Kegunaan Hasil Usaha" style=" min-height:40px;max-height40px"></textarea> --}}
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>