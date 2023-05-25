@extends('layout')
@section('link-active-pelayanan-modal', 'active')
@section('content')
<div class="app-card-body">
    <div class="row">
        <div class="col-12">
            <h3 class="app-page-title">Upload Bukti Penyaluran Alat Bantu Disabilitas</h3>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('pelayanan.pengajuan.index')}}" class="btn px-2 py-1"
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

            <form action="{{route('pelayanan.penyaluran.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row app-card shadow-sm bg-white p-3">
                    <div class="app-card-body">
                        <div class="g-3">
                            <h5 class="mb-4">DATA PENERIMA</h5>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    {{$...->nik}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">No. KK</label>
                                <div class="col-sm-8">
                                    {{$...->no_kk}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Nama Penerima</label>
                                <div class="col-sm-8">
                                    {{$...->nama}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8 pt-2">
                                    {{$...->jenis_kelamin}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    {{$...->tempat_lahir}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    {{$...->tanggal_lahir}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kecamatan</label>
                                <div class="col-sm-8">
                                    {{$...->kecamatan}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Kelurahan</label>
                                <div class="col-sm-8">
                                    <{{$...->kelurahan}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RW</label>
                                <div class="col-sm-8">
                                    {{$...->rw}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">RT</label>
                                <div class="col-sm-8">
                                    {{$...->rt}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-8">
                                    {{$...->alamat}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label fw-bold">No. Hp</label>
                                <div class="col-sm-8">
                                    {{$...->no_hp}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Jenis Alat Bantu Disabilitas</label>
                                <div class="col-sm-8">
                                    {{$...->kebutuhan->nama_kebutuhan}}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Dokumentasi Penyaluran</label>
                                        <div class="col-sm-8">
                                            <input type="file" class="form-control" name="dokumentasi" id="dokumentasi" accept="image/*" style="min-height:45px">
                                        </div>
                            </div>

                            
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-success px-3 py-1">Simpan</button>
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
        $('#kecamatan').on('change',function(e){
            var id_kecamatan=$(this).find('option:selected').attr('data-idKecamatan');
            var url="{{route('pelayanan.pengajuan.findKecamatan','')}}/"
            $.ajax({
                url:url+id_kecamatan,
                success:function(kelurahans){
                    var opt=`<option value="">Silahkan Pilih</option>`
                    $.each(kelurahans,(index,kelurahan)=>{
                        opt+=`<option value="${kelurahan.kelurahan}">${kelurahan.kelurahan}</option>`
                    })
                    $('#kelurahan').html(opt)
                }
            })
        })
    </script>

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

const dokumentasi=document.getElementById('dokumentasi')

dokumentasi.addEventListener('change',(ev)=>{
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
                document.getElementById('dokumentasi').files=dataTransfer.files
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