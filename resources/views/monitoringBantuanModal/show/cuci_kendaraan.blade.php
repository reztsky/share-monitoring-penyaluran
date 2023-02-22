<style>
    .bold {
        font-weight: bold;
    }
</style>

<body>
    <h5 class="mb-4">Hasil Monitoring Usaha {{Str::title($monitoring->jenis_bantuan_modal)}}</h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Jumlah Kendaraan yang dicuci dalam sebulan </label>
        <p class=" bold col-sm-7 col-form-label form-label">{{$detail->kendaraan_dicuci_sebulan}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci</label>
        <p id="harga_cuci" class=" bold col-sm-7 col-form-label form-label">Rp. {{number_format($detail->harga_cuci,0,',','.')}}</p>
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