<h5 class="h5">Hasil Usaha {{$jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Harga Cuci Kering ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="0" id="harga_cuci_kering"
            placeholder="Harga Cuci Kering" name="harga_cuci_kering">
        @error('harga_cuci_kering')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Harga Cuci Basah ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="0" id="harga_cuci_basah"
            placeholder="Harga Cuci Basah" name="harga_cuci_basah">
        @error('harga_cuci_basah')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Harga Cuci Setrika ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="0" id="harga_cuci_setrika"
            placeholder="Harga Cuci Setrika" name="harga_cuci_setrika">
        @error('harga_cuci_setrika')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Harga Setrika ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="0" id="harga_setrika"
            placeholder="Harga Setrika" name="harga_setrika">
        @error('harga_setrika')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Berapa penghasilan dalam sebulan ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="" id="penghasilan_sebulan" name="penghasilan_sebulan" placeholder="Penghasilan dalam sebulan">
        @error('penghasilan_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Hasil dari usaha tersebut digunakan untuk apa ?</label>
    <div class="col-sm-10">
        <textarea class="form-control" value="" id="kegunaan_hasil_usaha" name="kegunaan_hasil_usaha" placeholder="Kegunaan Hasil Usaha"></textarea>
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>