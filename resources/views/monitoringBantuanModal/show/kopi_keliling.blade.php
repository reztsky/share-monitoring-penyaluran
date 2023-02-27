<style>
    .bold{
        font-weight: bold;
    }
</style>
<body>
    <h5 class="mb-4">Hasil Monitoring Usaha {{Str::title($monitoring->jenis_bantuan_modal)}}</h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Penghasilan dalam sebulan </label>
        <p class="bold col-sm-6 col-form-label form-label" id="penghasilan_sebulan">{{$monitoring->penghasilan_sebulan,0,',','.'}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Hasil dari usaha tersebut digunakan untuk</label>
        <ul class="list-unstyled bold col-sm-8 col-form-label form-label">
            @foreach ($monitoring->kegunaan_hasil_usaha as $kegunaan)
                <li>
                    - {{$kegunaan}}
                </li>
            @endforeach
        </ul>
    </div>
    {{-- <div class="d-flex justify-content-end mb-2">
        <button type="button" id="btn-tambah-item" class="btn btn-primary btn-sm py-1 px-2">Tambah Item</button>
    </div> --}}
    <div class="table-responsive">
        <table class="table table-hover mb-0 text-left" id="table-kelontong">
            <thead style="background-color: #5EC2AF;color:white">
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Awal</th>
                    <th>Jumlah Terjual</th>
                    <th>Harga Jual Satuan (Rp.)</th>
                </tr>
            </thead>
            <tbody id="items-tbody">
                @for ($i = 0; $i < count($detail->nama_barang); $i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>
                        {{$detail->nama_barang[$i+1]}}
                    </td>
                    <td>
                        {{$detail->jumlah_awal[$i+1]}}
                    </td>
                    <td>
                        {{$detail->jumlah_terjual[$i+1]}}
                    </td>
                    <td>
                        {{number_format($detail->harga[$i+1],0,',','.')}}
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</body>