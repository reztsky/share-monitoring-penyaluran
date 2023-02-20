<h5 class="mb-4">Hasil Usaha {{$jenis_bantuan_modal}}</h5>
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
            placeholder="Harga Jual Kopi" name="harga_jual_kopi" min=1000>
        @error('harga_jual_kopi')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Harga Jual Teh ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="" id="harga_jual_teh"
            placeholder="Harga Jual Teh" name="harga_jual_teh" min=1000>
        @error('harga_jual_teh')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Range Penghasilan Bersih dalam sebulan</label>
    <div class="col-sm-10">
        <select name="penghasilan_sebulan" id="penghasilan_sebulan" class="form-select">
            <option value="1">Rp. 0</option>
            <option value="2">Rp. 1 - Rp. 299.999</option>
            <option value="3">Rp. 300.000 - Rp. 599.999</option>
            <option value="4">Rp. 600.000 - Rp. 999.999</option>
            <option value="5">Rp. 1.000.000 - Rp. 1.499.999</option>
            <option value="6">> Rp. 1.500.000</option>
        </select>
        {{-- <input type="number" class="form-control" value="" min=1000 id="penghasilan_sebulan" name="penghasilan_sebulan" placeholder="Penghasilan dalam sebulan"> --}}
        @error('penghasilan_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Hasil dari usaha tersebut digunakan untuk apa ?</label>
    <div class="col-sm-10">
        <textarea class="form-control" value="" id="kegunaan_hasil_usaha" name="kegunaan_hasil_usaha" placeholder="Kegunaan Hasil Usaha" style=" min-height:100px;max-height:100px"></textarea>
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>