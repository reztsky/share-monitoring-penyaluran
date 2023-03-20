<hr/><div class="g-3">
    <div class="row mb-3">
        <label for="" class="col-sm-4 col-form-label">Pengelolaan Usaha</label>
        <div class="col-sm-8">
            <select name="pengelolaan_usaha" id="" class="form-select">
                <option value="">Silahkan Pilih</option>
                <option value="1">Usaha Perorangan</option>
                <option value="2">Usaha Kelompok</option>
            </select>
            @error('pengelolaan_usaha')
            <div class="form-text text-danger">{{$message}}</div>
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
                * Penjelasan :<br/>- Penghasilan Utama (Modal Usaha sebagai Penghasilan Pokok)<br/>
                - Penghasilan Sampingan (Modal Usaha sebagai Tambahan Penghasilan)
            </div>
            @error('bentuk_usaha')
            <div class="form-text text-danger">{{$message}}</div>
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
                * Penjelasan :<br/>- Usaha baru ( Usaha yang Tidak Sama dengan milik Anda )<br/>
                - Usaha tambahan ( Usaha yang sama dengan milik Anda )
            </div>
            @error('penggunaan_bantuan')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
</div>