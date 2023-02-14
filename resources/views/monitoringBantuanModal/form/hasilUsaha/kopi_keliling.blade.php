<h5 class="h5">Hasil Usaha {{$jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Lebih Banyak Terjual Mana ?</label>
    <div class="col-sm-10">
        <select name="lebih_banyak_kopi_teh" id="lebih_banyak_kopi_teh" class="form-select">
            <option value="1">Kopi</option>
            <option value="2">Teh</option>
        </select>
        @error('lebih_banyak_kopi_teh')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Harga Jual Kopi ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="" id="harga_jual_kopi"
            placeholder="Harga Jual Kopi" name="harga_jual_kopi">
        @error('harga_jual_kopi')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Harga Jual Teh ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="" id="harga_jual_teh"
            placeholder="Harga Jual Teh" name="harga_jual_teh">
        @error('harga_jual_teh')
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