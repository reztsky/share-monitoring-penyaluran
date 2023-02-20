<h5 class="mb-4">Hasil Usaha {{$jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Pesanan yang diterima dalam sebulan ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="" id="jahitan_dalam_sebulan"
            placeholder="Jahitan Dalam Sebulan" name="jahitan_dalam_sebulan" min=1>
        @error('jahitan_dalam_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Range Penghasilan Bersih  dalam sebulan</label>
    <div class="col-sm-10">
        <select name="penghasilan_sebulan" id="penghasilan_sebulan" class="form-select">
            <option value="1">Rp. 0</option>
            <option value="2">Rp. 1 - Rp. 299.999</option>
            <option value="3">Rp. 300.000 - Rp. 599.999</option>
            <option value="4">Rp. 600.000 - Rp. 999.999</option>
            <option value="5">Rp. 1.000.000 - Rp. 1.499.999</option>
            <option value="6">> Rp. 1.500.000</option>
        </select>
        {{-- <input type="number" class="form-control" min=1000 id="penghasilan_sebulan" name="penghasilan_sebulan" placeholder="Penghasilan dalam sebulan"> --}}
        @error('penghasilan_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Hasil dari usaha tersebut digunakan untuk apa ?</label>
    <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="1">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="1">Kebutuhan sehari-hari</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="2">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="2">Pengembangan Usaha</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="3">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="3">Lain-Lain</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="4">
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="4">Kebutuhan sehari-hari</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" style="margin-top:10px" type="checkbox" value="" id="5">
            <input type="text" class="form-control" value="" id="kegunaan_hasil_usaha" for="4" placeholder="Lain - lain">
        </div>
        {{-- <textarea class="form-control" value="" id="kegunaan_hasil_usaha" name="kegunaan_hasil_usaha" placeholder="Kegunaan Hasil Usaha" style=" min-height:40px;max-height40px"></textarea> --}}
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>