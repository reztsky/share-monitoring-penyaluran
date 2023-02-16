<style>
    .bold{
        font-weight: bold;
    }
</style>
<body>
    <h5 class="mb-4">Hasil Monitoring Usaha </h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci Kering </label>
        <p class="bold col-sm-1 col-form-label form-label">Rp</p>
        <p class="bold col-sm-7 col-form-label form-label" id="harga_cuci_kering">{{$detail->harga_cuci_kering}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci Basah</label>
        <p class="bold col-sm-1 col-form-label form-label">Rp</p>
        <p class="bold col-sm-7 col-form-label form-label" id="harga_cuci_basah">{{$detail->harga_cuci_basah}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci Setrika</label>
        <p class="bold col-sm-1 col-form-label form-label">Rp</p>
        <p class="bold col-sm-7 col-form-label form-label" id="harga_cuci_setrika">{{$detail->harga_cuci_setrika}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Setrika</label>
        <p class="bold col-sm-1 col-form-label form-label">Rp</p>
        <p class="bold col-sm-7 col-form-label form-label" id="harga_setrika">{{$detail->harga_setrika}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-5 col-form-label">Penghasilan dalam sebulan </label>
        <p class="bold col-sm-1 col-form-label form-label" id="jahitan_dalam_sebulan">Rp</p>
        <p class="bold col-sm-6 col-form-label form-label" id="penghasilan_sebulan">{{number_format($monitoring->penghasilan_sebulan,0,',','.')}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Hasil dari usaha tersebut digunakan untuk</label>
        <p class="bold col-sm-8 col-form-label form-label" id="kegunaan_hasil_usaha">{{$monitoring->kegunaan_hasil_usaha}}</p>
    </div>
</body>