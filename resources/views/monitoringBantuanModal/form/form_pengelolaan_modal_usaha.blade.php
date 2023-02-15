<div class="g-3">
    <h5 class="mb-4">Pengelolaan Modal Usaha</h5>
    <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Pengelolaan Usaha</label>
        <div class="col-sm-10">
            <select name="pengelolaan_usaha" id="" class="form-select">
                <option value="1">Usaha Perorangan</option>
                <option value="2">Usaha Kelompok</option>
            </select>
            @error('pengelolaan_usaha')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Bentuk Usaha</label>
        <div class="col-sm-10">
            <select name="bentuk_usaha" id="" class="form-select">
                <option value="1">Usaha Utama</option>
                <option value="2">Usaha Sampingan</option>
            </select>
            @error('bentuk_usaha')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="" class="col-sm-2 col-form-label">Pengunaan Bantuan</label>
        <div class="col-sm-10">
            <select name="penggunaan_bantuan" id="" class="form-select">
                <option value="1">Mengawali Kegiatan Usaha</option>
                <option value="2">Tambahan Modal Usaha</option>
                <option value="3">Belum Digunakan</option>
            </select>
            @error('penggunaan_bantuan')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3" id="form-alasan-penggunaan-bantuan">
        <label for="" class="col-sm-2 col-form-label">Asalan Belum Digunakan</label>
        <div class="col-sm-10">
            <textarea name="alasan_penggunaan_bantuan" id="" rows="25" class="form-control" placeholder="Alasan Belum Digunakan" style=" min-height:100px;"></textarea>
            @error('penggunaan_bantuan')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
</div>