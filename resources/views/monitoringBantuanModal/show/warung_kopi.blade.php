<style>
    .bold{
        font-weight: bold;
    }
</style>
<body>
    <h5 class="mb-4">Hasil Monitoring Usaha </h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-6 col-form-label form-label">Usaha Banyak Terjual</label>
        <p class="bold col-sm-6 col-form-label form-label" id="lebih_banyak_kopi_teh">{{$detail->lebih_banyak_kopi_teh}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-6 col-form-label form-label">Harga Jual Kopi</label>
        <p class="bold col-sm-1 col-form-label form-label">Rp</p>
        <p class="bold col-sm-5 col-form-label form-label" id="harga_jual_kopi">{{$detail->harga_jual_kopi}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-6 col-form-label form-label">Harga Jual Teh</label>
        <p class="bold col-sm-1 col-form-label form-label">Rp</p>
        <p class="bold col-sm-5 col-form-label form-label" id="harga_jual_teh">{{$detail->harga_jual_teh}}</p>
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

