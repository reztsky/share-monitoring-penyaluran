@extends('layout')
@section('link-active-blt','active')
@section('content')
    <div class="col-md-12 col-12">
        <div class="bg-white shadow p-3 rounded-3 my-3">
            <label style="font-size: 20px" class="form-label"><b>Data KPM</b></label><hr/>
            <dl class="row">
                @foreach ($kpmBlt->toArray() as $key=>$value)
                    @continue($key=='transaksi')
                    <dt class="col-md-2 col-12">{{Str::upper(str_replace('_',' ',$key))}}</dt>
                    <dl class="col-md-10 col-12">{{Str::upper($value)}}</dl>
                @endforeach
                @if (!is_null($kpmBlt->transaksi))
                    <dt class="col-md-2 col-12">DI ENTRY PADA</dt>
                    <dl class="col-md-10 col-12">{{$kpmBlt->transaksi->updated_at}}</dl>
                    <dt class="col-md-2 col-12">FOTO PENGAMBILAN</dt>
                    <dl class="col-md-10 col-12"><img src="{{asset('storage/foto_pengambilan/'.$kpmBlt->transaksi->foto_pengambilan)}}" alt="" class="img-thumbnail" style="max-width:300px"></dl>
                @endif
            </dl>
          
            <div class="d-flex">
                <div class="col-md-12 col-12">
                    <form action="{{route('blt.transaksi.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="kecamatan" value="{{$kpmBlt->kecamatan}}">
                        <input type="hidden" name="kelurahan" value="{{$kpmBlt->kelurahan}}">
                        <input type="hidden" name="id_kpm" value="{{$kpmBlt->id}}">
                        
                        <div class="mb-2">
                            <label for="" class="form-label"><b>Foto Pengambilan</b></label>
                            <input type="file" class="form-control" name="foto_pengambilan" id="foto_pengambilan" accept="image/*">

                            @error('foto_pengambilan')<div class="form-text text-danger">{{$message}}</div>@enderror
                            @error('kecamatan')<div class="form-text text-danger">{{$message}}</div>@enderror
                            @error('kelurahan')<div class="form-text text-danger">{{$message}}</div>@enderror
                            @error('id_kpm')<div class="form-text text-danger">{{$message}}</div>@enderror

                        </div>
                        <div id="root"></div>
                        <div class="d-flex justify-content-end gap-2">
                            @if (!is_null($kpmBlt->transaksi))
                                <a href="{{route('blt.softDelete',$kpmBlt->transaksi->id)}}" id="btn-delete" class="btn btn-danger btn-sm">Batalkan</a>
                            @endif
                            <button class="btn-sm btn-success btn" type="submit">Update</button>
                        </div>
                    </form>
                </div>
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
