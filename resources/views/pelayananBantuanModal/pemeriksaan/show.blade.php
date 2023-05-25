@extends('layout')
@section('link-active-pelayanan-modal','active')
@section('content')
<div class="app-card-body">
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Pemeriksaan dan Pengukuran Alat Bantu Disabilitas</h3>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('pelayanan.pemeriksaan.index')}}" class="btn px-2 py-1"
                    style="background-color: #BC4C4C;color:white;width:100px">Kembali</a>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row app-card shadow-sm bg-white p-3">
                    <div class="app-card-body">
                        <div class="g-3">
                            <h5 class="mb-4">DATA PENERIMA</h5>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    <input type="number"  class="form-control" value="" id="nik" name="NIK" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">No. KK</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" value="" id="no_kk" name="no_kk" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Nama Penerima</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('nama_penerima')}}" id="nama_penerima" name="nama_penerima" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8 pt-2">
                                    <input type="text" class="form-control" value="{{old('jenkel')}}" id="jenkel" name="jenkel" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('tempat_lahir')}}" id="tempat_lahir" name="tempat_lahir" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" value="{{old('tanggal_lahir')}}" id="tanggal_lahir" name="tanggal_lahir" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('kecamatan')}}" id="kecamatan" name="kecamatan" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kelurahan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('kelurahan')}}" id="kelurahan" name="kelurahan" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RW</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" value="{{old('rw')}}" id="rw" name="rw" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RT</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" value="{{old('rt')}}" id="rt" name="rt" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('alamat_ktp')}}" id="alamat_ktp" name="alamat_ktp" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label fw-bold">No. Hp</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" value="{{old('no_hp')}}" id="no_hp" placeholder="No. Hp" name="no_hp" readonly>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Alat Bantu Disabilitas</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{old('jenis_banmod')}}" id="jenis_banmod" name="jenis_banmod" readonly>
                                </div>
                            </div>
                            <hr/>
                            <div class="app-card-body">
                                <div class="row mb-3">
                                    <label for="" class="col-sm-4 col-form-label">Dokumentasi Pengukuran</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="foto_pengambilan" id="foto_pengambilan" accept="image/*" style="min-height:45px" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    // Delete Alert Confirmation
    const btn_delete=document.getElementById('btn-delete');
    btn_delete.addEventListener('click',(ev)=>{
        if (!confirm('Apakah Yakin Ingin Membatalkan Transaksi ?')) ev.preventDefault()
    })
</script>

<script>
const MAX_WIDTH = 1200;
const MAX_HEIGHT = 1200;
const MIME_TYPE = "image/jpeg";
const QUALITY = 0.7;

const foto_pengambilan=document.getElementById('foto_pengambilan')

foto_pengambilan.addEventListener('change',(ev)=>{
    const file = ev.target.files[0]; // get the file
    const blobURL = URL.createObjectURL(file);
    const img = new Image();

    img.src=blobURL

    img.onerror=()=>{
        URL.revokeObjectURL(this.src)
        alert('Cannot Load Image');
    }

    img.onload=function(){
        URL.revokeObjectURL(this.src)
        const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
        const canvas = document.createElement("canvas");
        canvas.width = newWidth;
        canvas.height = newHeight;
        
        const ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, newWidth, newHeight);
        canvas.toBlob(
            (blob) => {

                const newImage=new File([blob],file.name)
                const dataTransfer=new DataTransfer()
                dataTransfer.items.add(newImage)
                //set image to input file data_compressed
                document.getElementById('foto_pengambilan').files=dataTransfer.files
            },
            MIME_TYPE,
            QUALITY
        );

        // document.getElementById("root").append(canvas);
    }
})


function calculateSize(img, maxWidth, maxHeight) {
    let width = img.width;
    let height = img.height;

    // calculate the width and height, constraining the proportions
    if (width > height) {
        if (width > maxWidth) {
            height = Math.round((height * maxWidth) / width);
            width = maxWidth;
        }
    } else {
        if (height > maxHeight) {
            width = Math.round((width * maxHeight) / height);
            height = maxHeight;
        }
    }
    return [width, height];
}

// Utility functions for demo purpose

function displayInfo(label, file) {
    const p = document.createElement('p');
    p.innerText = `${label} - ${readableBytes(file.size)}`;
    document.getElementById('root').append(p);
}

function readableBytes(bytes) {
    const i = Math.floor(Math.log(bytes) / Math.log(1024)),
    sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

    return (bytes / Math.pow(1024, i)).toFixed(2) + ' ' + sizes[i];
}
</script>
@endpush