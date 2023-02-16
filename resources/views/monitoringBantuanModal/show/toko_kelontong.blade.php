<style>
    .bold{
        font-weight: bold;
    }
</style>
<body>
    <h5 class="mb-4">Hasil Monitoring Usaha</h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-5 col-form-label">Penghasilan dalam sebulan </label>
        <p class="bold col-sm-1 col-form-label form-label" id="jahitan_dalam_sebulan">Rp</p>
        <p class="bold col-sm-6 col-form-label form-label" id="penghasilan_sebulan">{{number_format($monitoring->penghasilan_sebulan,0,',','.')}}</p>
    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Hasil dari usaha tersebut digunakan untuk</label>
        <p class="bold col-sm-8 col-form-label form-label" id="kegunaan_hasil_usaha">{{$monitoring->kegunaan_hasil_usaha}}</p>
    </div>
    {{-- <div class="d-flex justify-content-end mb-2">
        <button type="button" id="btn-tambah-item" class="btn btn-primary btn-sm py-1 px-2">Tambah Item</button>
    </div> --}}
    <div class="table-responsive">
        <table class="table table-bordered app-table-hover text-left" id="table-kelontong">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah Awal</th>
                    <th>Jumlah Saat ini</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>
            <tbody id="items-tbody">
                @for ($i = 0; $i < count($detail->nama_barang); $i++)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>
                        {{$detail->nama_barang[$i]}}
                    </td>
                    <td>
                        {{$detail->jumlah_awal[$i]}}
                    </td>
                    <td>
                        {{$detail->jumlah_saat_ini[$i]}}
                    </td>
                    <td>
                        {{$detail->harga[$i]}}
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="row mt-3 ">
        <label for="" class="col-sm-4 col-form-label">Catatan</label>
        <p class="bold col-sm-8 col-form-label form-label" id="catatan" style=" min-height:100px;max-height:100px">{{$detail->catatan}}</p>
    </div>
</body>