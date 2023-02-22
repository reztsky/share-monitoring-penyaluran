<style>
    .bold{
        font-weight: bold;
    }
</style>
<body>
    <h5 class="mb-4">Hasil Monitoring Usaha {{Str::title($monitoring->jenis_bantuan_modal)}}</h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci Kering </label>
        <p class="bold col-sm-7 col-form-label form-label" id="harga_cuci_kering">Rp. {{number_format($detail->harga_cuci_kering,0,',','.')}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci Basah</label>
        <p class="bold col-sm-7 col-form-label form-label" id="harga_cuci_basah">Rp. {{number_format($detail->harga_cuci_basah,0,',','.')}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Cuci Setrika</label>
        <p class="bold col-sm-7 col-form-label form-label" id="harga_cuci_setrika">Rp. {{number_format($detail->harga_cuci_setrika,0,',','.')}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label form-label">Harga Setrika</label>
        <p class="bold col-sm-7 col-form-label form-label" id="harga_setrika">Rp. {{number_format($detail->harga_setrika,0,',','.')}}</p>
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
                    {{$kegunaan}}
                </li>
            @endforeach
        </ul>
    </div>
</body>