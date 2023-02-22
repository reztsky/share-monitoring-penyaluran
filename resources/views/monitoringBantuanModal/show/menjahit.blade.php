<style>
    .bold{
        font-weight: bold;
    }
</style>
<body>
    <h5 class="mb-4">Hasil Monitoring Usaha </h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Banyak Jahitan yang diterima dalam sebulan</label>
        <p class="bold col-sm-1 col-form-label form-label" id="jahitan_dalam_sebulan">{{$detail->jahitan_dalam_sebulan}} Buah</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Penghasilan dalam sebulan </label>
        <p class="bold col-sm-6 col-form-label form-label" id="penghasilan_sebulan">{{$monitoring->penghasilan_sebulan}}
        </p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Hasil usaha digunakan untuk</label>
        <ul class="list-unstyled bold col-sm-8 col-form-label form-label">
            @foreach ($monitoring->kegunaan_hasil_usaha as $kegunaan)
                <li>
                    - {{$kegunaan}}
                </li>
            @endforeach
        </ul>
    </div>
</body>