@extends('layout')
@section('link-active-monitoring','active')
@push('style')
<style>
    .button {
        width: 200px;
        height: 35px;
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        /* letter-spacing: 2.5px; */
        font-weight: 500;
        color: white;
        background-color: #5EC2AF;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        text-align: center;
    }

    .button:hover {
        background-color: white;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: ##747B80;
        transform: translateY(-7px);
    }

    .white,
    .white a {
        color: #fff;
    }
</style>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <h3 class="app-page-title">Pengajuan dan Pengecekan Bantuan Modal</h3>
        <div class="d-flex justify-content-center mb-3">
            <a href="{{route('pelayanan.pengajuan.create')}}" class="button" style="padding-top: 5px">Tambah
                Pengajuan</a>
        </div>
        <div class="app-card shadow bg-white mt-4 p-2">
            <div class="app-card-body">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <select name="jenis_banmod" id="jenis_banmod" class="form-select" style="height: 40px">
                            <option value="">Jenis Alat Bantu Disabilitas </option>
                            <option value="01">Kaki Palsu</option>
                            <option value="02">Tangan Palsu</option>
                            <option value="03">Alat Bantu Dengar</option>
                            <option value="04">Kursi Roda</option>
                            <option value="05">Walker</option>
                            <option value="06">Stroller</option>
                            <option value="07">Kurk</option>
                            <option value="08">Tongkat Adaptif</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" placeholder="Cari Data" class="form-control" name="keyword" value="{{request('keyword')}}">
                            <button type="submit" class="btn" style="background-color: #5EC2AF;color:white"><span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg></span></button>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover mb-0 text-left">
                        <thead style="background-color: #5EC2AF;color:white">
                            <tr>
                                <th class="cell">No.</th>
                                <th class="cell">NIK</th>
                                <th class="cell">Nama</th>
                                <th class="cell">Kelurahan</th>
                                <th class="cell">Jenis Alat Bantu</th>
                                <th class="cell">Status Pengajuan</th>
                                <th class="cell">Aksi</th>
                                <th class="cell">Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <p id = "status" value="Menunggu">
                                <td>
                                    <a href="{{route('pelayanan.pengajuan.show')}}"
                                        class="center  btn btn-sm" style="background-color: #4CBCA1;height: 34px">
                                        <i class="bi bi-eye-fill white"></i>
                                    </a>
                                    
                                    <a href="{{route('pelayanan.pengajuan.edit')}}"
                                        class="center  btn btn-sm" style="background-color:  #FFA17A;height: 34px">
                                        <i class="bi bi-pencil-fill white"></i>
                                    </a>
                                    <a class="center  btn btn-sm btn-delete" data-model-id="#"
                                        style="background-color: #BC4C4C;color:white;height: 34px"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                            class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                                <td>
                                    <button href="#"
                                        class="center  btn btn-sm" style="background-color: #257BB7;height: 34px"
                                        data-bs-toggle="modal" id='button'  data-bs-target="#exampleModals">
                                        <i class="bi bi-person-check white"> Verifikasi</i> 
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Delete-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin Menghapus Data Ini ?
            </div>
            <a href=""></a>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #BC4C4C;color:white"
                    data-bs-dismiss="modal">Batal</button>
                <a href="" class="btn" id="confirm-delete" style="background-color: #4CBCA1;color:white">Ya</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Acc-->
<div class="modal fade" id="exampleModals" aria-labelledby="exampleModalLabels" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabels">Verifikasi Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-4">
                <p style="color:#BC4C4C">Menyetujui Pengajuan Alat Bantu Disabilitas tersebut ?<br/><mark>Setelah Verifikasi Data Tidak Dapat Diubah.</mark></p>
            </div>
            <hr/>
            <div class="pb-3">
                <center>
                    <button class="btn" id="btn" onclick="change(2)" data-bs-dismiss="modal" style="background-color: #BC4C4C;color:white;margin-right:2px">Tolak</a>
                    <button class="btn" id="btn2" onclick="change(1)" data-bs-dismiss="modal" style="background-color: #257BB7;color:white;margin-left:2px">Setuju</a>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection
 @push('script')
<script>
    function change(value){
        if (value == 1) {
            document.getElementById("status").innerHTML ='<p class="h6 mt-2" style="color: #257BB7">Disetujui</p>';
        } else {
            document.getElementById("status").innerHTML ='<p class="h6 mt-2" style="color: #BC4C4C">Ditolak</p>';
        }
    }

    // $('.btn-delete').on('click',function(e){
    //         var id=$(this).attr('data-model-id')
    //         var url="{{route('bantuanmodal.monitoring.delete','')}}/"+id
    //         $('#confirm-delete').attr('href',url)
    //     })

    const button = document.querySelector('#button');
    const btn = document.querySelector('#btn');
    const btn2 = document.querySelector('#btn2');

    const disableButton = () => {
        button.disabled = true;
        button.style.background='#A0ACBD';
    };

    btn.addEventListener('click', disableButton);
    btn2.addEventListener('click', disableButton);
</script>
@endpush 