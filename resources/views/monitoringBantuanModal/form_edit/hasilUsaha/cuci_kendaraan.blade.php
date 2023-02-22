<h5 class="mb-4">Hasil Usaha {{Str::title($monitoring->jenis_bantuan_modal)}}</h5>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Kendaraan yang dicuci dalam sebulan ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="{{$detail->kendaraan_dicuci_sebulan}}" id="kendaraan_dicuci_sebulan"
            placeholder="Kendaraan Dicucui Dalam Sebulan" name="kendaraan_dicuci_sebulan">
        @error('kendaraan_dicuci_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-2 col-form-label form-label">Berapa Harga Cuci ?</label>
    <div class="col-sm-10">
        <input type="number" class="form-control" value="{{$detail->harga_cuci}}" id="harga_cuci"
            placeholder="Harga Cuci" name="harga_cuci">
        @error('harga_cuci')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 ">
    <label for="" class="col-sm-4 col-form-label">Range Penghasilan Bersih dalam sebulan</label>
    <div class="col-sm-8">
        <select name="penghasilan_sebulan" id="penghasilan_sebulan" class="form-select">
            <option value="1" @selected($monitoring->getRawOriginal('penghasilan_sebulan')==1)>Rp. 0</option>
            <option value="2" @selected($monitoring->getRawOriginal('penghasilan_sebulan')==2)>Rp. 1 - Rp. 299.999</option>
            <option value="3" @selected($monitoring->getRawOriginal('penghasilan_sebulan')==3)>Rp. 300.000 - Rp. 599.999</option>
            <option value="4" @selected($monitoring->getRawOriginal('penghasilan_sebulan')==4)>Rp. 600.000 - Rp. 999.999</option>
            <option value="5" @selected($monitoring->getRawOriginal('penghasilan_sebulan')==5)>Rp. 1.000.000 - Rp. 1.499.999</option>
            <option value="6" @selected($monitoring->getRawOriginal('penghasilan_sebulan')==6)>> Rp. 1.500.000</option>
        </select>
        @error('penghasilan_sebulan')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="row mb-3 " style="margin-top: 0.5cm">
    <label for="" class="col-sm-4 col-form-label">Hasil usaha digunakan untuk</label>
    <div class="col-sm-8">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Kebutuhan sehari-hari" id="1" name="kegunaan_hasil_usaha[]" @checked(in_array('Kebutuhan sehari-hari',$monitoring->kegunaan_hasil_usaha))>
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="1">Kebutuhan sehari-hari</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="kegunaan_hasil_usaha[]" value="Pengembangan Usaha" id="2" @checked(in_array('Pengembangan Usaha',$monitoring->kegunaan_hasil_usaha))>
            <label class="form-check-label" id="kegunaan_hasil_usaha" for="2">Pengembangan Usaha</label>
        </div>
        @if (count($monitoring->kegunaan_hasil_usaha)>2)
        <div class="form-check">
            <input  class="form-check-input" style="margin-top:10px" type="checkbox" id="3" onmousedown="this.form.kegunaan_hasil_usaha.disabled=this.checked"  @checked(!in_array($monitoring->kegunaan_hasil_usaha[2],['Kebutuhan sehari-hari','Pengembangan Usaha']))>
            <input type="text" class="form-control" name="kegunaan_hasil_usaha[]" id="kegunaan_hasil_usaha" for="3" placeholder="Lain - lain" {{in_array($monitoring->kegunaan_hasil_usaha[2],['Kebutuhan sehari-hari','Pengembangan Usaha']) ? 'disabled' : ''}} value="{{!in_array($monitoring->kegunaan_hasil_usaha[2],['Kebutuhan sehari-hari','Pengembangan Usaha']) ? $monitoring->kegunaan_hasil_usaha[2] : ''}}">
        </div>
        @else
        <div class="form-check">
            <input class="form-check-input" style="margin-top:10px" type="checkbox" id="3"
                onmousedown="this.form.kegunaan_hasil_usaha.disabled=this.checked">
            <input type="text" class="form-control" name="kegunaan_hasil_usaha[]" id="kegunaan_hasil_usaha" for="3"
                placeholder="Lain - lain" disabled>
        </div>
        @endif
        
        @error('kegunaan_hasil_usaha')
        <div class="form-text text-danger">{{$message}}</div>
        @enderror
    </div>
</div>