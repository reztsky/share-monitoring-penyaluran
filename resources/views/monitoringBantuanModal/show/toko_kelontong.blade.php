<style>
    .bold{
        font-weight: bold;
    }
</style>
<body>
    <h5 class="mb-4">Hasil Monitoring Usaha</h5>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Penghasilan dalam sebulan</label>
        <p class="bold col-sm-1 col-form-label form-label">Rp</p>
        <p class="bold col-sm-7 col-form-label form-label" id="penghasilan_sebulan">1000</p>

    </div>
    <div class="row mb-3 ">
        <label for="" class="col-sm-4 col-form-label">Hasil dari usaha tersebut digunakan untuk</label>
        <p class="bold col-sm-8 col-form-label form-label" id="kegunaan_hasil_usaha">Hasil Kegunaan Usaha</p>
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
                {{-- @foreach ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{$item['nama_barang']}}
                            <input type="hidden" name="nama_barang[{{$loop->index}}]" value="{{$item['nama_barang']}}">
                        </td>
                        <td>
                            {{$item['jumlah_awal']}}
                            <input type="hidden" name="jumlah_awal[{{$loop->index}}]" value="{{$item['jumlah_awal']}}">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="jumlah_saat_ini[{{$loop->index}}]" placeholder="Jumlah Saat ini" min=1>
                        </td>
                        <td>
                            <input type="number" class="form-control" name="harga[{{$loop->index}}]" placeholder="Harga Jual" min=1000>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
    <div class="row mt-3 ">
        <label for="" class="col-sm-4 col-form-label">Catatan</label>
        <p class="bold col-sm-8 col-form-label form-label" id="catatan" style=" min-height:100px;max-height:100px">Catatan</p>
    </div>
</body>