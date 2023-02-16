<style>
    .bold{
        font-weight: bold;
    }
</style>
<body>
    <h5 class="mb-4">Hasil Monitoring Usaha </h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Jumlah Kendaraan yang dicuci dalam sebulan </label>
        <p id="kendaraan_dicuci_sebulan" class="bold col-sm-1 col-form-label form-label">0</p>
        <p  class=" bold col-sm-7 col-form-label form-label">{{$detail->kendaraan_dicuci_sebulan}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci</label>
        <p class="bold col-sm-1 col-form-label form-label">Rp</p>
        <p  id="harga_cuci" class=" bold col-sm-7 col-form-label form-label">{{$detail->harga_cuci}}</p>                    
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-5 col-form-label">Penghasilan dalam sebulan </label>
        <p class="bold col-sm-1 col-form-label form-label" id="jahitan_dalam_sebulan">Rp</p>
        <p class="bold col-sm-6 col-form-label form-label" id="penghasilan_sebulan">{{number_format($monitoring->penghasilan_sebulan,0,',','.')}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Hasil usaha digunakan untuk</label>
        <p id="kegunaan_hasil_usaha" class=" bold col-sm-8 col-form-label form-label">{{$monitoring->kegunaan_hasil_usaha}}</p>
    </div>
</body>
