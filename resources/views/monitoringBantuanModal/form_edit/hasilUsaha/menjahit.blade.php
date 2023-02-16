<h5 class="mb-4">Hasil Usaha {{$monitoring->jenis_bantuan_modal}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Jahitan yang diterima dalam sebulan ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="{{$detail->jahitan_dalam_sebulan}}" id="jahitan_dalam_sebulan"
            placeholder="Jahitan Dalam Sebulan" name="jahitan_dalam_sebulan">
        @error('jahitan_dalam_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Berapa penghasilan dalam sebulan ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="{{$monitoring->penghasilan_sebulan}}" id="penghasilan_sebulan" name="penghasilan_sebulan" placeholder="Penghasilan dalam sebulan">
        @error('penghasilan_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label">Hasil dari usaha tersebut digunakan untuk apa ?</label>
    <div class="col-sm-10">
        <textarea class="form-control" value="" id="kegunaan_hasil_usaha" name="kegunaan_hasil_usaha" placeholder="Kegunaan Hasil Usaha" style=" min-height:100px;">{{$monitoring->kegunaan_hasil_usaha}}</textarea>
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>