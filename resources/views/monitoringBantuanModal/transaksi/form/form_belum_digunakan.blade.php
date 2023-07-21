<hr />
<div class="g-3">
    <div class="row mb-3" id="form-alasan-penggunaan-bantuan">
        <label for="" class="col-sm-4 col-form-label">Alasan</label>
        <div class="col-sm-8">
            <textarea name="alasan_penggunaan_bantuan" id="" rows="25" class="form-control"
                placeholder="Alasan" style=" min-height:100px;max-height:100px"></textarea>
            @error('alasan_penggunaan_bantuan')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
</div>