<hr />
<div class="g-3">
    <div class="row mb-3" id="form-alasan-penggunaan-bantuan">
        <label for="" class="col-sm-4 col-form-label">Keterangan Pendukung (Pindah/Tidak Ditemukan)</label>
        <div class="col-sm-8">
            <textarea name="keterangan_pendukung_pindah" id="" rows="25" class="form-control"
                placeholder="Keterangan Pendukung" style=" min-height:100px;max-height:100px">
                {{$monitoring->keterangan_pendukung_pindah}}
            </textarea>
            @error('keterangan_pendukung_pindah')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
</div>