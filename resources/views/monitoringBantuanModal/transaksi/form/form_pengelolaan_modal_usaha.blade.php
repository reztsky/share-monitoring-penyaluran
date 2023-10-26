<hr />
<div class="g-3">
    <div class="row mb-3">
        <label for="" class="col-sm-4 col-form-label">Pengelolaan Usaha</label>
        <div class="col-sm-8">
            <select name="pengelolaan_usaha" id="" class="form-select">
                <option value="">Silahkan Pilih</option>
                <option value="1">Usaha Perorangan</option>
                <option value="2">Usaha Kelompok</option>
            </select>
            @error('pengelolaan_usaha')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-4 col-form-label">Sumber Penghasilan KPM</label>
        <div class="col-sm-8">
            <select name="bentuk_usaha" id="" class="form-select">
                <option value="">Silahkan Pilih</option>
                <option value="1">Penghasilan Utama</option>
                <option value="2">Penghasilan Sampingan</option>
            </select>
            <div class="form-text text-sm" style="color: crimson">
                * Penjelasan :<br />- Penghasilan Utama (Modal Usaha sebagai Penghasilan Pokok)<br />
                - Penghasilan Sampingan (Modal Usaha sebagai Tambahan Penghasilan)
            </div>
            @error('bentuk_usaha')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-4 col-form-label">Pengunaan Bantuan</label>
        <div class="col-sm-8">
            <select name="penggunaan_bantuan" id="" class="form-select">
                <option value="">Silahkan Pilih</option>
                <option value="1">Usaha Baru</option>
                <option value="2">Usaha Tambahan</option>
                {{-- <option value="3">Belum Digunakan</option> --}}
            </select>
            <div class="form-text text-sm" style="color: crimson">
                * Penjelasan :<br />- Usaha baru ( Usaha yang Tidak Sama dengan milik Anda )<br />
                - Usaha tambahan ( Usaha yang sama dengan milik Anda )
            </div>
            @error('penggunaan_bantuan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Range Penghasilan Bersih dalam sebulan</label>
        <div class="col-sm-8">
            <select name="penghasilan_sebulan" id="penghasilan_sebulan" class="form-select">
                <option value="">Silahkan Pilih</option>
                <option value="1">Rp. 0</option>
                <option value="2">Rp. 1 - Rp. 299.999</option>
                <option value="3">Rp. 300.000 - Rp. 599.999</option>
                <option value="4">Rp. 600.000 - Rp. 999.999</option>
                <option value="5">Rp. 1.000.000 - Rp. 1.499.999</option>
                <option value="6">Rp. 1.500.000 - Rp. 1.999.999</option>
                <option value="7">Rp. 2.000.000 - Rp. 2.499.999</option>
                <option value="8">>= Rp. 2.500.000</option>
            </select>
            @error('penghasilan_sebulan')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3 " style="margin-top: 0.5cm">
        <label for="" class="col-sm-4 col-form-label">Hasil usaha digunakan untuk</label>
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
                <input type="text" class="form-control" name="kegunaan_hasil_usaha[]" id="kegunaan_hasil_usaha"
                    for="3" placeholder="Lain - lain" disabled>
            </div>
            @error('kegunaan_hasil_usaha')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
